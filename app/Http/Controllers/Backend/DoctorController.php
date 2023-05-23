<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Backend\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    private $upload_path;
    private $thumb_path;
    private $width;
    private $height;
    private $thumb_width;
    private $thumb_height;
    private $default_pagination;

    public function __construct()
    {
        $this->upload_path = public_path("images/doctors/");
        $this->width = 1208;
        $this->height = 970;
        $this->default_pagination = 25;

        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }
    }


    public function index()
    {
        return view(
            'backend.doctor.index',
            [
                'doctors' => Doctor::latest()->get()
            ]
        );
    }

    public function create()
    {

        return view('backend.doctor.create');
    }

    public function show(Doctor $doctor){
        return view('backend.doctor.show',[
            'doctor'=>$doctor
        ]);
    }

    public function edit(Doctor $doctor)
    {
        return view('backend.doctor.edit',
        ['doctor'=>$doctor]);
    }

    public function store(DoctorRequest $request)
    {
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => 2
            ]
        );
        $data = [
        "name"=>$request->name,
            "email" => $request->email,
            "password" => $request->password,

        ];

        $attachmentPath = '';
        $attachmentName = '';

        send_email($request->email, 'Register Message', 'email.register', ['data' => $data], $attachmentPath, $attachmentName);
        $input = $request->except('email', 'password', 'image');
        if ($request->hasFile("image")) {
            $img_tmp = $request->file("image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            $input["image"] = $filename;
        } else {
            $input["image"] = "";
        }
        $input["user_id"] = $user->id;
        $input["email"] = $user->email;

        Doctor::create($input);
        
        return redirect()
            ->route("doctors.index")
            ->with("message", "Doctor added successfully.");
    }


    public function update(DoctorRequest $request,Doctor $doctor)
    {
        $input = $request->all();

        if ($request->hasFile("image")) {
            $img_tmp = $request->file("image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            $input["image"] = $filename;
            File::delete($this->upload_path . $doctor->image);
        }

        if (empty($input["banner_description"])) {
            $input["banner_description"] = "";
        }

        $doctor->update($input);
        if ($doctor) {
            return redirect()
                ->route("doctors.index")
                ->with("message", "Doctor updated successfully.");
        }

    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        File::delete($this->upload_path . $doctor->image);

        return redirect()
            ->route("doctors.index")
            ->with("message", "Doctor delete successfully.");

    }
}
