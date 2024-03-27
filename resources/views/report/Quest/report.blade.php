@extends('layout.report')
@section('title', 'Quest')

@section('body')

    <div class="content">

        @include('report.Quest.component.exploration')
        @if ($reports['checkListQuest']['Exploration'])
        @endif
        @include('report.Quest.component.profile-building')
        @if ($reports['checkListQuest']['Profile Building'])
        @endif
        @include('report.Quest.component.academic-profiling')
        @if ($reports['checkListQuest']['Academic Profiling'])
        @endif
        @if ($reports['checkListQuest']['Writing'])
            @include('report.Quest.component.writing')
        @endif


    </div>

@endsection
