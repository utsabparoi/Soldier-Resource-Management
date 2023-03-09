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
                                        <input type="text" placeholder="Search Parade ..." class="nav-search-input" id="searchParade" style="width: 200px !important;" autocomplete="off"/>
                                             <i class="ace-icon fa fa-search nav-search-icon"></i>
                                        </span>
                    </form>
                </div>
            </div>
            {{-- main content start from here --}}
            <div class="page-content">

                <!-- DYNAIC CONTENT FROM VIEWS -->


                <div class="widget-box">


                    <!-- header -->
                    <div class="widget-header">
                        <h4 class="widget-title"><i class="fa fa-users"></i> Parades
                        </h4>


                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.parade.create') }}" class="">
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
                                                <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                <th width="10%" class="text-center">Image</th>
                                                <th width="20%">Name</th>
                                                <th width="20%">Rank</th>
                                                <th width="20%">Location</th>
                                                <th width="10%">Status</th>
                                                <th width="15%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody id="paradeTable">

                                            @forelse($parade as $parades)
                                                <tr>
                                                    <td class="hide-in-sm text-center"><span
                                                            class="span">{{ $loop->iteration }}</span></td>
                                                    <td class="text-center">
                                                        <img
                                                            src="@if($parades->image) {{ asset($parades->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                            width="50px" height="50px">
                                                    </td>
                                                    <td><span class="span">{{ $parades->name }}</span></td>
                                                    <td><span class="span">{{ $parades->next_rank }}</span></td>
                                                    <td><span
                                                            class="span">{{ \Module\PRM\Models\Camp::where('id', $parades->present_location)->first()->name }}</span>
                                                    </td>
                                                    <td class="left">
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
                                                    <td class="text-center">

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
        $(document).ready(function(){
            $("#searchParade").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#paradeTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
