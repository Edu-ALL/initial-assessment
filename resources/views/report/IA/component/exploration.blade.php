<div class="category-0">
    <div class="text-center mt-3 mb-4">
        <h5>Exploration</h5>
    </div>

    @if ($reports[1]['is_surpass'])
        <div class="surpass">
            <p>
                It seems you are set on what you want for your future:
            </p>

            <table>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>Major</td>
                    <td>: {{ $reports[1]['major'] }}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>: {{ $reports[1]['country'] }}</td>
                </tr>
                <tr>
                    <td>University</td>
                    <td>: {{ $reports[1]['university'] }}</td>
                </tr>
            </table>

            <p class="mt-2">
                That’s great! Knowing what and where you want to study, aligning them with your goals, and
                implementing them
                through a comprehensive daily schedule will definitely help ease you in the university
                admissions process.
            </p>

            <p class="mt-2">
                The next step that you could do:
            <ol>
                <li>Start working on your profile branding by crafting a comprehensive portrayal of yourself
                    that highlights
                    your academic achievements, extracurricular activities, skills, experiences, and
                    personal
                    qualities.
                </li>
                <li>Delve deeper and investigate potential career paths, fields of study, and hobbies that
                    align
                    with your
                    interests. This can involve reading articles, watching documentaries, attending
                    workshops or
                    seminars,
                    and talking to professionals in various fields.</li>
                <li>Be extra prepared by making curated university lists, that are realistic and tiered
                    based on
                    your
                    ability, for example:
                    <ul class="list-lower-latin">
                        <li>
                            Reach: Ivy leagues, university with low acceptance rates.
                        </li>
                        <li>
                            Target: The universities where your academic credentials fall well within the
                            school's average
                            acceptance rates.
                        </li>
                        <li>
                            Safety: Back-up universities that you know you will be accepted into, high
                            acceptance rates.
                        </li>
                    </ul>
                </li>
            </ol>
            </p>
        </div>
    @else
        <div class="improvement">
            <p>
                You have done some explorations while building up your profile but for sure there is so much
                more
                that you can and should do to maximize the exploration journey.
            </p>

            {{-- Improvement by question --}}

            {{-- Major --}}
            @if ($reports[1][1])
                <div class="major">
                    <p>
                        Still confused about which major to pick?
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
                            <b>Consider Careers</b>: Explore job prospects for difference majors.
                        </li>
                        <li>
                            <b>Seek advice</b>: Talk to student, alumni, and, professionals for insight.
                        </li>
                        <li>
                            <b>By Open to Change</b>: It's okay to switch majors if your interests goals evolve.
                        </li>
                    </ul>
                </div>
            @endif

            {{-- Daily Schedule --}}
            @if ($reports[1][2])
                <div class="daily-schedule">
                    <p>
                        Let’s upgrade that schedule! Many universities will be interested in what you’ve done
                        and always look at
                        the
                        amount of your activities
                    </p>
                    <p>
                        While the end results of your efforts is definitely a plus, the process towards
                        achieving that can also
                        be
                        documented to showcase your persistence and hard work!
                    </p>
                    <p>
                        Even doing something as simple as your hobbies will count towards something, so invest
                        more in doing
                        various
                        pastimes that will be beneficial for admissions and preparing you for university life.
                    </p>

                    <ul>
                        For Example:
                        <li>
                            Doing sports like football, tennis, etc, shows your ability in teamwork
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
                        Many of these activities can be inserted in your application later on!
                    </p>
                </div>
            @endif

            {{-- Goals --}}
            @if ($reports[1][3])
                <div class="goals">
                    <p>
                        Identifying your goals may seem daunting, but they are important as they can give you
                        direction and keep
                        the
                        motivation going as you know that you are aiming towards something.
                    </p>
                    <ol>
                        How can we do that?
                        <li>
                            <b>Think About What You Like</b>: Ask yourself what you enjoy and where you want to
                            be in the
                            future.
                            Know what you're good at and what you can improve.
                        </li>
                        <li>
                            <b>Look Into Options</b>: Explore careers, studies, and hobbies that catch your
                            interest by reading,
                            watching videos, attending events, or talking to people already in those fields.
                        </li>
                        <li>
                            <b>
                                Know What Matters to You
                            </b>
                            : Figure out which values are most important to you, like helping others, being
                            creative, or making
                            money. These values should guide your goals.
                        </li>
                        <li>
                            <b>
                                Set Big and Small Goals
                            </b>
                            : Understand the difference between goals you can reach soon and those that will
                            take longer. Make
                            sure
                            all your goals help you move toward your big picture.
                        </li>
                        <li>
                            <b>
                                Be Clear and Measurable
                            </b>
                            : Instead of vague goals, set clear ones like improving your GPA to a certain
                            number. This helps you
                            know exactly what you're aiming for.
                        </li>
                        <li>
                            <b>
                                Write Them Down
                            </b>
                            : Putting your goals on paper makes them real and reminds you of what you're working
                            towards. You
                            can
                            also check and change them as needed.
                        </li>
                        <li>
                            <b>
                                Plan Your Steps
                            </b>
                            : Decide what actions you need to take for each goal. This might include learning
                            new things, taking
                            certain classes, or getting work experience.
                        </li>
                        <li>
                            <b>
                                Get Advice
                            </b>
                            : Share your goals with people who can support and advise you, like mentors,
                            teachers, or family.
                        </li>
                        <li>
                            <b>
                                Check In On Your Goals
                            </b>
                            : As you grow and learn, your goals might change. Regularly look at your goals and
                            how you're doing,
                            and
                            be ready to adjust them.
                        </li>
                    </ol>
                </div>
            @endif

            {{-- Dream Country --}}
            @if ($reports[1][4])
                <div class="dream-country">
                    <p>
                        Starting to pick your dream country or university shouldn’t be complicated!
                    </p>
                    <p>
                        When choosing where to study abroad, start by looking into different countries and
                        universities that
                        offer
                        programs related to your interests. But it's not just about the courses; <b>the culture
                            and lifestyle of
                            the
                            place</b> are super important too. Imagine living there—does it feel right to you?
                    </p>
                    <p>
                        Language is another big thing to consider. Will you be comfortable speaking the language
                        used there,
                        both in
                        and out of class? And then there's the money aspect. Look at how much it will cost for
                        tuition and
                        living
                        expenses. Can you manage it, or are there scholarships you can apply for?
                    </p>
                    <p>
                        You'll also need to check out the nitty-gritty details like admission requirements and
                        what you need to
                        do
                        to get a visa. It's a good idea to chat with people who've been there and done
                        that—alumni or current
                        students can give you the real scoop on what it's like.
                    </p>
                    <p>
                        Think about your future too. <b>What kind of job opportunities are there in that country
                            after you
                            graduate?</b>
                        And if it's possible, try to visit the place before you make your final decision.
                        Nothing beats
                        experiencing
                        it firsthand to see if it truly feels like the right fit for you.
                    </p>
                </div>
            @endif
        </div>
    @endif

</div>
