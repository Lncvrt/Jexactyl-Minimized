@extends('layouts.admin')
@include('partials/admin.jexactyl.nav', ['activeTab' => 'index'])

@section('title')
    Jexactyl Settings
@endsection

@section('content-header')
    <h1>Jexactyl Settings<small>Configure Jexactyl-specific settings for the Panel.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Jexactyl</li>
    </ol>
@endsection

@section('content')
    @yield('jexactyl::nav')
    <div class="row">
        <div class="col-xs-12">
            <div class="box
                @if($version->isLatestPanel())
                    box-success
                @else
                    box-danger
                @endif
            ">
                <div class="box-header with-border">
                    <i class="fa fa-code-fork"></i> <h3 class="box-title">Software Release <small>Verify Jexactyl is up-to-date.</small></h3>
                </div>
                <div class="box-body">
                    @if ($version->isLatestPanel())
                        You are running Jexactyl version <code>{{ config('app.version') }}</code>. Your panel is up-to-date!
                    @else
                        Your panel is <strong>not up-to-date!</strong> The latest version is <a href="https://github.com/Jexactyl/Jexactyl/releases/v{{ $version->getPanel() }}" target="_blank"><code>{{ $version->getPanel() }}</code></a> and you are currently running version <code>{{ config('app.version') }}</code> <b>Note: Please do not update to a version besides v3.7.3 as Jexactyl Minimized will break. It is recommended to reset the entire resources folder inside of Jexactyl before continuing with an update.</b>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-server"></i></span>
                    <div class="info-box-content" style="padding: 23px 10px 0;">
                        <span class="info-box-text">Total Servers</span>
                        <span class="info-box-number">{{ count($servers) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-wifi"></i></span>
                    <div class="info-box-content" style="padding: 23px 10px 0;">
                        <span class="info-box-text">Total Allocations</span>
                        <span class="info-box-number">{{ $allocations }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content" style="padding: 23px 10px 0;">
                        <span class="info-box-text">Total RAM use</span>
                        <span class="info-box-number">{{ $used['memory'] }} MB of {{ $available['memory'] }} MB</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-hdd-o"></i></span>
                    <div class="info-box-content" style="padding: 23px 10px 0;">
                        <span class="info-box-text">Total disk use</span>
                        <span class="info-box-number">{{ $used['disk'] }} MB of {{ $available['disk'] }} MB </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart"></i> <h3 class="box-title">Resource Utilization <small>A glance of the total amount of resources used.</small></h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 col-md-4">
                        <canvas id="servers_chart" width="100%" height="50">
                            <p class="text-muted">No data is available for this chart.</p>
                        </canvas>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <canvas id="ram_chart" width="100%" height="50">
                            <p class="text-muted">No data is available for this chart.</p>
                        </canvas>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <canvas id="disk_chart" width="100%" height="50">
                            <p class="text-muted">No data is available for this chart.</p>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('vendor/chartjs/chart.min.js') !!}
    {!! Theme::js('js/admin/statistics.js') !!}
@endsection
