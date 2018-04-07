<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="_token" value="{!! csrf_token() !!}">

    <title>@yield('title')</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/plugins/iCheck/custom.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/elegal-style.css') !!}
    @yield('styles')

</head>

<body>

<div id="wrapper">
    @php

    @endphp
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{!! Auth::user()->name !!}</strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    @foreach(\Spatie\Permission\Models\Role::get() as $role)
                                        @role($role->name)
                                            {!! ucfirst($role->name) !!}
                                        @endrole
                                    @endforeach
                                    <b class="caret"></b></span>
                            </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="/profile">Profile</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        EL
                    </div>
                </li>

                {{--side menus start--}}
                <li class="{!! if_uri_pattern(array('/')) == 1 ? 'active' : '' !!}">
                    <a href="/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href="/client"><i class="fa fa-user"></i> <span class="nav-label">Clients</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Contracts</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}"><a href="{!! route('contract.create') !!}">Create</a></li>
                        <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}"><a href="{!! route('contract.index') !!}">List</a></li>
                    </ul>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href=""><i class="fa fa-users"></i> <span class="nav-label">Council</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href=""><i class="fa fa-file-text"></i> <span class="nav-label">Chargeable Expenses</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href=""><i class="fa fa-bar-chart"></i> <span class="nav-label">Service Report</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('')) == 1 ? 'active' : '' !!}">
                    <a href=""><i class="fa fa-file-o"></i> <span class="nav-label">Billing</span></a>
                </li>

                <li class="{!! if_uri_pattern(array('user*','profile*','role*')) == 1 ? 'active' : '' !!}">
                    <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Others</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{!! if_uri_pattern(array('user*','profile*')) == 1 ? 'active' : '' !!}"><a href="{!! route('user.index') !!}">Users</a></li>
                        <li class="{!! if_uri_pattern(array('role*')) == 1 ? 'active' : '' !!}"><a href="{!! route('role') !!}">Roles</a></li>
                    </ul>
                </li>
                {{--side menus end--}}

            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        @yield('content')

        <div class="footer">
            <div>
                <strong>Copyright</strong> <a href="https://www.pacificblueit.com" target="_blank" >Pacific Blue I.T. &copy; {{ Date('Y') }}</a>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<!-- Mainly scripts -->
{!! Html::script('js/jquery-3.3.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}

<!-- Custom and plugin javascript -->
{!! Html::script('js/inspinia.js') !!}
{!! Html::script('js/plugins/pace/pace.min.js') !!}
@yield('scripts')

</body>

</html>
