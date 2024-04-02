@extends('layout.report')
@section('title', 'IA')

@section('body')

    <div class="content">
        {{-- @php
            dd($userAnswers);
        @endphp --}}
        @foreach ($userAnswers as $key => $category)
            <p style="font-size: 1.2em !important; font-weight:bold">
                {{ $key }}
            </p>
            <ol>
                @foreach ($category as $question)
                    <li>
                        {{ $question['question']['title'] }}
                        @if (count($question['question']['sub_question']) > 0)
                            <ul>
                                @foreach ($question['question']['sub_question'] as $sub_question)
                                    <li>
                                        {{ $sub_question['title'] }}
                                        <ul class="list-lower-roman">
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
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul>
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
                                    @endif
                                @endfor
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ol>
        @endforeach

    </div>

@endsection
