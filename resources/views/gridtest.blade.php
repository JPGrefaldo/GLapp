@extends('layouts.master')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')

<div class="row show-grid">
    <div class="col-md-8" style="height: 630px;">
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
                    <h5>C.E.'s</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><i class="fa fa-file-text"></i> 3,861</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-arrow-circle-o-up"></i></div>
                    <small>Total C.E's</small>
                </div>
            </div>
        </div>
        <div class="col-md-12" >

                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br>
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
                                    <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                        <canvas id="lineChart" height="266" style="display: block; width: 702px; height: 266px;" width="702"></canvas>
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
    </div>
    <div class="col-md-4">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>User Activity</h5>
                        </div>
                        <div class="ibox-content">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Jose</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Login</td>
                                </tr>
                                <tr>
                                    <td>Samantha</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Code Rebase</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>{{ Date('d/m/Y G:i:s') }}</td>
                                    <td>Add new client</td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

    </div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')

{!! Html::script('js/plugins/chartJs/Chart.min.js') !!}
// ChartJS line graph Data
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