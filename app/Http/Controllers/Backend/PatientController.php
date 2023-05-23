<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Image;

class PatientController extends Controller
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
        $this->upload_path = public_path("images/patients/");
        $this->width = 1208;
        $this->height = 970;
        $this->default_pagination = 25;

        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }
    }

    public function index()
    {
        return view('backend.patient.index', [
            'patients' => Patient::latest()->get()
        ]);
    }


    public function create()
    {
        return view('backend.patient.create', [
            'doctors' => Doctor::latest()->get()
        ]);
    }


    public function store(PatientRequest $request)
    {
        $input = $request->all();

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => 3
            ]
        );
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,

        ];

        $attachmentPath = '';
        $attachmentName = '';

        send_email($request->email, 'Register Message', 'email.register', ['data' => $data], $attachmentPath, $attachmentName);

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
        $appointment_time = Carbon::createFromFormat('l d F Y - H:i', $request->appointment_time);
        $input["appointment_time"] = $appointment_time;

        $input["patient_id"] =substr(Str::random(10), 0, 4);;
        $input["check_in_date"]= date('Y-m-d H:i:s');
        $input["age"]=$request->age;

        $doctor = Doctor::find($request->doctor_id);

        $formated_date = $appointment_time->format('l Y-m-d ');
        $formated_time = $appointment_time->format('h:i A');

        Patient::create($input);

        if ($request->email != null) {

            $data = [
                "name" => $request->name,
                "doctor_name" => $doctor->name,
                "date" => $formated_date,
                "appointment_time" => $formated_time,
                "room_no" => $request->room_no

            ];

            $attachmentPath = '';
            $attachmentName = '';

            send_email($request->email, 'Appointment Message', 'email.appointment', ['data' => $data], $attachmentPath, $attachmentName);
        }

        return redirect()
            ->route("patients.index")
            ->with("message", "Patient added successfully.");
    }

    public function show(Patient $patient)
    {
        return view('backend.patient.show',[
            'patient'=>$patient
            
        ]);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        if($patient->image){
            File::delete($this->upload_path . $patient->image);
        }
        return redirect()
            ->route("patients.index")
            ->with("message", "Patient delete successfully.");
    }
}
