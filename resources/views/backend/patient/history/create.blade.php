@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>History Create</h4>
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Patient</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">list</a></li>
                </ol>
            </div> --}}
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Create a New History</h2>
            </div>
            <div class="card-body">

                <form action="{{route('patient-history.store')}}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="history_title" class="form-control" value="{{old('history_title')}}">
                            <input type="hidden" value="{{$patient_id}}" name="patient_id">
                            @error('history_title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="join date">Date
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="{{old('history_date')}}" id="date-format"
                                name="history_date">

                            @error('history_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div> 
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection