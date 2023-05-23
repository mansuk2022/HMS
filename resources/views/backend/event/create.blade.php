@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Event Create</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h2 class="lead text-center">Create a New Event</h2>
            </div>
            <div class="card-body">
                <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="" for="contact">Event Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="contact" value="{{old('event_title')}}" name="event_title">
                                    @error('event_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="" for="address">Event Location
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="event_location" id="email" value="{{ old('event_location') }}" autocomplete="off">
                                    @error('event_location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                              <div class="row">
                                  <div class="form-group col-lg-6">
                                      <label class="" for="contact">Start Date
                                          <span class="text-danger">*</span>
                                      </label>
                                      <input type="text" class="form-control date-format" id="date-format" value="{{old('start_date')}}" name="start_date">
                                      @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-6">
                                      <label class="" for="address">End Date
                                          <span class="text-danger">*</span>
                                      </label>
                                      <input type="text" class="form-control date-format" name="end_date" id="date-format1" value="{{ old('end_date') }}" autocomplete="off">
                                      @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                              </div>
                            <div class="form-group col-lg-12 mt-3">
                                <label class="" for="event_description">event_description
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea name="event_description" class="summernote" id=""></textarea>
                                @error('event_description') <span class="text-danger">{{ $message }}</span> @enderror
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
