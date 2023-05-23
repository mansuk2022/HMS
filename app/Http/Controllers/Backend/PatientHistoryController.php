<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PatientHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    public function history($patient_id){

        return view('backend.patient.history.index',[
            'histories'=>PatientHistory::where('patient_id',$patient_id)->get(),
            'patient_id'=>$patient_id
        ]);
    }

    public function create($patient_id){

        return view('backend.patient.history.create', [
            'patient_id' => $patient_id
        ]);
    }

    public function store(Request $request){
        $input = $request->all();

        $history_date = Carbon::createFromFormat('l d F Y - H:i', $request->history_date);
        $input["history_date"] = $history_date;

       $history=PatientHistory::create($input);
        return redirect()
            ->route('patient-history',$history->patient_id)
            ->with("message", "History added successfully.");
    }

    public function destroy($id)
    {
        $history=PatientHistory::find($id);
        $history->delete();
        return redirect()
            ->back()
            ->with("message", "History delete successfully.");
    }

}
