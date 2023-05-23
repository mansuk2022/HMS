<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function index()
    {
        return view('backend.room.index',
        [
            'rooms'=>Room::latest()->get()
        ]
    );
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
