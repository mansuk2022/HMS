@extends('layouts.app')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-lg-block">
                <a href="{{route('doctors.create')}}" class="btn btn-primary btn-rounded">+ Add New</a>
            </div>
            {{-- <div class="input-group search-area ml-auto d-inline-flex mr-2">
                <input type="text" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                </div>
            </div>
            <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a> --}}
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table id="example5" class="table shadow-hover  table-bordered mb-4 dataTablesCard fs-14">
                        <thead>
                            <tr>
                                {{-- <th>
                                    <div class="checkbox align-self-center">
                                        <div class="custom-control custom-checkbox ">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </div>
                                </th> --}}
                                <th>Image</th>
                                <th>SN</th>
                                <th>Date Join</th>
                                <th>Doctor Name</th>
                                <th>Specialist</th>
                                {{-- <th>Schedule</th> --}}
                                <th>Contact</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img alt="{{$doctor->name}}" src="{{ (($doctor->image != '') && file_exists(public_path('images/doctors/'.$doctor->image))) ? asset('images/doctors/'.$doctor->image) : asset('images/fallback-logo.png') }}"  height="60" width="60" class="rounded-circle ml-4">
                                        </div>
                                    </td>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{date('l, F jS Y', strtotime($doctor->join_date))}} </td>
                                    <td>Dr. {{$doctor->name}} </td>
                                    <td> {{$doctor->specialist}} </td>
                                    {{-- <td>
                                        <a href="#" class="btn btn-primary light btn-rounded btn-sm text-nowrap">5
                                            Appointment</a>
                                    </td> --}}
                                    <td><span class="font-w500">{{$doctor->contact}} </span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="text-light font-w600"> {{$doctor->status == 1 ? 'Available':'UnAvailable'}} </span>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z"
                                                            stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z"
                                                            stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z"
                                                            stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                     <form class="form-inline" method="post" action="{{ route('doctors.destroy',$doctor->id) }}">
                                                         @csrf
                                                         @method('delete')
                                                         <a class="dropdown-item" href="{{route('doctors.show',$doctor->id)}}">View Detail</a>
                                                         <a class="dropdown-item" href="{{route('doctors.edit',$doctor->id)}}">Edit</a>
                                                        <button onclick="return confirm('Are you sure to delete this doctor?')" type="submit" class="dropdown-item" style="border: none; background-color: transparent;">
                                                            Delete
                                                        </button>   
                                                     </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>No Data Available</td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection