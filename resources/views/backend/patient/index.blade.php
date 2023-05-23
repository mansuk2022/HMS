@extends('layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Patient</h4>
                    <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                        <div class="mr-auto d-none d-lg-block">
                            <a href="{{route('patients.create')}}" class="btn btn-primary btn-rounded">+ Add New</a>
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
                                    <th>Patient Id</th>
                                    <th>Date Check in</th>
                                    <th>Name</th>
                                    <th>Assgined</th>
                                    <th>Disease</th>
                                    <th>Status</th>
                                    <th>Room no</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $patients as $patient)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>

                                    <td>{{$patient->patient_id}} </td>
                                    <td>{{\Carbon\Carbon::parse($patient->check_in_date)->format('l d F Y')}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>Dr. {{$patient->doctor->name}}</td>
                                    <td>{{$patient->dieases}}</td>
                                    <td>
                                        @if($patient->status==1)
                                        <span class="badge light badge-info">
                                            <i class="fa fa-circle text-info mr-1"></i>
                                            New Patient
                                        </span>
                                        @elseif($patient->status==2)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i>
                                            Recovered
                                        </span>
                                        @elseif($patient->status==3)
                                        <span class="badge light badge-warning">
                                            <i class="fa fa-circle text-warning mr-1"></i>
                                            On Recovery
                                        </span>
                                        @else
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i>
                                            Critical
                                        </span>
                                        @endif

                                    </td>
                                    <td>{{$patient->room_no}}</td>
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
                                                <form class="form-inline" method="post" action="{{ route('patients.destroy',$patient->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="dropdown-item" href="{{route('patient-history',$patient->id)}}">History</a>
                                                    {{-- <a class="dropdown-item" href="#">Reject Order</a> --}}
                                                    <a class="dropdown-item" href="{{route('patients.show',$patient->id)}}">View Details</a>
                                                    <button onclick="return confirm('Are you sure to delete this patient?')" type="submit" class="dropdown-item" style="border: none; background-color: transparent;">
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
