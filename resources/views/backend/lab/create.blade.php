@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Generate Lab Report</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Create Lab Report</h2>
            </div>
            <div class="card-body">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">User Detail</h4>
                        </div> --}}
                        <div class="card-body">


                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Select Report
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" id="reportName" class="form-control">
                                        <option value="">--select--</option>
                                        <option value="hemo">Blood Test (Hemoglobin)</option>
                                        <option value="urine">Urine Test</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <form action="{{route('getReport')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                    <div class="card" id="bloodReport">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="contact">Hemoglobin
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="contact" value="{{old('hemoglobin')}}"
                                        name="hemoglobin">
                                    @error('hemoglobin') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="rbc">Red Blood Cell Count
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="rbc" id="email"
                                        value="{{ old('rbc') }}" autocomplete="off">
                                    @error('rbc') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="contact">Patient Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="patient_id" id="" class="form-control">
                                        <option value="">--Select Patient--</option>
                                        @foreach ($patients as $patient)
                                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('specialist') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="Hematocrit">Hematocrit
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" value="{{old('hematocrit')}}" id=""
                                        name="hematocrit">

                                    @error('hematocrit') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    <button class="btn btn-primary" type="submit">Print</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#bloodReport').hide();
    $("#reportName").change(function() {

        $('#bloodReport').show();

    });
    
    });
</script>
@endsection