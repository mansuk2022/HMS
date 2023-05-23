@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Doctor Create</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">list</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Create a New User</h2>
            </div>
            <div class="card-body">

                <form action="{{route('doctors.store')}}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">User Detail</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Username
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
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Enter email..">
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
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Confirm Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" name="password_confirmation" id=""
                                        value="" autocomplete="off">
                                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="contact">Contact
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="contact" value="{{old('contact')}}" name="contact">
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
                            <label class="" for="contact">Specialist
                                <span class="text-danger">*</span>
                            </label>
                            <select name="specialist" id="" class="form-control">
                                <option value="">--Select Specialist--</option>
                                <option value="Radiologist">Radiologist</option>
                                <option value="Surgen">Surgen</option>
                                <option value="Physcian">Physcian</option>
                                <option value="Gynocologyst">Gynocologyst</option>
                            </select>
                        @error('specialist') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="join date">Join Date
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="{{old('join_date')}}" id="mdate" name="join_date" >

                            @error('join_date') <span class="text-danger">{{ $message }}</span> @enderror
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
                                <option value="1">Available</option>
                                <option value="0">UnAvailable</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
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