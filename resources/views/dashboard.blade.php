@extends('layouts.master')

@section('title', 'Dashboard')

@section('styles')
<style>
    .nopads{
        padding:0;
    }
    .rmlt{
        padding-left:0;
    }
    .rmrt{
        padding-right:0;
    }
    .rmgin{
        margin:0;
    }
</style>
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/"><strong>Dashboard</strong></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <!-- Left -->
        <div class="nopads col-lg-8">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Client's</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><i class="fa fa-group"></i> 3,861</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-arrow-circle-o-up"></i></div>
                        <small>Total Client's</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>User's</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><i class="fa fa-user"></i> 3,861</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-arrow-circle-o-up"></i></div>
                        <small>Total User's</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Case's</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><i class="fa fa-briefcase"></i> 3,861</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-arrow-circle-o-up"></i></div>
                        <small>Total Case's</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>C.E.</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><i class="fa fa-file-text"></i> 3,861</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-arrow-circle-o-up"></i></div>
                        <small>Total C.E.</small>
                    </div>
                </div>
            </div>
                    <!-- Chart Start -->

        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br/>
                                            All sales: 162,862
                                        </span>
                            <h3 class="font-bold no-margins">
                                Half-year revenue margin
                            </h3>
                            <small>Sales marketing.</small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="stat-list m-t-lg">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total orders in period</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 48%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Orders in last month</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 60%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="m-t-md">
                            <small class="pull-right">
                                <i class="fa fa-clock-o"> </i>
                                Update on 16.07.2015
                            </small>
                            <small>
                                <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                            </small>
                        </div>

                    </div>
                </div>
            </div>

        <!-- Chart End -->
        </div>
    <!-- Left Eng -->
 <!-- Activity -->
 <div class="col-sm-4">
                    <div class="rmgin ibox">
                        <div class="ibox-content" style="padding: 5px 20px 10px 20px;">
                        <h4>User Activity</h4>

                            <table class="rmgin table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>
                                    <td><a data-toggle="tab" href="#contact-1" class="client-link" aria-expanded="true">Anthony Jackson</a></td>
                                    <td class="client-status"><span class="label label-info">Login</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>

                                </tr>
                                <tr>
                                    <td class="client-avatar"><img alt="image" src="img/a3.jpg"> </td>
                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Rooney Lindsay</a></td>
                                    <td class="client-status"><span class="label label-info">Login</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><img alt="image" src="img/a4.jpg"> </td>
                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Lionel Mcmillan</a></td>
                                    <td class="client-status"><span class="label label-info">Logout</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-4" class="client-link" aria-expanded="true">Edan Randall</a></td>
                                    <td class="client-status"><span class="label label-warning">Add Client</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a6.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Jasper Carson</a></td>
                                    <td class="client-status"><span class="label label-warning">Modify Client</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a7.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Reuben Pacheco</a></td>
                                    <td class="client-status"><span class="label label-info">Phoned</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a1.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-1" class="client-link" aria-expanded="true">Simon Carson</a></td>
                                    <td class="client-status"><span class="label label-primary">Active</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a3.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Rooney Lindsay</a></td>
                                    <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a4.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Lionel Mcmillan</a></td>
                                    <td class="client-status"></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-4" class="client-link" aria-expanded="true">Edan Randall</a></td>
                                    <td class="client-status"></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                    <td><a data-toggle="tab" href="#contact-1" class="client-link" aria-expanded="true">Anthony Jackson</a></td>
                                    <td class="client-status"><span class="label label-danger">Deleted</span></td>
                                    <td>{{ Date('m/d/Y H:m:s') }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <!-- Activity End -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
    <div class="col-lg-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="img/a2.jpg">


                        <h3 class="m-b-xs"><strong>Atty. John Smith</strong></h3>

                        <div class="font-bold">Graphics designer</div>


                    </a>
                </div>
            </div>
    </div>
</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')

{!! Html::script('js/plugins/chartJs/Chart.min.js') !!}

<script>
        $(document).ready(function() {

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});


        });
    </script>

@endsection