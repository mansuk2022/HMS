<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userExist=Review::where('user_id',$request->user_id)->where('doctor_id',$request->doctor_id)->exists();
       if($userExist==true){
            return redirect()->back()->with('error', 'Review can submitted once');
       }
       else{

        $this->validate(
            $request,
            [
                "review" => "required|max:200",
                "rating" => "required|numeric|min:1",
            ],

            [
                "rating.required" => "Rating is requried",
                "rating.numeric" => "Rating must be number",
                "rating.min" => "Rating must be minimum 1",
            ]
        );

        $data = $request->all();
        $data["patient_name"] = $request->patient_name;
        Review::create($data);

        return redirect()->back()->with('message','Thank you for your review');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
