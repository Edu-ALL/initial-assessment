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

        @if ($reports['checkListQuest']['Exploration'])
            @include('report.Quest.component.exploration')
        @endif
        @if ($reports['checkListQuest']['Profile Building'])
            @include('report.Quest.component.profile-building')
        @endif
        @if ($reports['checkListQuest']['Academic Profiling'])
            @include('report.Quest.component.academic-profiling')
        @endif
        @if ($reports['checkListQuest']['Writing'])
            @include('report.Quest.component.writing')
        @endif


    </div>

@endsection
