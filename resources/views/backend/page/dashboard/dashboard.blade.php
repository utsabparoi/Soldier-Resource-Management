@extends('backend.layout.app')
@section('title', 'Biodata')
@section('content')
    <style>
        .small-box .inner > h3,
        .main-content-inner > a .custom-color {
            font-family: MariendaBold;
            color: rgb(139, 10, 10) !important;
        }

        .main-content .main-content-inner .custom-alignment {
            margin-left: 14%;
            margin-right: auto;
            display: flex;
            justify-content: space-between;
        }

        .square {
            background-image: url("logo.png");
            background-repeat: no-repeat;
            opacity: 0.1;
            margin-top: 2%;
            margin-left: 38%;
            width: 500px;
            height: 500px;
        }

        .lotti-icon-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: -35px;
            margin-bottom: -20px;
            width: 50%;
        }
    </style>

    <?php
    $total_soldiers = DB::table('parades')->count('id');
    $total_camps = DB::table('camps')->count('id');
    $AuthorizedStates = DB::table('parades')
        ->where('state_id', 1)
        ->count('id');
    $heldStates = DB::table('parades')
        ->where('state_id', 2)
        ->count('id');

    $offRation = DB::table('leave_applications')
        ->whereDate('start_date', date("Y-m-d"))
        ->count('id');
    $onRation = DB::table('parades')
        ->where('state_id', 4)
        ->count('id');

    ?>

    <div class="main-content">
        <div class="main-content-inner"
            style="margin-top:-485px;text-align:center;font-family:MariendaBold;font-size:16px;color:#130059">
            <div class="row custom-alignment">

                <div class="col-sm-3 col-mb-3">
                    <!-- small box -->
                    <div class="small-box bg-info custom-color"
                        style="border: 1px #a29999 solid; box-shadow: 2px 4px 8px rgb(52, 72, 200);">
                        <div class="inner">
                            <h3>{!! $total_soldiers !!}</h3>

                            <h4>Total Soldiers</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-sm-3">
                    <!-- small box -->
                    <div class="small-box bg-success" style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px purple;">
                        <div class="inner">
                            <h3>{!! $total_camps !!}</h3>

                            <h4>Total Camps</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-campground"></i>
                            {{-- <lottie-player
                            src="{{ asset('/frontend/lord-icon/121268-tent.json') }}"
                            background="transparent" speed="1" class="lotti-icon-center"
                            style="width: 60px; height: 100%;" loop autoplay>
                        </lottie-player> --}}
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row custom-alignment">
                <h1 class="text-center" style="color: #130059;margin-right:20px !;font-family:Marienda;font-size:36px;text-shadow: 2px 2px 2px rgb(205, 143, 205);">
                    Today's Soldier States Information</h1>
            </div>

            <div class="row custom-alignment">
                <div class="col-sm-3">
                    <div class="small-box bg-danger"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(52, 72, 200);">
                        <div class="inner">
                            <h3>{!! $AuthorizedStates !!} Soldiers</h3>

                            <h4>In Authorized State</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shield-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-info" style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px purple;">
                        <div class="inner">
                            <h3>112 Soldiers</h3>

                            <h4>In Held State</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-certificate"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-success"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(52, 72, 200);">
                        <div class="inner">
                            <h3>{!! $offRation !!} Soldiers</h3>

                            <h4>In Off Ration</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-warrning" style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px purple;">
                        <div class="inner">
                            <h3>335 Soldiers</h3>

                            <h4>In On Ration</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-certificate"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="square">

        </div>
    </div>

@endsection
