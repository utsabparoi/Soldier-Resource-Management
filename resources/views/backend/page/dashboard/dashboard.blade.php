@extends('backend.layout.app')
@section('title', 'Biodata')
@section('css')
<style>
    .small-box .inner>h3,
    .main-content-inner>a .custom-color {
        font-family: MariendaBold;
        color: rgb(139, 10, 10) !important;
    }

    .small-box .inner>h4{
        font-family: MariendaBold;
        color: rgb(9, 9, 116);
    }

    .main-content .main-content-inner .custom-alignment {
        margin-left: 0.5px;
        margin-right: auto;
        display: flex;
        justify-content: space-between;
    }

    .square {
        background-image: url("logo.png");
        background-repeat: no-repeat;
        opacity: 0.1;
        margin: 0 auto;
        /* margin-left: 38%; */
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
@stop
@section('page-header')
    <i class="fa fa-tachometer"></i> Dashboard
@stop

@section('content')
    <?php
        use Carbon\Carbon;
        use Carbon\CarbonPeriod;

        $total_soldiers = DB::table('parades')->count('id');
        $total_camps = DB::table('camps')->count('id');
        //Total number of soldiers in authorized state
        $AuthorizedStates = DB::table('parades')
            ->where('state_id', 1)
            ->count('id');
        //Total number of soldiers in held state
        $heldStates = DB::table('parades')
            ->where('state_id', 2)
            ->count('id');
        //This section is for how many soldiers are in leave ration state
        $start_dates = DB::table('leave_applications')->pluck('start_date');
        $end_dates = DB::table('leave_applications')->pluck('end_date');
        $leave_count = 0;

        for ($i = 0; $i < count($start_dates); $i++) {
            $startDate = Carbon::createFromFormat('Y-m-d', $start_dates[$i]);
            $endDate = Carbon::createFromFormat('Y-m-d', $end_dates[$i]);

            $dateRange = CarbonPeriod::create($startDate, $endDate);
            $dates = array_map(fn($date) => $date->format('Y-m-d'), iterator_to_array($dateRange));
            for ($j = 0; $j < count($dates); $j++) {
                if ($dates[$j] == date('Y-m-d')) {
                    $leave_count = $leave_count + 1;
                }
            }
        }
        //Soldiers on ration state calculation
        $onRation = DB::table('parades')
            ->where('state_id', 3)
            ->count('id');
        //Soldiers off ration state calculation
        // $offRation = DB::table('leave_applications')
        //     ->whereDate('start_date', date('Y-m-d'))
        //     ->count('id');

    ?>

    <div class="main-content">
        <div class="main-content-inner"
            style="margin-top:-485px;text-align:center;font-family:MariendaBold;font-size:16px;color:#130059">
            <div style="text-align:center;position:relative;margin-top:43% !important" class="square">

            </div>

            {{-- <div style="position:absolute;color: rgb(0, 0, 0);top:-5%;left:57%;transform:translate(-50%, 50%);">

            </div> --}}
            <div class="row custom-alignment" style="margin-top:-35%">

                    <div class="col-sm-3">
                        <div class="small-box bg-info"
                            style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(175, 183, 231);">
                            <div class="inner">
                                <h3>Total Soldiers</h3>
                                <h4>{!! $total_soldiers !!}</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <a href="{{ route('prm.parade.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-sm-3">
                        <!-- small box -->
                        <div class="small-box bg-success"
                            style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(233, 191, 233);">
                            <div class="inner">
                                <h3>Total Camps</h3>
                                <h4>{!! $total_camps !!}</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-campground"></i>
                            </div>
                            <a href="{{ route('prm.camp.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            <div class="row custom-alignment">
                <h1 class="text-center"
                    style="color: #130059;margin-right:20px !;font-family:Marienda;font-size:36px;text-shadow: 2px 2px 2px rgb(233, 191, 233);">
                    Today's Soldier States Information</h1>
            </div>

            <div class="row custom-alignment">
                <div class="col-sm-3">
                    <div class="small-box bg-danger"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(175, 183, 231);">
                        <div class="inner">
                            <h3>{!! $AuthorizedStates !!} Soldiers</h3>

                            <h4>Authorized State</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shield-check"></i>
                        </div>
                        <a href="{{ route('state-information', 1) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-info"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(233, 191, 233);">
                        <div class="inner">
                            <h3>{!! $heldStates !!} Soldiers</h3>

                            <h4>In Held State</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-certificate"></i>
                        </div>
                        <a href="{{ route('state-information', 2) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-success"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(175, 183, 231);">
                        <div class="inner">
                            <h3>{!! $leave_count !!} Soldiers</h3>

                            <h4>In Off Ration</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <a href="{{ route('state-information', 4) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="small-box bg-warrning"
                        style="border: 1px #a29999 solid;box-shadow: 2px 4px 8px rgb(233, 191, 233);">
                        <div class="inner">
                            <h3>{!! $onRation !!} Soldiers</h3>

                            <h4>In On Ration</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-certificate"></i>
                        </div>
                        <a href="{{ route('state-information', 3) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
