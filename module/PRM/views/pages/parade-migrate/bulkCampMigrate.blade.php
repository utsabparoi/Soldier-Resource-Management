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
                    <li class="active">All Soldier</li>
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
                        <h4 class="widget-title">Soldier List <span class="badge"
                                                                   style="margin-bottom: 5px; background-color: #2595dc !important; color: #ffffff !important;">Total: {{ $all_parade->count() }} </span>
                        </h4>


                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.parade.create') }}" class="text-center"
                               style="width: 110px; background-color: #2595dc !important; color: #ffffff !important;">
                                <i class="fa fa-plus"></i> Add <span class="hide-in-sm">Soldier</span>
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
                                                            <select class="col-xs-10 col-sm-10 multiselect"
                                                                    id="paradeCamp"
                                                                    onchange="getCampParadeInformation()">
                                                                <option value="">-Select Camp-</option>
                                                                @foreach($camp_name as $camp_names)
                                                                    <option
                                                                        value="{{ $camp_names->id }}">{{ $camp_names->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10 multiselect"
                                                                    id="paradeRank"
                                                                    onchange="getParadeInformation()">
                                                                <option value="">-Select Rank-</option>
                                                                <option value="Major">Major</option>
                                                                <option value="Captain">Captain</option>
                                                                <option value="Senior Officer">Senior Officer</option>
                                                                <option value="Officer">Officer</option>
                                                                <option value="Junior Officer">Junior Officer</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10 multiselect" id="parade">
                                                                <option value="">-Select Soldier-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- search and refresh button Name -->
                                                <div class="col-sm-3">
                                                    <button class="btn btn-primary" type="button"
                                                            id="uploadPercent" onclick="paradeSearchResult()"
                                                            style="background-color: #431cff !important; border: none;"
                                                            \>
                                                        <i class="ace-icon fa fa-search bigger-110"></i>
                                                        Search
                                                    </button>
                                                    <button class="btn btn-grey" type="button"
                                                            id="uploadPercent"
                                                            onclick="refreshPage()"
                                                            style="background-color: #828282 !important; border: none;"
                                                            \>
                                                        <i class="ace-icon fa fa-refresh bigger-110"></i>
                                                        Refresh
                                                    </button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <br>

                                    <span id="searchResulInfo" style="color: #00BE67;"></span>

                                    <div class="table-responsive">
                                        <form action="{{ route('prm.bulk-import') }}" id="Form"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <table id="dynamic-table"
                                                class="table table-striped table-bordered table-hover new-table">
                                                <thead>
                                                <tr>
                                                    <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                    <th width="5%" class="text-center">Select</th>
                                                    <th width="30%">Name</th>
                                                    <th width="30%">Present Camp(Location)</th>
                                                </tr>
                                                </thead>

                                                <tbody id="paradeTable">

                                                @forelse($parade as $parades)
                                                    <tr>
                                                        <td class="hide-in-sm text-center"
                                                            style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">
                                                                {{ $loop->iteration }}
                                                            </span></td>
                                                        <td style="display:table-cell; vertical-align:middle;" class="text-center">
                                                            <input type="checkbox" id="" name="bulk_id[]" value="{{ $parades->id }}">
                                                        </td>
                                                        <td style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">
                                                                <img
                                                                    src="@if($parades->image) {{ asset($parades->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                                    width="50px" height="50px"
                                                                    style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                                <ul style="list-style: none; margin-top: 7px;">
                                                                    <li style="font-weight: bold;">{{ $parades->name }}</li>
                                                                    <li style="font-weight: bold;">{{ $parades->next_rank }}</li>
                                                                </ul>
                                                            </span></td>
                                                        <td style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">{{ $parades->camp->name}}</span>
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
                                            <div class="form-group">
                                                <!-- Add Page -->
                                                <h5 class="widget-title">
                                                    <div class="row"
                                                        style="margin-top: 10px;padding:5px">
                                                        <div class="col-md-12 text-center pr-2">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm btn-block"
                                                                style="max-width: 150px">
                                                                <i class="fa fa-save"></i> Migrate
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="space-10"></div>
                                                </h5>
                                            </div>
                                        </form>
                                        <span id="paginateID">
                                        @include('partials._paginate',['data'=> $parade])
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



    <script>
        function getCampParadeInformation() {
            //let campID = document.getElementById('paradeCamp').value;
            $('#paradeRank').empty();
            $('#paradeRank').append('<option value="">' + "-Select Rank-" + '</option>');
            $('#paradeRank').append('<option value="Major">' + "Major" + '</option>');
            $('#paradeRank').append('<option value="Captain">' + "Captain" + '</option>');
            $('#paradeRank').append('<option value="Senior Officer">' + "Senior Officer" + '</option>');
            $('#paradeRank').append('<option value="Officer">' + "Officer" + '</option>');
            $('#paradeRank').append('<option value="Junior Officer">' + "Junior Officer" + '</option>');
            $('#paradeRank').append('<option value="Other">' + "Other" + '</option>');

            let campName = document.getElementById('paradeCamp').value;
            let rank = document.getElementById('paradeRank').value;
            let url = "/parade_search";
            let data = {CampName: campName, Rank: rank};
            axios.post(url, data).then(function (response) {
                var responseData = response.data;
                var serialNumber = 1;
                $('#parade').empty();
                for (let i = 0; i < responseData.length; i++) {
                    $('#parade').append('<option value="">' + responseData[i].name + '</option>');
                    serialNumber++;
                }
            }).catch(function (error) {

            })
        }

        function getParadeInformation() {
            let campName = document.getElementById('paradeCamp').value;
            let rank = document.getElementById('paradeRank').value;
            let url = "/parade_search";
            let data = {CampName: campName, Rank: rank};
            axios.post(url, data).then(function (response) {
                var responseData = response.data;
                var serialNumber = 1;
                $('#parade').empty();
                for (let i = 0; i < responseData.length; i++) {
                    $('#parade').append('<option value="">' + responseData[i].name + '</option>');
                    serialNumber++;
                }
            }).catch(function (error) {

            })
        }


        function paradeSearchResult() {
            let campName = document.getElementById('paradeCamp').value;
            let rank = document.getElementById('paradeRank').value;
            let url = "/parade_search";
            let data = {CampName: campName, Rank: rank};
            axios.post(url, data).then(function (response) {
                var responseData = response.data;
                var serialNumber = 1;
                $('#paradeTable').empty();
                $('#paginateID').empty();
                document.getElementById('searchResulInfo').innerHTML = responseData.length + " Soldier Found!";
                for (let i = 0; i < responseData.length; i++) {
                    $('#paradeTable').append('<tr>\n' +
                        '                                                    <td class="hide-in-sm text-center" style="display:table-cell; vertical-align:middle;"><span class="span">\n' +
                        '                                                            ' + serialNumber + '\n' +
                        '                                                        </span></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;" class="text-center"><input type="checkbox" id="" name="bulk_id[]" value="' + responseData[i].id + '"></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;"><span class="span">\n' +
                        '                                                            <img src="{{asset('')}}' + responseData[i].image + '" width="50px" height="50px"  style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">\n' +
                        '                                                            <ul style="list-style: none; margin-top: 7px;">\n' +
                        '                                                                <li style="font-weight: bold;">' + responseData[i].name + '</li>\n' +
                        '                                                                <li style="font-weight: bold;">' + responseData[i].next_rank + '</li>\n' +
                        '                                                            </ul>\n' +
                        '                                                        </span></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;"><span\n' +
                        '                                                            class="span">' + responseData[i].camp.name + '</span>\n' +
                        '                                                    </td>\n' +
                        '                                                </tr>');
                    serialNumber++;
                }
            }).catch(function (error) {

            })
        }


        function refreshPage() {
            location.reload();
        }
    </script>
@endsection
