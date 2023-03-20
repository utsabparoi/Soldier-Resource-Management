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
                                        <div class="widget-main" style="margin-bottom:-15px">
                                            <div class="row" style="display: flex;justify-content:flex-start">
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select class="col-xs-10 col-sm-10 multiselect" id="paradeCamp"
                                                            onchange="getCampParadeInformation()">
                                                            <option value="">-Select Camp-</option>
                                                            @foreach ($camp_name as $camp_names)
                                                                <option value="{{ $camp_names->id }}">
                                                                    {{ $camp_names->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Last Leave -->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select name="last_leave_months" class="col-xs-10 col-sm-10 multiselect" id="lastLeave"
                                                            onchange="getSoldierLastLeave()">
                                                            <option value="">-Select Last Leave-</option>
                                                            <option value="3">within 3 months</option>
                                                            <option value="2">within 2 months</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Rank Name -->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select class="col-xs-10 col-sm-10 multiselect" id="paradeRank"
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
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10 multiselect" id="parade">
                                                                <option value="">-Select Soldier-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- search and refresh button Name -->
                                                <div class="col-sm-3">
                                                    <button class="btn btn-primary" type="button" id="uploadPercent"
                                                        onclick="paradeSearchResult()"
                                                        style="background-color: #431cff !important; border: none;border-color:#AAAAAA;height:28px !important;border-radius:4px !important;padding:2px 6px 2px 6px"
                                                        \>
                                                        <i class="ace-icon fa fa-search bigger-110"></i>
                                                        Search
                                                    </button>
                                                    <button class="btn btn-grey" type="button"
                                                            id="uploadPercent"
                                                            onclick="refreshPage()"
                                                            style="background-color: #828282 !important; border: none;border-color:#AAAAAA;height:28px !important;border-radius:4px !important;padding:2px 6px 2px 6px"
                                                            \>
                                                        <i class="ace-icon fa fa-refresh bigger-110"></i>
                                                        Refresh
                                                    </button>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <br>

                                    <span id="searchResulInfo" style="color: #00BE67;"></span>

                                    <div class="table-responsive" >
                                        <table id="dynamic-table"
                                               class="table table-bordered table-hover new-table">
                                            <thead style="font-family: Merienda" style="background:rgb(57, 6, 152) !important;">
                                                <tr class="thead-redesign">
                                                    <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                    <th width="30%">Name</th>
                                                    <th width="15%">Joining Date</th>
                                                    <th width="20%">Camp</th>
                                                    <th width="15%">State</th>
                                                    <th width="15%" class="text-center" style="width: 120px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="paradeTable">

                                            @forelse($parade as $parades)
                                                <tr>
                                                    <td class="hide-in-sm text-center"
                                                        style="display:table-cell; vertical-align:middle;"><span
                                                            class="span" style=" font-size: 14px !important;">
                                                            {{ $loop->iteration }}
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            <img
                                                                src="@if($parades->image) {{ asset($parades->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                                width="50px" height="50px"
                                                                style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                            <ul style="list-style: none; margin-top: 7px;">
                                                                <li style="font-weight: bold;">{{ $parades->name }}</li>
                                                                <li style="font-weight: bold;font-family:MareindaBold">{{ $parades->next_rank }}</li>
                                                            </ul>
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;  font-size: 14px !important;"><span
                                                            class="span">{{ $parades->join_date_present_unit }}</span>
                                                    </td>
                                                    <td style="display:table-cell; vertical-align:middle;  font-size: 14px !important;"><span
                                                            class="span">{{ $location->camp->name}}</span>
                                                    </td>
                                                    <td style="display:table-cell; vertical-align:middle;" id="{{ $parades->id }}">
                                                        <span data-id="{{ $parades->id }}" onclick="stateSelect(this)" class="label label-sm"
                                                            style="cursor: pointer !important; background-color: rgb(13, 138, 187) !important; color: #ffffff !important; font-weight: bold !important;  font-size: 14px !important;">
                                                            {{ $parades->state->name}}
                                                        </span>
                                                    </td>
                                                    <td class="text-center"
                                                        style="display:table-cell; vertical-align:middle;">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.paradeProfile', $parades->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: #00d8ff !important; border: 1px solid #00d8ff !important;"
                                                               title="Current Profile">
                                                                <i class="fa fa-user"></i>
                                                            </a>

                                                            <a href="{{ route('prm.parade_history', $parades->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: #ff6500 !important; border: 1px solid #ff6500 !important;"
                                                               title="Soilder History">
                                                                <i class="fa fa-history"></i>
                                                            </a>

                                                            <a href="{{ route('prm.parade.edit', $parades->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: limegreen !important; border: 1px solid limegreen !important;"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.parade.destroy', $parades->id) }}`)"
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
                                            <div align="center" style=" width: 150px; height: 40px; padding-top: 5px;">
                                Downloads:
                            <a href="{{ route('prm.export_parade_csv') }}" title="CSV file download"><i class="fa fa-file-excel-o" style="font-size: 28px; color: #005cff;"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('prm.export_parade_pdf') }}" title="PDF file download"><i class="fa fa-file-pdf-o" style="font-size: 28px; color: red;"></i></a>
                            </div> @include('partials._paginate',['data'=> $parade])
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
            let lastLeave = document.getElementById('lastLeave').value;

            let url = "/parade_search";
            let data = {
                CampName: campName,
                Rank: rank,
                LastLeave:lastLeave
            };
            axios.post(url, data).then(function(response) {
                var responseData = response.data;
                console.log(responseData);
                var serialNumber = 1;
                $('#parade').empty();
                for (let i = 0; i < responseData.length; i++) {
                    $('#parade').append('<option value="">' + responseData[i].name + '</option>');
                    serialNumber++;
                }
            }).catch(function (error) {

            })
        }

        function getSoldierLastLeave() {
            let campName = document.getElementById('paradeCamp').value;
            let lastLeave = document.getElementById('lastLeave').value;

            let url = "/parade_search";
            let data = {
                CampName: campName,
                LastLeave: lastLeave
            };
            axios.post(url, data).then(function(response) {
                var responseData = response.data;
                var serialNumber = 1;
                $('#parade').empty();
                for (let i = 0; i < responseData.length; i++) {
                    $('#parade').append('<option value="">' + responseData[i].parade.name + '</option>');
                    serialNumber++;
                }
            }).catch(function(error) {

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
            let lastLeave = document.getElementById('lastLeave').value;

            let url = "/parade_search";
            let data = {
                CampName: campName,
                Rank: rank,
                LastLeave: lastLeave
            };

            axios.post(url, data).then(function(response) {
                var responseData = response.data;
                var serialNumber = 1;
                $('#paradeTable').empty();
                $('#paginateID').empty();
                document.getElementById('searchResulInfo').innerHTML = responseData.length + " Soldier Found!";
                console.log(responseData);

                for (let i = 0; i < responseData.length; i++) {

                    $('#paradeTable').append('<tr>\n' +
                        '                                                    <td class="hide-in-sm text-center" style="display:table-cell; vertical-align:middle;"><span class="span">\n' +
                        '                                                            ' + serialNumber + '\n' +
                        '                                                        </span></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;"><span class="span">\n' +
                        '                                                            <img src="{{asset('')}}' + responseData[i].image + '" width="50px" height="50px"  style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">\n' +
                        '                                                            <ul style="list-style: none; margin-top: 7px;">\n' +
                        '                                                                <li style="font-weight: bold;">' + responseData[i].name + '</li>\n' +
                        '                                                                <li style="font-weight: bold;">' + responseData[i].next_rank + '</li>\n' +
                        '                                                            </ul>\n' +
                        '                                                        </span></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;"><span class="span">' + responseData[i].join_date_present_unit + '</span></td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;"><span\n' +
                        '                                                            class="span">' + responseData[i].camp.name + '</span>\n' +
                        '                                                    </td>\n' +
                        '                                                    <td style="display:table-cell; vertical-align:middle;" id="{{ $parades->id }}">\n' +
                        '                                                        <span data-id="{{ $parades->id }}" onclick="stateSelect(this)"\n' +
                        '                                                            class="label label-sm" style="cursor: pointer !important; background-color: rgb(0, 147, 252) !important; color: #ffffff !important; font-weight: bold !important;  font-size: 14px !important;">' + responseData[i].state.name + '</span>\n' +
                        '                                                    </td>\n' +
                        '                                                    <td class="text-center" style="display:table-cell; vertical-align:middle;">\n' +
                        '\n' +
                        '                                                        <!---------------  EDIT---------------->\n' +
                        '                                                        <div class="btn-group btn-corner  action-span ">\n' +
                        '\n' +
                        '                                                            <a href="{{ route('prm.paradeProfile', '') }}' + "/" + responseData[i].id + '"\n' +
                        '                                                               role="button" class="btn btn-xs bs-tooltip"\n' +
                        '                                                               style="background-color: #00d8ff !important; border: 1px solid #00d8ff !important;"\n' +
                        '                                                               title="Full Biodata">\n' +
                        '                                                                <i class="fa fa-user"></i>\n' +
                        '                                                            </a>\n' +
                        '\n' +
                        '                                                            <a href="parade/' + responseData[i].id + '/edit/"\n' +
                        '                                                               role="button" class="btn btn-xs bs-tooltip"\n' +
                        '                                                               style="background-color: limegreen !important; border: 1px solid limegreen !important;"\n' +
                        '                                                               title="Edit">\n' +
                        '                                                                <i class="fa fa-edit"></i>\n' +
                        '                                                            </a>\n' +
                        '\n' +
                        '\n' +
                        '                                                            <button type="button"\n' +
                        '                                                                    onclick="delete_item(`parade/' + responseData[i].id + '`)"\n' +
                        '                                                                    class="btn btn-xs bs-tooltip"\n' +
                        '                                                                    style="background-color: #ff0084 !important; border: 1px solid #ff0084 !important;"\n' +
                        '                                                                    title="Delete">\n' +
                        '                                                                <i class="fa fa-trash"></i>\n' +
                        '                                                            </button>\n' +
                        '                                                        </div>\n' +
                        '\n' +
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

    <script>
        function stateSelect(element) {
            let id = $(element).attr("data-id");
            let state = document.getElementById(id);
            state.innerHTML = "<select id='stateValue' style=''>" +
                "@foreach($all_states->take(3) as $all_state)" +
                "<option value='{{ $all_state->id}}'>{{ $all_state->name}}</option>" +
                "@endforeach" +
                "</select> &nbsp;&nbsp;&nbsp; <i class='fa fa-check-circle bigger-150' style='cursor: pointer !important; color: #18cb00 !important;' data-solder-id='"+id+"' onclick='changeState(this)'></i> ";
        }
        function changeState(element) {
            let paradeId = $(element).attr("data-solder-id");
            let newState = document.getElementById('stateValue').value;
            let url = '/change_state';
            let data = {Parade:paradeId, State:newState};
            axios.post(url, data).then(function (response) {
                location.reload();
            }).catch(function (error) {
                alert('Error Try again...');
            })

        }
    </script>
@endsection
