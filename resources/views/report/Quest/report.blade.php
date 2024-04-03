@extends('layout.report')
@section('title', 'Quest')

@section('body')

    <div class="content">
        <h1 class="text-center">
            <u>ACTIVITY REPORT</u>
        </h1>

        <p>
            <b>Let’s recap what you have learned today from the quest!
            </b>
        </p>

        <ol type="A" style="margin-left: -20px" class="quest-list">
            @if ($reports['checkListQuest']['Exploration'])
                <li class="mb-3">
                    <div class="quest-title">
                        Interest Exploration
                    </div>
                    @include('report.Quest.component.exploration')
                </li>
            @endif
            @if ($reports['checkListQuest']['Profile Building'])
                <li class="mb-3">
                    <div class="quest-title">
                        Profile-Building
                    </div>
                    @include('report.Quest.component.profile-building')
                </li>
            @endif
            @if ($reports['checkListQuest']['Academic Profiling'])
                <li class="mb-3">
                    <div class="quest-title">
                        Academic
                    </div>
                    @include('report.Quest.component.academic-profiling')
                </li>
            @endif
            @if ($reports['checkListQuest']['Writing'])
                <li class="mb-3">
                    <div class="quest-title">
                        Writing
                    </div>
                    @include('report.Quest.component.writing')
                </li>
            @endif
        </ol>


    </div>

@endsection
