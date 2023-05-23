@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Patient Create</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Patient</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">list</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Create a New Patient</h2>
            </div>
            <div class="card-body">

                <form action="{{route('patients.store')}}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf                    
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="val-username" name="name"
                                value="{{ old('name') }}" placeholder="Enter a username..">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                placeholder="Enter email..">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Password
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="" name="password" autocomplete="off">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- <div class="form-group col-lg-6">
                            <label class="" for="val-username">Confirm Password
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" name="password_confirmation" id="" value="" autocomplete="off">
                            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Dieases
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="" name="dieases" autocomplete="off">
                            @error('dieases') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="room_no">Room No
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="room_no" id="" value=""
                                autocomplete="off">
                            @error('room_no') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Contact
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="contact" value="{{old('contact')}}"
                                name="contact">
                            @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="address">Address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="address" id="email"
                                value="{{ old('address') }}" autocomplete="off">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Assign Doctor
                                <span class="text-danger">*</span>
                            </label>
                            <select name="doctor_id" id="" class="form-control">
                                <option value="">--Select Doctor--</option>

                                @foreach ($doctors as $doctor )
                                 <option value="{{$doctor->id}}" > {{$doctor->name}} </option>
                                @endforeach
                               
                            </select>
                            @error('doctor_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="join date">Appointment Time
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="{{old('appointment_time')}}" id="date-format"
                                name="appointment_time">

                            @error('appointment_time') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Gender
                                <span class="text-danger">*</span>
                            </label>
                            <select name="gender" id="" class="form-control">
                                <option value="">--Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="address">Status
                                <span class="text-danger">*</span>
                            </label>
                            <select name="status" id="" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="1">Pending</option>
                                <option value="2">Recorvered</option>
                                <option value="3">On Recovery</option>
                                <option value="4">Rejected</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Blood Group
                                <span class="text-danger"></span>
                            </label>
                            <select name="blood_group" id="" class="form-control">
                                <option value="">--Select Blood Group</option>
                                <option value="A+">(A+)</option>
                                <option value="A-">(A-)</option>
                                <option value="B+">(B+)</option>
                                <option value="B-">(B-)</option>
                                <option value="O+">(O+)</option>
                                <option value="O-">(O-)</option>
                                <option value="AB+">(AB+)</option>
                                <option value="AB-">(AB-)</option>
                               
                            </select>
                            @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="address">Age
                                <span class="text-danger">*</span>
                            </label>
                           <input type="number" name="age" value="{{old('age')}}" class="form-control" >
                            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="address">Required Treatment
                                <span class="text-danger"></span>
                            </label>
                            <input type="text" name="treatment" value="{{old('treatment')}}" class="form-control">
                            @error('treatment') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                    </div>
                    <div class="form-group col-md-9">
                        <img src="{{ asset('backend/images/logo.png') }}" alt="Doctor Image" class="rounded" id="image"
                            width="200px">
                    </div>
                    <div class="form-group col-md-9">
                        <input type="file" name="image"
                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                            accept="image/*" class="form-control">
                        @if($errors->has('image'))
                        <span class="text-danger">
                            {{ $errors->first('image') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-lg-12 mt-3">
                        <label class="" for="address">Description
                            <span class="text-danger">*</span>
                        </label>
                        <textarea name="description" class="summernote" id=""></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Patient Statstics</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Heart Rate
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="val-username" name="heart_rate"
                                        value="{{ old('heart_rate') }}" >
                                    @error('heart_rate') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Oxygen Level
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="oxygen_level" id="email"
                                        value="{{ old('oxygen_level') }}" >
                                    @error('oxygen_level') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Sugar
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="" name="sugar" autocomplete="off">
                                    @error('sugar') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                    
                            </div>
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