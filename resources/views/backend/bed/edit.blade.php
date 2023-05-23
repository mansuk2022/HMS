@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Edit Bed</h2>
            </div>
            <div class="card-body">

                <form action="{{route('bed.update',$bed->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Room
                                <span class="text-danger">*</span>
                            </label>
                            <select name="room_id" id="" class="form-control">
                                <option value="">--select Room--</option>
                                @foreach ($rooms as $room )
                                
                                <option value="{{$room->id}}" {{$bed->room_id==$room->id ? 'selected':''}}>{{$room->room_name}}</option>
                                @endforeach
                            </select>
                            @error('room_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Bed No
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="bed_no" id="email" value="{{ $bed->bed_no }}"
                                placeholder="Enter Bed No">
                            @error('bed_no') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="" for="val-username">Price
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" id="" name="price" value="{{$bed->price}}" autocomplete="off">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
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
