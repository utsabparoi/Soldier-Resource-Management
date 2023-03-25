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
                    <li class="active">Soldiers leave list of 3 months</li>
                </ul><!-- /.breadcrumb -->

                {{-- <div class="widget-toolbar" >
                    <a href="{{ route('prm.parade.create') }}" class="text-center"
                            style="width: 100px; background-color: #2595dc !important; color: #ffffff !important;border-radius:4px !important">
                            <i class="fa fa-plus"></i> Add <span class="hide-in-sm">Soldier</span>
                        </a>
                </div> --}}
            </div>
            {{-- main content start from here --}}
            <div class="page-content" style="position: relative">

                <div class="widget-box" style="border: none !important;">

                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="table-responsive" >
                                        <table id="dynamic-table"
                                               class="table table-bordered table-hover new-table">
                                            <thead style="font-family: Merienda">
                                                <tr class="thead-redesign">
                                                    <th width="5%" class="hide-in-sm text-center">Sl</th>
                                                    <th width="40%">Name</th>
                                                    <th width="20%">Camp</th>
                                                    <th width="15%" class="text-center" style="width: 120px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="paradeTable">

                                            @forelse($parades as $parade)
                                                <tr>
                                                    <td class="hide-in-sm text-center"
                                                        style="display:table-cell; vertical-align:middle;"><span
                                                            class="span" style=" font-size: 14px !important;">
                                                            {{ $loop->iteration }}
                                                        </span></td>
                                                    <td style="display:table-cell; vertical-align:middle;"><span
                                                            class="span">
                                                            <img
                                                                src="@if($parade->image) {{ asset($parade->image) }} @else {{ asset('backend/images/person.png') }} @endif"
                                                                width="50px" height="50px"
                                                                style="float: left; margin-right: 3px; border: 1px solid rgba(0,193,255,0.42); border-radius: 100%">
                                                            <ul style="list-style: none; margin-top: 7px;">
                                                                <li style="font-weight: bold;font-family:Marienda;font-size:14px">{{ $parade->name }}</li>
                                                                <li style="font-weight: bold;font-family:MareindaBold;font-style:italic">{{ $parade->next_rank }}</li>
                                                            </ul>
                                                        </span>
                                                    </td>

                                                    <td style="display:table-cell; vertical-align:middle;  font-size: 14px !important;font-family:Marienda">
                                                        <span class="span">{{ $parade->camp->name}}</span>
                                                    </td>

                                                    <td class="text-center"
                                                        style="display:table-cell; vertical-align:middle;">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.paradeProfile', $parade->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: gray !important; border: 1px solid gray !important;"
                                                               title="Current Profile">
                                                                <i class="fa fa-user"></i>
                                                            </a>

                                                            <a href="{{ route('prm.parade_history', $parade->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: #923c69 !important; border: 1px solid #923c69 !important;"
                                                               title="Soilder History">
                                                                <i class="fa fa-history"></i>
                                                            </a>

                                                            <a href="{{ route('prm.soldierCampAssign', $parade->id) }}"
                                                               role="button" class="btn btn-xs bs-tooltip"
                                                               style="background-color: rgb(75, 151, 228) !important; border: 1px solid rgb(75, 151, 228) !important;"
                                                               title="Assign Camp">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </a>


                                                            {{-- <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.parade.destroy', $parade->id) }}`)"
                                                                    class="btn btn-xs bs-tooltip"
                                                                    style="background-color: #e33838 !important; border: 1px solid #e33838 !important;"
                                                                    title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button> --}}
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
                                        @include('partials._paginate',['data'=> $parades])
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
