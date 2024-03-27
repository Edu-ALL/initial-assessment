@extends('layout.report')
@section('title', 'IA')

@section('body')

    <div class="content">
        <p>
            Hi {{ $user->full_name }} Thank you for sharing your details with us.
        </p>
        <p>
            We have made a special & personalized report to help you know what to do for your future educational
            journey!
        </p>

        @include('report.IA.component.exploration')
        @include('report.IA.component.profile-building')
        @include('report.IA.component.academic')
        @include('report.IA.component.writing')

    </div>

@endsection
