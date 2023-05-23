@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Doctor Edit</h4>
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">list</a></li>
                </ol>
            </div> --}}
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Edit Doctor</h2>
            </div>
            <div class="card-body">

                <form action="{{route('doctors.update',$doctor->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">User Detail</h4>
                        </div> --}}
                        {{-- <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Username
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="val-username" name="name" value="{{ old('name') }}" placeholder="Enter a username..">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="val-username">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email..">
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
                                    <input type="password" class="form-control" name="password_confirmation" id="" value="" autocomplete="off">
                                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="contact">Contact
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="contact" value="{{$doctor->contact}}" name="contact">
                                    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="address">Address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="address" id="email" value="{{ $doctor->email }}" autocomplete="off">
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
                                        <option value="Radiologist" {{$doctor->specialist=='Radiologist' ?'selected':'' }}>Radiologist</option>
                                        <option value="Surgen" {{$doctor->specialist=='Surgen' ?'selected':'' }}>Surgen</option>
                                        <option value="Physcian" {{$doctor->specialist=='Physcian' ?'selected':'' }}>Physcian</option>
                                        <option value="Gynocologyst" {{$doctor->specialist=='Gynocologyst' ?'selected':'' }}>Gynocologyst</option>
                                    </select>
                                    @error('specialist') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="join date">Join Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" value="{{$doctor->join_date}}" id="mdate" name="join_date">

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
                                        <option value="male" {{$doctor->gender=='male'?'selected':'' }}>Male</option>
                                        <option value="female" {{$doctor->gender=='female' ?'selected':'' }}>Female</option>
                                        <option value="other" {{$doctor->gender=='other' ?'selected':'' }}>Other</option>
                                    </select>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="address">Status
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="1" {{$doctor->status==1?'selected':'' }}>Available</option>
                                        <option value="0" {{$doctor->status==0 ?'selected':'' }}>UnAvailable</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                            </div>
                            <div class="form-group col-md-9">
                                <img src="{{ (($doctor->image != '') && file_exists(public_path('images/doctors/'.$doctor->image))) ? asset('images/doctors/'.$doctor->image) : asset('images/fallback-logo.png') }}" alt="Banner Image" class="rounded" id="image" width="200px">
                            </div>
                            <div class="form-group col-md-9">
                                <input type="file" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" accept="image/*" class="form-control">
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
                                <textarea name="description" class="summernote" id="">{{$doctor->description}}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
