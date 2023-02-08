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
                    <li class="active">All Person</li>
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
                        <h4 class="widget-title"> <i class="fa fa-info-circle"></i> Person
                        </h4>
                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('website.biodata.create') }}" class="">
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

                                    <div class="table-responsive">
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover new-table">
                                            <thead>
                                            <tr>
                                                <th width="5%" class="hide-in-sm">Sl</th>
                                                 <th width="15%">Image</th>
                                                <th width="25%">Name</th>
                                                <th width="30%">Location</th>
                                                <th width="10%">Status</th>
                                                <th width="15%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($employees as $employee)
                                                @if($employee)
                                                <tr>
                                                    <td class="hide-in-sm"><span class="span">{{ $employee->id }}</span></td>
                                                     <td>
                                                         <img src="{{ asset('backend/images/person.png') }}" width="50px" height="50px">
                                                    </td>
                                                    <td><span class="span">{{ $employee->name }}</span></td>
                                                    <td><span class="span">{{ $employee->present_location }}</span></td>
                                                    <td class="left">
                                                        <!--------------- STATUS EDIT---------------->
                                                        <div>
                                                            <label>
                                                                <input name="status" class="ace ace-switch" type="checkbox" id="status" checked>
                                                                <span class="lbl"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('singleBiodata', $employee->id) }}"
                                                               role="button" class="btn btn-xs btn-grey bs-tooltip"
                                                               title="Full Biodata">
                                                                <i class="fa fa-user"></i>
                                                            </a>

                                                            <a href=""
                                                               role="button" class="btn btn-xs btn-success bs-tooltip"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick=""
                                                                    class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>
                                                @else
                                                    <strong>No Records Found</strong>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
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
        function statusChange(element) {
            let department_id = $(element).attr("data-id");
            let post_url = "/departmentStatusChange";
            let allData = new FormData();
            allData.append("ID", department_id);
            let configuration = {headers:{"content-type" : "multipart/form-data"},
                onUploadProgress: function (progressEvent) {
                    let uploadProgressPercent = Math.round((progressEvent.loaded*100)/progressEvent.total)
                    document.getElementById("uploadPercent").innerHTML = uploadProgressPercent+'%';
                }
            };
            axios.post(post_url, allData, configuration).then(
                function (response) {
                }
            ).catch(
                function (error) {
                }
            )

        }
    </script>
@endsection
