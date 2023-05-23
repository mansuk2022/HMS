@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Booking Bed</h4>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="card">
                <div class="card-header">
                    <h2 class="lead text-center">Booking Bed</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('bed.booking.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf

                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> 
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="" for="val-username">Room
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="room_id" id="Room_id" class="form-control">
                                    <option value="">--select Room--</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="" for="val-username">Bed No
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="state" name="bed_no">

                                </select>
                                @error('bed_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="" for="val-username">Price per Day
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="price_input_field_id" name="price" autocomplete="off">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="" for="join date">Reservation Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('reservation_date') }}"
                                    id="date-format" name="reservation_date">

                                @error('reservation_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Detail</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="" for="val-username">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="val-username" name="user_name"
                                            value="{{ old('user_name') }}">
                                        @error('user_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="" for="val-username">Address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="user_address" id=""
                                            value="{{ old('user_address') }}">
                                        @error('user_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="" for="val-username">Contact
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="" name="user_contact"
                                            autocomplete="off">
                                        @error('user_contact')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#Room_id').off('change').on('change', function() {
                var countryId = this.value;
                $('#state').html('');
                $('#state').selectpicker();
                $('#state').selectpicker('refresh');
                $.ajax({
                    url: '/get_child_options/' + countryId,
                    type: 'get',
                    success: function(res) {

                        $('#state').html('<option value="">Select Bed</option>');
                        $.each(res, function(key, value) {
                        $('#state').append('<option value="' + value.bed_no + '" data-price="'+ value.price +'">' + value.bed_no + '</option>');
                            $('#state').selectpicker('refresh');
                        });
                    }
                });
            });
            $('#state').on('change', function() {
               var bedPrice = $(this).find(':selected').data('price')
                 $('#price_input_field_id').val(bedPrice).prop('readonly', true);
            });
        });
    </script>
@endsection
