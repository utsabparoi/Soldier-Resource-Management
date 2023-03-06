@extends('backend.layout.app')
@section('title', 'Course')
@section('css')

@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Assing Course</li>
                </ul><!-- /.breadcrumb -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content no-print">
                <div class="row">
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="page-content">
                                <div class="row p-20">
                                    <div class="col-12">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Assign Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.parade-courses.index') }}" class="">
                                                        <i class="fa fa-list"></i> Parade Course <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-courses.store') }}" id="Form"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">

                                                            <!-- Parade Name -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Parade<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="parade_id"
                                                                            class="form-control multiselect">
                                                                            <option value="">-Select Parade-</option>
                                                                            @foreach ($parades as $parade)
                                                                                <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Course -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Course<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="parade_id"
                                                                            class="form-control multiselect">
                                                                            <option value="">-Select Course-</option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br>

                                                        <div class="row">
                                                            {{-- Course SerialNo --}}
                                                            <div class="col-sm-3">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Serial No</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control" type="number" name="serial_no">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Duration <small class="red">(In month)</small></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control" type="text" name="duration">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Result</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control" type="text" name="result">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Remark</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control" type="text" name="remark">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br>

                                                        {{-- Status --}}
                                                        <div class="form-group">
                                                            <div class="input-group width-90">
                                                                <span class="input-group-addon width-20" style="text-align: left">
                                                                    Status
                                                                </span>
                                                                <label style="margin: 5px 0 0 8px">
                                                                    <input name="status" class="ace ace-switch ace-switch-6" type="checkbox">
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <!-- Add Page -->
                                                            <h5 class="widget-title">
                                                                <div class="row"
                                                                    style="margin-top: 10px;padding:5px">
                                                                    <div class="col-md-12 text-center pr-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm btn-block"
                                                                            style="max-width: 150px">
                                                                            <i class="fa fa-save"></i> Assign
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="space-10"></div>
                                                            </h5>
                                                        </div>

                                                    </form>
                                                </div>
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
        </div>
    </div>
    <script>
        function loadPositionSerialId(object) {

        let positionId = $(object).val();
        // console.log(positionId);

        let sl_name = $('.filter-serial');
        sl_name.empty();
        sl_name.append('<option value="">-Select a Serial-</option>');

        $.get("/get-existing-course", {position_id: positionId}, function (data, status) {
            // console.log(data);
            $(data).each(function (index, item) {
                sl_name.append('<option value="' + item.ads_serial.id + '">' + item.ads_serial.serial_name + '</option>')

            });
        });
        }
    </script>
@endsection

