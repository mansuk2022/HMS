<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Bed;
use App\Models\Backend\BedBooking;
use App\Models\Backend\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.bed.index',[
        'beds'=>Bed::latest()->get()
       ]);
    }

    public function create()
    {
        return view('backend.bed.create',[
            'rooms'=>Room::latest()->get()
        ]);
    }

  
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "room_id" => "required",
                "bed_no" => "required",
                "price" => "required",
            ],
            [
                "room_id.required" => "Room is required",
                "bed_no.required" => "Bed no is required",
                "price.required" =>"Price is required"
                
            ]
        );

        $input = $request->all();

        $banner = Bed::create($input);
        return redirect()->route('bed.index')->with('message','Bed Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBed()
    {
        return view('backend.bed.booking.create',[
            'rooms'=>Room::latest()->get()
        ]);
    }

   
    public function edit(Bed $bed)
    {
        // dd('here');
        return view('backend.bed.edit',[
            'bed'=>$bed,
            'rooms'=>Room::latest()->get()
        ]);
        
    }

   
    public function update(Request $request, Bed $bed)
    {
        $this->validate(
            $request,
            [
                "room_id" => "required",
                "bed_no" => "required",
                "price" => "required",
            ],
            [
                "room_id.required" => "Room is required",
                "bed_no.required" => "Bed no is required",
                "price.required" => "Price is required"

            ]
        );
        $input = $request->all();

        $bed->update($input);
        return redirect()->route('bed.index')->with('info', 'Bed Updated Successfully !');

    }

   
    public function destroy($id)
    {
        //
    }


    public function getChild($id)
    {
        $states = DB::table('beds')->where('room_id', $id)->get();
        if (count($states) > 0) {
            return response()->json($states);
        }

    }

    public function bedBoking(Request $request){
        // return view('backend.bed.bookingpdf');

        $this->validate(
            $request,
            [
                // "room_id" => "required",
                "bed_no" => "required",
                "reservation_date" => "required",
                "user_name"=>"required",
                "user_address"=>"required",
                "user_contact"=>"required",
            ],
            [
                // "room_id.required" => "Room ward is required",
                "bed_no.required" => "Bed no is required",
                "reservation_date.required" => "Price is required",
                "user_name"=>"Name is required",
                "user_address"=>"Address Required",
                "user_contact"=>"Contact is required"
            ]
        );
        $input = $request->all();

        $reservation_date = Carbon::createFromFormat('l d F Y - H:i', $request->reservation_date);
        $input["reservation_date"] = $reservation_date;

        $room=Room::find($request->room_id);

        $data = [
            'name' => $request->user_name,
            'address' => $request->user_address,
            'contact' => $request->user_contact,
            'room_no' => $room->room_no,
            'reservation_date'=> $reservation_date,
            'floor'=>$room->floor,
            'price'=>$request->price,
            'bed_no'=>$request->bed_no

        ];

        $pdf = PDF::loadView('backend.bed.bookingpdf', $data);
        return $pdf->download('reservation.pdf');

        $banner = BedBooking::create($input);
        
    }


    public function getRerservations(){
        return view('backend.reservation.index',[
            'reservations'=>BedBooking::latest()->get()
        ]);
    }

}
