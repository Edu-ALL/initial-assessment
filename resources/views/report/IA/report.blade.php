@extends('layout.report-landscape')
@section('title', 'IA')

@section('body')


    <div class="content">
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
                            <td>{{ $reports['client']['curriculum'] }}</td>
                        </tr>
                        <tr>
                            <td>Interest</td>
                            <td width="1%">:</td>
                            <td>{{ $reports['client']['academic_interests'] }}</td>
                        </tr>
                    </table>

                    @php
                        $total = array_sum($reports['score']);
                        $score = $total / 4;
                    @endphp
                    <h6 class="my-2 mt-4">
                        Your University Admission Readiness Score is: {{ $reports['score']['total'] }}%
                    </h6>

                    <p class="mb-3">
                        Your result:
                        @switch($reports['result'])
                            @case(0)
                                can <b>Not be Assessed</b>
                            @break

                            @case(1)
                                is <b>Below Standard</b>
                            @break

                            @case(2)
                                is <b>Standard</b>
                            @break

                            @case(3)
                                has <b>Exceeded Standard</b>
                            @break
                        @endswitch
                        for the
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

                    <table class="table-detail" border=1>
                        <tr>
                            <td width="15%">Not Assessed</td>
                            <td width="8%">&lt;30%</td>
                            <td>The student's quality can not be observed in any pillars, as it has not yet been implemented
                                into practice.</td>
                        </tr>
                        <tr>
                            <td width="15%">Below Standard</td>
                            <td width="8%">&lt;65%</td>
                            <td>The student's quality is observed across all 4 pillars, but not consistently. More
                                improvement is needed to reach the desired level.</td>
                        </tr>
                        <tr>
                            <td width="15%">Standard</td>
                            <td width="8%">65-84%</td>
                            <td>The student's quality is consistently in practice across all 4 pillars. Continous training
                                to achieve the desired level is evident.</td>
                        </tr>
                        <tr>
                            <td width="15%">Exceed Standard</td>
                            <td width="8%">85-100%</td>
                            <td>The student's quality is consistent across all 4 pillars, goes above, and beyond
                                requirements.</td>
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
                                You have taken some time to build up your profile but there is so much more that you can and
                                should do to maximize your exploration journey! Start by researching different majors,
                                upgrading your daily schedule, identifying your academic and non-academic goals.
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Profile Building</th>
                        </tr>
                        <tr>
                            <td>
                                You have taken some time to build up your profile but there is so much more that you can and
                                should do to maximize your exploration journey! Start by researching different majors,
                                upgrading your daily schedule, identifying your academic and non-academic goals.
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Academic Improvement</th>
                        </tr>
                        <tr>
                            <td>
                                You have taken some time to build up your profile but there is so much more that you can and
                                should do to maximize your exploration journey! Start by researching different majors,
                                upgrading your daily schedule, identifying your academic and non-academic goals.
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Essay Writing</th>
                        </tr>
                        <tr>
                            <td>
                                You have taken some time to build up your profile but there is so much more that you can and
                                should do to maximize your exploration journey! Start by researching different majors,
                                upgrading your daily schedule, identifying your academic and non-academic goals.
                            </td>
                        </tr>
                    </table>

                    <div class="mt-3 p-2" style="border:1px solid #444">
                        <div class="card-body">
                            <p class="mb-0">
                                <strong> What's Next? </strong>
                                <br>
                                For further consultation contact our academic advisor: +62 877-9838-5403 (Amel)
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

@endsection
