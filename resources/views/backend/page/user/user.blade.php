@extends('backend.layout.app')
@section('title', 'Perfect Ten')
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
                    <li class="active">Users</li>
                </ul><!-- /.breadcrumb -->

            </div>
            {{-- main content start from here --}}
            <div class="page-content">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="widget-box" style="border: none">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <i class="fa fa-list"></i> Admin Users
                                </h4>
                                <span class="widget-toolbar">
                                    <a href="{{ route('createUserForm') }}" class="float-right">
                                        <i class="fa fa-pencil-square-o"></i>Create User
                                    </a>
                                </span>
                            </div>

                            <div class=" mt-2">
                                <div class="">
                                    <table class="table table-striped table-bordered table-hover new-table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                {{--                                        <th>Status</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $serialNo = 1; @endphp
                                            @foreach ($allUser as $allUsers)
                                                <tr>
                                                    <td>@php echo $serialNo; @endphp</td>
                                                    <td>{{ $allUsers->name }} <br> </td>
                                                    <td>{{ $allUsers->email }}</td>

                                                    <td class="text-center">

                                                        @if ($allUsers->id != Auth::id())
                                                            <!---------------  EDIT---------------->
                                                            <a href="/editUserForm/{{ $allUsers->id }}" role="button"
                                                                class="btn btn-xs btn-success bs-tooltip padding-icon"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            <a href="/userDelete/{{ $allUsers->id }}" role="button"
                                                                class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        @else
                                                            <!---------------  EDIT---------------->
                                                            <a href="/editUserForm/{{ $allUsers->id }}" role="button"
                                                                class="btn btn-xs btn-success bs-tooltip" title="Edit"
                                                                style="margin-left:-28px;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        @endif


                                                    </td>
                                                </tr>
                                                @php $serialNo++; @endphp
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div align="center">
                                        {{ $allUser->links() }}
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
