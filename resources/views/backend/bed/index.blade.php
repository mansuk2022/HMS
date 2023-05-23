@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div> --}}
        <!-- row -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bed</h4>
                    <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                        <div class="mr-auto d-none d-lg-block">
                            <a href="{{route('bed.create')}}" class="btn btn-primary btn-rounded">+ Add New</a>
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
                                    <th>Room Name</th>
                                    <th>Bed No</th>
                                    <th>Floor</th>
                                    <th>Room NO</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $beds as $bed)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>

                                    <td>{{$bed->room->room_name}} </td>
                                    <td>{{$bed->bed_no}}</td>
                                    <td>{{$bed->room->floor}}</td>
                                    <td>{{$bed->room->room_no}}</td>
                                    <td>{{$bed->price}}</td>
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
                                                <a class="dropdown-item"
                                                    href="{{route('bed.edit',$bed->id)}}">Edit</a>
                                                {{-- <a class="dropdown-item" href="#">Reject Order</a> --}}
                                                {{-- <a class="dropdown-item"
                                                    href="{{route('room.distroy',$room->id)}}">Delete</a> --}}
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