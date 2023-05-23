<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    Public function index(){
        
        return view('dashboard.index',[
            'patients'=> Patient::latest()->get(),
            'doctors'=>Doctor::latest()->get()
        ]);
    }
}
