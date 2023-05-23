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
                    <h4 class="card-title">Patient Histroy</h4>
                    <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                        <div class="mr-auto d-none d-lg-block">
                            <a href="{{route('patient-history-create',$patient_id)}}" class="btn btn-primary btn-rounded">+ Add New</a>
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
                                    <th>History Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $histories as $history)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>

                                    <td>{{$history->history_title}} </td>
                                    <td>{{\Carbon\Carbon::parse($history->history_date)->format('l d F Y')}}</td>
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
                                                <form class="form-inline" method="post" action="{{ route('patient-history-destory',$history->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Are you sure to delete this histroy?')" type="submit" class="dropdown-item" style="border: none; background-color: transparent;">
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
