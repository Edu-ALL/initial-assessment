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
        <p class="mb-3">
            Here is your personalized report to help you know what you can do next in your educational journey!
        </p>

        <ol type="A" style="margin-left: -20px" class="quest-list">
            <li class="mb-3">
                <div class="quest-title fw-bold">
                    Interest Exploration
                </div>
                @include('report.IA.component.exploration')
            </li>
            <li class="mb-3">
                <div class="quest-title fw-bold">
                    Profile-Building
                </div>
                @include('report.IA.component.profile-building')
            </li>
            <li class="mb-3">
                <div class="quest-title fw-bold">
                    Academic
                </div>
                @include('report.IA.component.academic')
            </li>
            <li class="mb-3">
                <div class="quest-title fw-bold">
                    Writing
                </div>
                @include('report.IA.component.writing')
            </li>
        </ol>

    </div>

@endsection
