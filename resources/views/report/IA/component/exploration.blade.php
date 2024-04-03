<div class="category">
    <div class="mt-3 mb-4">
        <h5>A. INTEREST EXPLORATION</h5>
    </div>

    @if ($reports[1]['is_surpass'])
        <div class="surpass">
            <p>
                <b>
                    It seems you are set on what you want for your future:
                </b>
            </p>

            <table class="fw-bold">
                @if ($reports[1]['major'] != null)
                    <tr>
                        <td width="30px">Major</td>
                        <td>: {{ $reports[1]['major'] }}</td>
                    </tr>
                @endif
                @if ($reports[1]['country'] != null)
                    <tr>
                        <td width="30px">Country</td>
                        <td>: {{ $reports[1]['country'] }}</td>
                    </tr>
                @endif
                @if ($reports[1]['university'] != null)
                    <tr>
                        <td width="30px">University</td>
                        <td>: {{ $reports[1]['university'] }}</td>
                    </tr>
                @endif
            </table>

            <p class="mt-2">
                That’s great! Knowing what and where you want to study, aligning them with your goals, and implementing
                them
                through a comprehensive daily schedule will give you an edge in the university admissions process.
            </p>

            <p class="mt-2">
                Here are your next steps:
            <ol>
                <li>Start working on your profile branding by crafting a comprehensive portrayal of yourself that
                    highlights
                    your academic achievements, extracurricular activities, skills, experiences, and personal qualities.
                </li>
                <li>Delve deeper and investigate potential career paths, fields of study, and hobbies that align with
                    your
                    interests. This can involve reading articles, watching documentaries, attending workshops or
                    seminars,
                    and talking to professionals in various fields.
                </li>
                <li>Be extra prepared by making curated university lists, that are realistic and tiered based on your
                    ability. For example:
                    <ul class="list-lower-latin">
                        <li>
                            <b>Reach:</b> Include Ivy League schools and others with notably low acceptance rates, where
                            admission is highly competitive.
                        </li>
                        <li>
                            <b>Target:</b> Select universities where your academic achievements and extracurricular
                            activities align closely with the average profile of accepted students, indicating a
                            reasonable
                            chance of admission.
                        </li>
                        <li>
                            <b>Safety:</b> Select universities where your academic and extracurricular credentials
                            surpass
                            the typical profile of admitted students, ensuring a high likelihood of acceptance.
                        </li>
                    </ul>
                </li>
            </ol>
            </p>
        </div>
    @else
        <div class="improvement">
            <p>
                <b>
                    You have taken some time to build up your profile but there is so much more that you can and should
                    do
                    to maximize your exploration journey. Continue reading to find out how you can further distinguish
                    yourself in the admissions process!
                </b>
            </p>

            {{-- Improvement by question --}}

            {{-- Major --}}
            @if ($reports[1][1])
                <div class="major">
                    <p>
                        Are you still confused about which major to pick?
                    </p>

                    <p>
                        To narrow it down you can do these steps:
                    </p>

                    <ul class="list-lower-latin">
                        <li>
                            <b>Assess Interests</b>: Identify what you enjoy studying or doing.
                        </li>
                        <li>
                            <b>Evaluate Strengths</b>: Consider what subjects or skills you excel in.
                        </li>
                        <li>
                            <b>Research Majors</b>: Look into what each major involves and offers.
                        </li>
                        <li>
                            <b>Consider Careers</b>: Explore job prospects for different majors.
                        </li>
                        <li>
                            <b>Seek advice</b>: Talk to students, alumni, and professionals for insights.
                        </li>
                        <li>
                            <b>Be Open to Change</b>: It's okay to switch majors if your interests or goals evolve.
                        </li>
                    </ul>
                </div>
            @endif

            {{-- Daily Schedule --}}
            @if ($reports[1][2])
                <div class="daily-schedule">
                    <p>
                        Let’s upgrade that schedule! Many universities will be interested in what you’ve done and always
                        look at the amount of your activities.
                    </p>
                    <p>
                        While the results of your efforts are definitely a plus, the process towards achieving that can
                        also
                        be documented to showcase your persistence and hard work!
                    </p>
                    <p>
                        Even doing something as simple as your hobbies will count towards something, so invest more in
                        doing
                        various pastimes that will be beneficial for admissions and preparing you for university life.
                    </p>

                    <ul>
                        For Example:
                        <li>
                            Doing sports like football and tennis shows your ability to work in a team
                        </li>
                        <li>
                            Doing hobbies like crocheting or cooking shows your ability to be patient
                        </li>
                        <li>
                            Helping out with family errands or running their business shows your ability to be
                            responsible
                        </li>
                    </ul>

                    <p>
                        Many of these activities can be inserted into your application later on!
                    </p>
                </div>
            @endif

            {{-- Goals --}}
            @if ($reports[1][3])
                <div class="goals">
                    <p>
                        Identifying your goals may seem daunting, but they are important as they can give you direction
                        and keep your motivation going as you know that you are aiming towards something.
                    </p>
                    <ol>
                        How can we do that?
                        <li>
                            <b>Think About What You Like:</b> Ask yourself what you enjoy and where you want to be in
                            the future. Know what you're good at and what you can improve.
                        </li>
                        <li>
                            <b>Look Into Options:</b> Explore careers, studies, and hobbies that catch your interest by
                            reading, watching videos, attending events, or talking to people already in those fields.
                        </li>
                        <li>
                            <b>
                                Know What Matters to You:
                            </b>
                            Figure out which values are most important to you, like helping others, being creative, or
                            making money. These values should guide your goals.
                        </li>
                        <li>
                            <b>
                                Set Big and Small Goals:
                            </b>
                            Understand the difference between goals you can reach soon and those that will take
                            longer. Make sure all your goals help you move toward your big picture.
                        </li>
                        <li>
                            <b>
                                Be Clear and Measurable:
                            </b>
                            Instead of vague goals, set clear ones like improving your academic results to a
                            benchmark. This helps you to know exactly what you're aiming for.
                        </li>
                        <li>
                            <b>
                                Write Them Down:
                            </b>
                            Putting your goals on paper makes them real and reminds you of what you're working
                            towards. You can also check and change them as needed.
                        </li>
                        <li>
                            <b>
                                Plan Your Steps:
                            </b>
                            Decide what actions you need to take for each goal. This might include learning new
                            things, taking certain classes, or getting work experience.
                        </li>
                        <li>
                            <b>
                                Get Advice
                            </b>
                            : Share your goals with people who can support and advise you, like mentors, teachers, or
                            family.
                        </li>
                        <li>
                            <b>
                                Check In On Your Goals:
                            </b>
                            As you grow and learn, your goals might change. Regularly look at your goals and how
                            you're doing, and be ready to adjust them.
                        </li>
                    </ol>
                </div>
            @endif

            {{-- Dream Country --}}
            @if ($reports[1][4])
                <div class="dream-country">
                    <p>
                        Picking your dream university shouldn’t be complicated!
                    </p>
                    <p>
                        When choosing where to study abroad, start by looking into different countries and universities
                        that offer programs related to your interests. But it's not just about the courses;
                        <b>the culture and lifestyle of the place</b> are super important too. Imagine living there—does
                        it feel
                        right?
                    </p>
                    <p>
                        Language is another big thing to consider. Will you be comfortable speaking the language used
                        there, both in and out of the classroom? And then there's the financial aspect. Look at how much
                        tuition and living expenses cost. Can you manage it, or are there scholarships you can apply
                        for?
                    </p>
                    <p>

                        You'll also need to check out the nitty-gritty details like admission requirements and what you
                        need to do to get a visa. It's a good idea to
                        <b>
                            chat with people who've been there and done that
                        </b>—alumni or current students can give you the real scoop on what it's like.
                    </p>
                    <p>
                        Think about your future too.
                        <b>
                            What kind of job opportunities are there in that country after you
                            graduate?
                        </b>
                        And if it's possible, try to visit the place before you make your final decision.
                        Nothing beats experiencing a school firsthand to see if it’s truly the right fit for you.
                    </p>
                </div>
            @endif
        </div>
    @endif

</div>
