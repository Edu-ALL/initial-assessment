@extends('layout.report-landscape')
@section('title', 'IA')

@section('body')


    <div class="content">
        <h2 class="text-center mb-4">
            PERSONALIZED ASSESSMENT REPORT
        </h2>
        <table class="table" border=0>
            <tr>
                <td width="50%" class="pe-5">
                    <table class="table">
                        <tr>
                            <td width="15%">Name</td>
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
                        <tr>
                            <td>Curriculum</td>
                            <td width="1%">:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Interest</td>
                            <td width="1%">:</td>
                            <td></td>
                        </tr>
                    </table>

                    <h6 class="my-3 mt-5">
                        Your University Admission Readiness Score is: 80%
                    </h6>

                    <p class="mb-4">
                        Your result: can Not be Assessed/ is Below Standard/ is Standard/ has Exceeded the Standard for the
                        university admission process. See the detailed graph below and suggestions on what to do next!
                    </p>

                    <table class="table">
                        <tr>
                            <td width="30%">Interest Exploration</td>
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
                            <td width="30%">Profile Building</td>
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
                            <td width="30%">Academic</td>
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
                            <td width="30%">Writing</td>
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
                </td>
                <td width="50%">
                    <table class="table" border=1>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Interest Exploration</th>
                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Profile Building</th>
                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Academic Improvement</th>
                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Essay Writing</th>
                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                    </table>

                    <div class="mt-3 p-2" style="border:1px solid #444">
                        <div class="card-body">
                            <p class="mb-0">
                                <strong> What's Next? </strong>
                                <br>
                                For further consultation contact our academic advisor: + (Amel)
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

@endsection
