@extends('layout.report-landscape')
@section('title', 'IA')

@section('body')


    <div class="content">
        <table class="table">
            <tr>
                <td>Name</td>
                <td width="1%">:</td>
                <td>{{ $reports['client']['name'] }}</td>
            </tr>
            <tr>
                <td>Grade</td>
                <td width="1%">:</td>
                <td>{{ $reports['client']['grade'] }}</td>
            </tr>
            <tr>
                <td>School</td>
                <td width="1%">:</td>
                <td>{{ $reports['client']['school'] }}</td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <td width="20%">Interest Exploration</td>
                <td>
                    <div class="progress-chart">
                        <div class="progress-chart-bar text-white text-center"
                            style="width: {{ $reports['score']['Exploration'] }}% !important">
                            {{ $reports['score']['Exploration'] }}%
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%">Profile Building</td>
                <td>
                    <div class="progress-chart">
                        <div class="progress-chart-bar text-white text-center"
                            style="width: {{ $reports['score']['Profile Building'] }}% !important">
                            {{ $reports['score']['Profile Building'] }}%
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%">Academic</td>
                <td>
                    <div class="progress-chart">
                        <div class="progress-chart-bar text-white text-center"
                            style="width: {{ $reports['score']['Academic'] }}% !important">
                            {{ $reports['score']['Academic'] }}%
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%">Writing</td>
                <td>
                    <div class="progress-chart">
                        <div class="progress-chart-bar text-white text-center"
                            style="width: {{ $reports['score']['Writing'] }}% !important">
                            {{ $reports['score']['Writing'] }}%
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

@endsection
