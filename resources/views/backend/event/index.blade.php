@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event</h4>
                    <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                        <div class="mr-auto d-none d-lg-block">
                            <a href="{{route('event.create')}}" class="btn btn-primary btn-rounded">+ Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>
                                        SN
                                    </th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $events as $event)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>{{$event->event_title}} </td>
                                    <td>{{$event->event_location}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-right">
                                            <div class="btn-link" data-toggle="dropdown">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <form class="form-inline" method="post" action="{{ route('event.destroy',$event->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    {{-- <a class="dropdown-item" href="{{route('doctors.show',$doctor->id)}}">View Detail</a> --}}
                                                    {{-- <a class="dropdown-item" href="{{route('event.edit',$event->id)}}">Edit</a> --}}
                                                    <button onclick="return confirm('Are you sure to delete this event?')" type="submit" class="dropdown-item" style="border: none; background-color: transparent;">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        No Data Available
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
