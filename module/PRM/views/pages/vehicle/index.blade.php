@extends('backend.layout.app')
@section('title', 'PERFECT TEN')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">All Vehicles</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                   autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content">

                <!-- DYNAIC CONTENT FROM VIEWS -->


                <div class="widget-box">


                    <!-- header -->
                    <div class="widget-header">
                        <h4 class="widget-title"> <i class="fa fa-info-circle"></i> Vehicle List
                        </h4>
                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.store.create') }}" class="">
                                <i class="fa fa-plus"></i> Add <span class="hide-in-sm">New</span>
                            </a>
                        </span>
                    </div>



                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover new-table">
                                            <thead>
                                            <tr>
                                                <th class="text-center" width="5%" class="hide-in-sm">Sl</th>
                                                <th class="text-center" width="25%">Vehicle</th>
                                                <th class="text-center" width="25%">Engine Number</th>
                                                <th class="text-center" width="10%">Chassis Number</th>
                                                <th class="text-center" width="10%">Model Year</th>
                                                <th class="text-center" width="10%">Status</th>
                                                <th width="5%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($vehicles as $vehicle)
                                                <tr>
                                                    <td class="text-center" class="hide-in-sm"><span class="span">{{ $loop->iteration }}</span></td>
                                                    <td class="text-center"><span class="span">{{ $vehicle->name }}</span></td>
                                                    <td class="text-center"><span class="span">{{ $vehicle->engine_number }}</span></td>
                                                    <td class="text-center"><span class="span">{{ $vehicle->chassis_number }}</span></td>
                                                    <td class="text-center"><span class="span">{{ $vehicle->model_year }}</span></td>
                                                    <td class="text-center">
                                                        <!--------------- STATUS EDIT---------------->
                                                        <div>
                                                            <label>
                                                                <span class="span">
                                                            <x-status status="{{ $vehicle->status }}" id="{{ $vehicle->id }}" table="{{ $table }}" />
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.vehicle.edit', $vehicle->id) }}"
                                                               role="button" class="btn btn-xs btn-success bs-tooltip"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.vehicle.destroy', $vehicle->id) }}`)"
                                                                    class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="30" class="text-center text-danger py-3"
                                                        style="background: #eaf4fa80 !important; font-size: 18px">
                                                        <strong>No records found!</strong>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                        @include('partials._paginate',['data'=> $vehicles])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            {{-- main content end  --}}
        </div>
    </div>
@endsection
