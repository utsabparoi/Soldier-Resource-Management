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
                            <a href="{{ route('prm.parade-migrate.index') }}" class="text-center">
                                <i class="fa fa-list"></i> <strong> Migration List</strong></span>
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
                                        <div class="widget-main" style="margin-bottom: -35px !important;">
                                            <div class="row">
                                                <!-- Company Name -->
                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <div>
                                                            <select class="col-xs-10 col-sm-10 multiselect"
                                                                    id="paradeCamp"
                                                                    onchange="getCampParadeInformation()">
                                                                <option value="">-Select Camp-</option>
                                                                @foreach($camps as $camp)
                                                                    <option
                                                                        value="{{ $camp->id }}">{{ $camp->name }}</option>
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
                                                <div class="col-sm-3" style="display: flex;justify-content:space-evenly">
                                                    <button class="btn btn-primary" type="button"
                                                            id="uploadPercent" onclick="paradeSearchResult()"
                                                            style="background-color: #431cff !important; border: none;border-color:#AAAAAA;height:28px !important;border-radius:4px !important;padding:2px 6px 2px 6px""
                                                            \>
                                                        <i class="ace-icon fa fa-search bigger-110"></i>
                                                        Search
                                                    </button>
                                                    <button class="btn btn-grey" type="button"
                                                            id="uploadPercent"
                                                            onclick="refreshPage()"
                                                            style="background-color: #828282 !important; border: none;border-color:#AAAAAA;height:28px !important;border-radius:4px !important;padding:2px 6px 2px 6px""
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

                                    <div class="table">
                                        <form action="{{ route('prm.bulk-import') }}" id="Form"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <table id="dynamic-table"
                                                class="table table-striped table-bordered table-hover new-table">
                                                <thead>
                                                <tr class="thead-redesign">
                                                    <th width="3%" class="text-center"><input onclick="selectAll(this)" type="checkbox"></th>
                                                    <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                    <th width="30%">Name</th>
                                                    <th width="30%">Present Camp(Location)</th>
                                                </tr>
                                                </thead>

                                                <tbody id="paradeTable">

                                                @forelse($parades as $parade)
                                                    <tr>
                                                        <td style="display:table-cell; vertical-align:middle;" class="text-center">
                                                            <input type="checkbox" class="bulk-ids" name="bulk_id[]" value="{{ $parade->id }}">
                                                        </td>
                                                        <td class="hide-in-sm text-center"
                                                            style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">
                                                                {{ $loop->iteration }}
                                                            </span></td>
                                                        <td style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">
                                                                <img
                                                                    src="@if($parade->image) {{ asset($parade->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                                    width="50px" height="50px"
                                                                    style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                                <ul style="list-style: none; margin-top: 7px;">
                                                                    <li style="font-weight: bold;">{{ $parade->name }}</li>
                                                                    <li style="font-weight: bold;">{{ $parade->next_rank }}</li>
                                                                </ul>
                                                            </span></td>
                                                        <td style="display:table-cell; vertical-align:middle;"><span
                                                                class="span">{{ $parade->camp->name}}</span>
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
                                            <span>
                                                @include('partials._paginate',['data'=> $parades])
                                            </span><br><br><br>

                                            <div class="row">
                                                <!-- Course -->
                                                <div class="col-sm-4">
                                                    <div align="left" class="form-group">
                                                        <label>
                                                            <h5><strong>Migrate to <sup
                                                                        class="text-danger">*</sup></strong>
                                                            </h5>
                                                        </label>
                                                        <div>
                                                            <select name="camp_id"
                                                                class="form-control multiselect">
                                                                <option value="">-Select a Camp(Location)-</option>
                                                                @foreach ($camps as $camp)
                                                                    <option value="{{ $camp->id }}">{{ $camp->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div align="left" class="form-group">
                                                        <label>
                                                            <h5>
                                                                <strong>Date of Migration</strong>
                                                            </h5>
                                                        </label>
                                                        <div>
                                                            <input class="form-control date-picker box-resize" type="text" name="migration_date" placeholder="Select date when want to migrate" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-5" style="display: flex;justify-content:end">
                                                    <!-- Add Page -->
                                                    <h5 class="widget-title">
                                                        <div class="form-group">
                                                            <div align="right" class="col-md-12 pr-2">
                                                                <button type="submit"
                                                                    class="button-submit"
                                                                    style="max-width: 150px;padding:8px 20px 8px 20px;font-size:18px">
                                                                    Migrate
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="space-10"></div>
                                                    </h5>
                                                </div>

                                            </div>
                                            <br>

                                        </form>

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

        function selectAll(obj)
        {
            $('.bulk-ids').prop('checked', $(obj).is(":checked"));
        }

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
                        '                                                    <td style="display:table-cell; vertical-align:middle;" class="text-center"><input type="checkbox" class="bulk-ids" name="bulk_id[]" value="' + responseData[i].id + '"></td>\n' +
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
