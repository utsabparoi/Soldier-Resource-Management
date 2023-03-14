@extends('backend.layout.app')
@section('title', 'Biodata')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">All Report</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                                    <span class="input-icon">
                                        <input type="text" placeholder="Search Soldier ..." class="nav-search-input"
                                               id="searchParade" style="width: 200px !important;" autocomplete="off"/>
                                             <i class="ace-icon fa fa-search nav-search-icon"></i>
                                        </span>
                    </form>
                </div>
            </div>
            {{-- main content start from here --}}
            <div class="page-content">

                <!-- DYNAIC CONTENT FROM VIEWS -->


                <div class="widget-box" style="border: none !important;">


                    <!-- header -->
                    <div class="widget-header" style="background: white !important;">
                        <h4 class="widget-title">Report List <span class="badge"
                                                                   style="margin-bottom: 5px; background-color: #2595dc !important; color: #ffffff !important;">Total: {{ $all_report }}  </span>
                        </h4>


                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.apr.create') }}" class="text-center"
                               style="width: 110px; background-color: #2595dc !important; color: #ffffff !important;">
                                <i class="fa fa-plus"></i> Add <span class="hide-in-sm">Report</span>
                            </a>
                        </span>
                    </div>


                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover new-table">
                                            <thead>
                                            <tr>
                                                <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                <th width="30%">Solder</th>
                                                <th width="30%">Report</th>
                                                <th width="15%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody id="paradeTable">

                                            @forelse($annual_reports as $annual_report)
                                                <tr>
                                                    <td class="hide-in-sm text-center"
                                                        style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            {{ $loop->iteration }}
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            <img
                                                                src="@if($annual_report->parade->image) {{ asset($annual_report->parade->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                                width="50px" height="50px"
                                                                style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                            <ul style="list-style: none; margin-top: 7px;">
                                                                <li style="font-weight: bold;">{{ $annual_report->parade->name }}</li>
                                                                <li style="font-weight: bold;">{{ $annual_report->parade->next_rank }}</li>
                                                            </ul>
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">{{ $annual_report->annual_report}}</span>
                                                    </td>
                                                    <td class="text-center"
                                                        style="display:table-cell; vertical-align:middle;">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.paradeProfile', $annual_report->parade_id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: #00d8ff !important; border: 1px solid #00d8ff !important;"
                                                               title="Full Biodata">
                                                                <i class="fa fa-user"></i>
                                                            </a>

                                                            <a href="{{ route('prm.apr.edit', $annual_report->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: limegreen !important; border: 1px solid limegreen !important;"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.apr.destroy', $annual_report->id) }}`)"
                                                                    class="btn btn-xs bs-tooltip"
                                                                    style="background-color: #ff0084 !important; border: 1px solid #ff0084 !important;"
                                                                    title="Delete">
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
                                        <span id="paginateID">
                                        @include('partials._paginate',['data'=> $annual_reports])
                                        </span>
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
