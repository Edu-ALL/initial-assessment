@extends('layout.report')
@section('title', 'IA')

@section('body')

    <div class="content">
        <h1 class="text-center">
            <u>PERSONALIZED ASSESSMENT REPORT</u>
        </h1>
        <p>
            Hi {{ $user->full_name }}!
        </p>
        <p>
            Here is your personalized report to help you know what you can do next in your educational journey!
        </p>

        @include('report.IA.component.exploration')
        @include('report.IA.component.profile-building')
        @include('report.IA.component.academic')
        @include('report.IA.component.writing')

    </div>

@endsection
