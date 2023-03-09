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
                    <li class="active">All Parade</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                                    <span class="input-icon">
                                        <input type="text" placeholder="Search Parade ..." class="nav-search-input"
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
                        <h4 class="widget-title">Parade List <span class="badge badge-primary" style="margin-bottom: 5px;">Total: {{ $all_parade->count() }} </span>
                        </h4>


                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.parade.create') }}" class="btn-primary text-center" style="width: 110px;">
                                <i class="fa fa-plus"></i> Add <span class="hide-in-sm">Parade</span>
                            </a>
                        </span>
                    </div>


                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="widget-body" style="border: 1px solid #e7e7e7">
                                        <div class="widget-main">
                                            <div class="row">
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <input type="text" name="comanyName" id="comanyName"
                                                                   value="Perfect Ten"
                                                                   class="col-xs-10 col-sm-10" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10" id="paradeCamp" onchange="getRankInformation()">
                                                                <option value="">-Select Camp-</option>
                                                                @foreach($camp_name as $camp_names)
                                                                         <option value="{{ $camp_names->name }}">{{ $camp_names->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10" id="paradeRank">
                                                                <option value="">-Select Rank-</option>
                                                                <option value="Major">Major</option>
                                                                <option value="Captain">Captain</option>
                                                                <option value="Senior Officer">Senior Officer</option>
                                                                <option value="Officer">Officer</option>
                                                                <option value="Junior Officer">Junior Officer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10">
                                                                <option value="">-Select Parade-</option>
                                                                @foreach($all_parade as $all_parades)--}}
                                                                        <option value="">{{ $all_parades->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div align="right" class="row" style="margin-right: 39px;">
                                                <div class="col-sm-12">
                                                    <a href="/">
                                                        <button class="btn btn-primary" type="button"
                                                                id="uploadPercent" style="background-color: #431cff !important; border: none;" \>
                                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                                            Search
                                                        </button>
                                                    </a>
                                                    <button class="btn btn-grey" type="button"
                                                            id="uploadPercent" style="background-color: #828282 !important; border: none;" \>
                                                        <i class="ace-icon fa fa-refresh bigger-110"></i>
                                                        Refresh
                                                    </button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <br>


                                    <div class="table-responsive">
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover new-table">
                                            <thead>
                                            <tr>
                                                <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                <th width="30%">Name</th>
                                                <th width="20%">Joining Date</th>
                                                <th width="20%">Camp</th>
                                                <th width="10%">Status</th>
                                                <th width="15%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody id="paradeTable">

                                            @forelse($parade as $parades)
                                                <tr>
                                                    <td class="hide-in-sm text-center" style="display:table-cell; vertical-align:middle;"><span class="span">
                                                            {{ $loop->iteration }}
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span class="span">
                                                            <img src="@if($parades->image) {{ asset($parades->image) }} @else {{ asset('backend/images/person.png') }} @endif" width="50px" height="50px"  style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                            <ul style="list-style: none; margin-top: 7px;">
                                                                <li style="font-weight: bold;">{{ $parades->name }}</li>
                                                                <li style="font-weight: bold;">{{ $parades->next_rank }}</li>
                                                            </ul>
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span class="span">{{ $parades->join_date_present_unit }}</span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">{{ \Module\PRM\Models\Camp::where('id', $parades->present_location)->first()->name }}</span>
                                                    </td>
                                                    <td class="left" style="display:table-cell; vertical-align:middle;">
                                                        <!--------------- STATUS EDIT---------------->
                                                        <div>
                                                            <label>
                                                                <span class="span">
                                                            <x-status status="{{ $parades->status }}"
                                                                      id="{{ $parades->id }}" table="{{ $table }}"/>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center" style="display:table-cell; vertical-align:middle;">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.paradeProfile', $parades->id) }}"
                                                               role="button" class="btn btn-xs btn-grey bs-tooltip"
                                                               title="Full Biodata">
                                                                <i class="fa fa-user"></i>
                                                            </a>

                                                            <a href="{{ route('prm.parade.edit', $parades->id) }}"
                                                               role="button" class="btn btn-xs btn-success bs-tooltip"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.parade.destroy', $parades->id) }}`)"
                                                                    class="btn btn-xs btn-danger bs-tooltip"
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
                                        @include('partials._paginate',['data'=> $parade])
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
        $(document).ready(function () {
            $("#searchParade").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#paradeTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>



    <script>
        function getRankInformation(){
            let camp = document.getElementById('paradeCamp').value;
            $('#paradeRank').empty();
            @foreach($all_parade as $all_parades)
                @if('Major' == $all_parades->present_location)
            $('#paradeRank').append('<option value="Major">'+ 'ok' +'</option>');
                @endif
            @endforeach
            // $('#paradeRank').append('<option value="Major">'+  +'</option>');

                // let url = "/getRank";
                // let data = {};
                //
                // axios.post(url, data).then( function (response) {
                //     alert('ok');
                // }).catch(function (error) {
                //     alert('error')
                // })
        }
    </script>
@endsection
