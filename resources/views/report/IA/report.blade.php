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
                        Your result
                        @switch($reports['result'])
                            @case(0)
                                can <b>Not be Assessed</b>
                            @break

                            @case(1)
                                is <b>Approaching the Standards</b>
                            @break

                            @case(2)
                                <b>Meets the Standards</b>
                            @break

                            @case(3)
                                is <b>Exceeding the Standards</b>
                            @break
                        @endswitch
                        for the
                        university admission process. See the detailed graph below and suggestions on what to do next!
                    </p>

                    <table class="table">
                        <tr>
                            <td width="30%"><b>Interest Exploration</b></td>
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
                            <td width="30%"><b>Profile Building</b></td>
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
                            <td width="30%"><b>Academic</b></td>
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
                            <td width="30%"><b>Writing</b></td>
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

                    <table class="table table-detail" border=1>
                        <tr>
                            <th colspan="3" class="text-center">University Admission Readiness Rubric</th>
                        </tr>
                        <tr>
                            <td class="text-center">Exceeding Standards</td>
                            <td class="text-center">85-100%</td>
                            <td>The student's quality is consistent across all 4 pillars, goes above, and beyond
                                requirements.</td>
                        </tr>
                        <tr>
                            <td class="text-center">Meet Standards</td>
                            <td class="text-center">65-84%</td>
                            <td>The student's quality is consistently in practice across all 4 pillars. Continous training
                                to achieve the desired level is evident.</td>
                        </tr>
                        <tr>
                            <td class="text-center">Approaching Standards</td>
                            <td class="text-center">&lt;65%</td>
                            <td>The student's quality is observed across all 4 pillars, but not consistently. More
                                improvement is needed to reach the desired level.</td>
                        </tr>
                        <tr>
                            <td class="text-center" width="15%">Not Assessed</td>
                            <td class="text-center">&lt;30%</td>
                            <td width="70%">
                                The student's quality can not be observed in any pillars, as it has not yet been implemented
                                into practice.
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="50%">
                    <table class="table" border=1>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Interest Exploration</th>
                        </tr>
                        <tr style="border: 1px solid #7272ff;">
                            <td class="p-2">
                                @if ($reports['score']['Exploration'] < 30 || $reports['score']['Exploration'] < 65)
                                    {{-- Not Assessed / Approaching Standards --}}
                                    Hey there! If you're feeling behind in exploring your interests for university, don't
                                    worry—you still have time to start discovering what you love. Try out different subjects
                                    and activities, like joining clubs or volunteering, to see what clicks. Keep an open
                                    mind and enjoy the journey.
                                @elseif($reports['score']['Exploration'] >= 65 && $reports['score']['Exploration'] < 85)
                                    {{-- Meet Standards --}}
                                    Great start on building your profile! There’s still plenty to explore to really make the
                                    most of your journey. Also, consider researching different majors you might be
                                    interested in and explore them!
                                @elseif($reports['score']['Exploration'] >= 85 && $reports['score']['Exploration'] <= 100)
                                    {{-- Exceeding Standards --}}
                                    You have done well to explore your interests! Knowing your study interests and aligning
                                    them with your goals, plus a well-planned daily schedule, will enhance your chances in
                                    the university admissions process. Your next step is to dive deeper into what you love,
                                    and research universities with strong programs in your areas of interest!
                                @endif
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Profile Building</th>
                        </tr>
                        <tr style="border: 1px solid #7272ff;">
                            <td class="p-2">
                                @if ($reports['score']['Profile Building'] < 30 || $reports['score']['Profile Building'] < 65)
                                    {{-- Not Assessed / Approaching Standards --}}
                                    Don't worry if you're a bit behind in building your profile for university admissions!
                                    Start by engaging in activities that truly interest you as authenticity really stands
                                    out in applications. Consider volunteering, joining clubs, or attending workshops to
                                    diversify your experiences. Focus on quality, not quantity, and showcase what makes you
                                    unique.
                                @elseif($reports['score']['Profile Building'] >= 65 && $reports['score']['Profile Building'] < 85)
                                    {{-- Meet Standards --}}
                                    You’re off to a great start! Why not jump into some fun competitions, internships, or
                                    volunteer projects? Also, getting involved in school clubs or checking out some cool
                                    summer or winter programs can boost your teamwork and leadership skills—things
                                    universities really love to see in students.
                                @elseif($reports['score']['Profile Building'] >= 85 && $reports['score']['Profile Building'] <= 100)
                                    {{-- Exceeding Standards --}}
                                    That's awesome that you're so active! To make your profile stand out further, focus on
                                    activities that tie into the major you want to pursue. How about starting a project that
                                    helps others? You could set up an organization, lead a campaign on social issues, or
                                    even create tools that make life easier for people.
                                @endif
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Academic Improvement</th>
                        </tr>
                        <tr style="border: 1px solid #7272ff;">
                            <td class="p-2">
                                @if ($reports['score']['Academic'] < 30 || $reports['score']['Academic'] < 65)
                                    {{-- Not Assessed / Approaching Standards --}}
                                    Hey there! If you're feeling behind in your academics, don't worry—it's never too late
                                    to improve. Start setting small, manageable goals to tackle each week and consider
                                    asking for help from teachers or a tutor. Remember, universities appreciate resilience
                                    and growth as much as grades. Highlight your strengths and unique experiences in your
                                    application. You got this—keep pushing forward!
                                @elseif($reports['score']['Academic'] >= 65 && $reports['score']['Academic'] < 85)
                                    {{-- Meet Standards --}}
                                    Great job aiming for those scores! They're often the first thing admissions officers
                                    look at, so it's super important to keep them up. If you've still got time before your
                                    final year, work on boosting or keeping your grades strong. If you're closer to applying
                                    or finding the academics tough, beef up your application with some leadership roles, new
                                    skills, and prep for tests like the SAT, ACT, TOEFL, or IELTS.
                                @elseif($reports['score']['Academic'] >= 85 && $reports['score']['Academic'] <= 100)
                                    {{-- Exceeding Standards --}}
                                    Awesome job keeping those scores up! A good score really helps catch the eye of
                                    university admissions officers. Keep it up, especially if you're aiming for universities
                                    in the UK or Asia where they really focus on your academics. Also, don’t forget to take
                                    tests like the SAT, ACT, IELTS, or TOEFL.
                                @endif
                            </td>
                        </tr>
                        <tr class="text-center bckg-color-table">
                            <th class="text-uppercase">Essay Writing</th>
                        </tr>
                        <tr style="border: 1px solid #7272ff;">
                            <td class="p-2">
                                @if ($reports['score']['Writing'] < 30 || $reports['score']['Writing'] < 65)
                                    {{-- Not Assessed / Approaching Standards --}}
                                    Hey there! Feeling a bit behind on your writing practice for university admissions? Set
                                    aside a little time each day for writing. Even just a few minutes can make a big
                                    difference. Start with simple journal entries or reflections on a favorite memory. This
                                    will help you get comfortable expressing your thoughts on paper. Remember, every piece
                                    you write gets you one step closer to mastery!
                                @elseif($reports['score']['Writing'] >= 65 && $reports['score']['Writing'] < 85)
                                    {{-- Meet Standards --}}
                                    Hey! Getting into some writing activities before your university applications can really
                                    sharpen your skills. Why not jump into some essay writing competitions? Plus, hit up
                                    some writing workshops or bootcamps, and try to scribble a little something every
                                    day—whether it’s journaling your thoughts or spinning a short story. It’ll boost your
                                    ability to share your personal experiences in a way that really shines.
                                @elseif($reports['score']['Writing'] >= 85 && $reports['score']['Writing'] <= 100)
                                    {{-- Exceeding Standards --}}
                                    You're off to a great start with your writing! Study successful essays for inspiration
                                    and practice regularly with college application prompts. It's super helpful to get
                                    feedback from your teachers and friends, join writing workshops, and keep tweaking your
                                    drafts.
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="mt-3 p-2" style="border:2px solid #1414FF">
                        <div class="card-body">
                            <p class="mb-0" style="font-size: 14px">
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
