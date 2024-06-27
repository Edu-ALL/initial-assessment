@extends('layout.report')
@section('title', 'IA')

@section('body')
    <style>
        .summary tr td {
            padding: 0 7px !important;
            border: 1px solid #dededd !important;
        }

        .sub-question tr td {
            padding: 0 7px !important;
            border: 0 !important;
        }

        th {
            padding: 2px !important;
        }
    </style>
    <div class="content">
        {{-- @php
            dd($userAnswers);
        @endphp --}}

        @foreach ($userAnswers as $key => $category)
            <table style="margin-bottom: 30px; width:100%;" class="summary">
                <thead>
                    <tr class="text-center">
                        <th colspan="3" style="text-transform: uppercase;">
                            {{ $key }}
                        </th>
                    </tr>
                    <tr class="text-center">
                        <th style="width: 5%">
                            No
                        </th>
                        <th style="width: 55%">
                            Question
                        </th>
                        <th style="width: 40%">
                            Answer
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $question)
                        <tr>
                            <td class="text-center">
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ $question['question']['title'] }}
                            </td>
                            <td>
                                @if (count($question['question']['sub_question']) > 0)
                                    <table class="sub-question">
                                        @foreach ($question['question']['sub_question'] as $sub_question)
                                            <tr>
                                                <td>
                                                    {{ $sub_question['title'] }} :<br>
                                                    <ul style="margin-left: -16px; margin-bottom:7px; color:#7272FF;">
                                                        @for ($i = 0; $i < count($sub_question['answer']['option']); $i++)
                                                            @if (
                                                                $sub_question['answer']['option'][$i] != null ||
                                                                    $sub_question['answer']['descriptive'][$i] != null ||
                                                                    $sub_question['answer']['score'][$i] != null)
                                                                <li>

                                                                    {{ $sub_question['answer']['option'][$i] != null ? $sub_question['answer']['option'][$i] : '' }}
                                                                    @if ($sub_question['answer']['descriptive'][$i] != null)
                                                                        @if ($sub_question['answer']['option'][$i] != null)
                                                                            |
                                                                        @endif
                                                                        {{ $sub_question['answer']['descriptive'][$i] }}
                                                                        @if ($sub_question['answer']['descriptive'][$i] != null && $sub_question['answer']['score'][$i] != null)
                                                                            |
                                                                        @endif
                                                                    @endif
                                                                    {{ $sub_question['answer']['score'][$i] != null ? $sub_question['answer']['score'][$i] : '' }}

                                                                </li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <ul style="margin-left: -16px; margin-bottom:7px; color:#7272FF;">
                                        @for ($i = 0; $i < count($question['question']['answer']['option']); $i++)
                                            @if (
                                                $question['question']['answer']['option'][$i] != null ||
                                                    $question['question']['answer']['descriptive'][$i] != null ||
                                                    $question['question']['answer']['score'][$i] != null)
                                                <li>

                                                    {{ $question['question']['answer']['option'][$i] != null ? $question['question']['answer']['option'][$i] : '' }}
                                                    @if ($question['question']['answer']['descriptive'][$i] != null)
                                                        @if ($question['question']['answer']['option'][$i] != null)
                                                            |
                                                        @endif
                                                        {{ $question['question']['answer']['descriptive'][$i] }}
                                                        @if ($question['question']['answer']['descriptive'][$i] != null && $question['question']['answer']['score'][$i] != null)
                                                            |
                                                        @endif
                                                    @endif

                                                    {{ $question['question']['answer']['score'][$i] != null ? $question['question']['answer']['score'][$i] : '' }}
                                                </li>
                                            @else
                                                -
                                            @endif
                                        @endfor
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>

@endsection
