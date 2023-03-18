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
                    <li class="active">History</li>
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
            <div class="page-content" style="position: relative">
                <span class="background-logo" style="position: absolute;">
                    {{-- <img src="{{ asset('logo.png') }}" alt=""> --}}
                </span>
                <!-- DYNAIC CONTENT FROM VIEWS -->


                <div class="widget-box" style="border: none !important;">


                    <!-- header -->
                    <div class="widget-header" style="background: white !important;">
                        <h4 class="widget-title">{{ $parade->name }} Employment History <span class="badge"
                                                                    style="margin-bottom: 5px; background-color: #2595dc !important; color: #ffffff !important;">Total:  {{$history->count()}} </span>
                        </h4>
                    </div>


                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="searchResulInfo" style="color: #00BE67;"></span>

                                    <div class="table-responsive" >
                                        <table id="dynamic-table"
                                               class="table table-bordered table-hover new-table">
                                            <thead style="font-family: Merienda" style="background:rgb(57, 6, 152) !important;">
                                            <tr class="thead-redesign">
                                                <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                <th width="30%">Date</th>
                                                <th width="20%">Log Type</th>
                                                <th width="20%">Migration To </th>
                                            </tr>
                                            </thead>

                                            <tbody id="paradeTable">
                                            @forelse($history as $historys)
                                                <tr>
                                                    <td class="hide-in-sm text-center"
                                                        style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            {{ $loop->iteration }}
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">{{ $historys->updated_at->format('dM Y') }}</span>
                                                    </td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            @if(isset($historys->camp_id))
                                                                Camp
                                                            @elseif(isset($historys->rank_id))
                                                                Rank
                                                            @elseif(isset($historys->parade_state_id))
                                                                State
                                                            @elseif(isset($historys->leave_application_id))
                                                                Leave
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">@if(isset($historys->camp_id))
                                                                {{ $historys->camp->name }}
                                                            @elseif(isset($historys->rank_id))
                                                                {{ $historys->rank_id }}
                                                            @elseif(isset($historys->parade_state_id))
                                                                {{ $historys->parade_state_id }}
                                                            @elseif(isset($historys->leave_application_id))
                                                                {{ $historys->leaveApplication->leave_category->name }}
                                                            @endif</span>
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

    <script>
        // $(document).ready(function () {
        //     $("#searchParade").on("keyup", function () {
        //         var value = $(this).val().toLowerCase();
        //         $("#paradeTable tr").filter(function () {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
    </script>
@endsection
