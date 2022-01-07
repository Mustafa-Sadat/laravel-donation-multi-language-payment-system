

@extends('dash.layout')

@section('title')
    Dashboard-donation
@endsection


@section('dash-body')


<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Overview</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix  text-center" style="min-height:150px">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$total_user}}</h2>
                        <span>Donors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix" style="min-height:150px">
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div class="text">
                        <h2>
                                @if ($last_month[0]->totaldonate==0)
                                    0  £
                                @else
                                    {{$last_month[0]->totaldonate}} £
                                @endif
                        </h2>
                        <span>Last Month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center" style="min-height:150px">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>{{$total_history}}</h2>
                        <span>Family List</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix" style="min-height:150px">
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                    <div class="text">
                        <h2>{{$total_price}} £</h2>
                        <span>Total Earning</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row pb-5">
    
    <div class="col-lg-12">
        <div class="au-card m-b-30 mb-b">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">Register User</h3>
                <canvas id="singelBarChart" style="height:180px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="au-card m-b-30 mb-5 pb-3">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">Donate</h3>
                <canvas id="donaterChart" style="height:200px !important"></canvas>
            </div>
        </div>
    </div>
    
</div>



@endsection


@section('dash-jquery')


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    
    var ctx = document.getElementById('singelBarChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach($data as $key){ echo '"'.$key->month." ".$key->year." ".'" ,';}?>],
            datasets: [{
                label: 'Donors',
                data: [<?php foreach($data as $key){ echo '"'.$key->total.'" ,';}?>],
                
                backgroundColor: [<?php foreach($color as $key){ echo '"'.$key.'" ,';}?>],
                borderColor:  [<?php foreach($color as $key){ echo '"'.$key.'" ,';}?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
    
    var ctx = document.getElementById('donaterChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach($donateChart as $key){ echo '"'.$key->month." ".$key->year." ".'" ,';}?>],
            datasets: [{
                label: 'Donate Amount',
                data: [<?php foreach($donateChart as $key){ echo '"'.$key->total.'" ,';}?>],
                
                backgroundColor: [<?php foreach($colorChart as $key){ echo '"'.$key.'" ,';}?>],
                borderColor:  [<?php foreach($colorChart as $key){ echo '"'.$key.'" ,';}?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
    
    
</script>


@endsection