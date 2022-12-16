
@extends('layouts.navigation')

@section('content')



     <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Family Members </div>
                        <div class="stat-digit"> <i class="fa fa-users"></i>{{$staff}}</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Savings</div>
                        <div class="stat-digit"> <i class="fa fa-money"></i>{{number_format ($savings)}}/=</div>
                        {{-- <h5 class="m-b-5">{{ number_format($saving->amount) }}</h5> --}}

                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Loans</div>
                        <div class="stat-digit"> <i class="fa fa-usd"></i> 887</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Account Number</div>
                        <div class="stat-digit"> <i class="fa fa-id-card"></i>3202034639</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <div class="row">


    </div>


    @endsection
