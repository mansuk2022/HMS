<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Patient;
use Illuminate\Http\Request;
use PDF;

class LabReportController extends Controller
{
    public function generateLabReport()
    {
        return view('backend.lab.create', [
            'patients' => Patient::latest()->get()
        ]);
    }

    public function getReport(Request $request)
    {
        $request->validate([
            'patient' => 'numeric|integer|min:1|max:10',
            'hemoglobin' => 'numeric|integer|min:1|max:10',
            'rbc' => 'numeric|integer|min:1|max:10',
            'hematocrit' => 'numeric|integer|min:1|max:10',
        ]);

        $patient = Patient::find($request->patient_id);

        $data = [
            'patient' => $patient,
            'hemoglobin' => $request->hemoglobin,
            'rbc' => $request->rbc,
            'hematocrit' => $request->hematocrit

        ];

        $pdf = PDF::loadView('backend.lab.bloodReport', $data);
        return $pdf->download('bloodReport.pdf');
    }
}
