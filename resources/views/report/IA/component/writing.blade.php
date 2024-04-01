<div class="category">
    <div class="mt-4 mb-4">
        <h5>D. Writing</h5>
    </div>

    @if ($reports[4]['is_surpass'])
        <div class="surpass">
            <p>
                Having confidence in your writing is a great start! Being confident can translate well into your writing
                as
                it showcases your ability to articulate your thoughts, experiences, and aspirations through writing and
                can
                set you apart in the application process. This skill acts as a bridge, connecting your past achievements
                with your future potential, allowing admission officers to see the depth of your character and
                intellect.
            </p>
            <p>
                Therefore, it's important to continuously invest time in refining your writing even more. Whether
                through
                reading broadly, engaging in diverse writing practices, or seeking constructive feedback, each step you
                take
                to improve your writing opens new doors to expressing your unique story and vision. Remember, in the
                competitive realm of university admissions, your written words hold the power to leave a lasting
                impression.
            </p>
        </div>
    @else
        <div class="improvement">
            <p>
                Writing is very much the only window where university admission officers can get a different perspective
                on
                you beyond your academic achievements, test scores, and extracurriculars.
            </p>
            <p>
                Therefore, if you’re confused or not confident with your writing, it’s important to begin your essays
                early
                so you can always have time to revise, edit, and submit the best piece you can offer!
            </p>

            {{-- Improvement by question --}}
            {{-- Increasing-confidence --}}
            @if ($reports[4][1])
                <div class="increasing-confidence">
                    <p>
                        Increasing confidence in writing involves practice, feedback, and a positive mindset!
                    </p>
                    <p>
                        The easiest way to start would be by <b>writing regularly and starting small</b>, you can
                        gradually
                        increase the length and complexity of your writing as you become more comfortable.
                    </p>

                    <ol>
                        For university essays, this can be implemented by:
                        <li>
                            creating a simple outline first
                        </li>
                        <li>
                            updating each paragraph daily but little by little (setting achievable writing goals to help
                            track
                            your
                            progress)
                        </li>
                        <li>
                            ask feedback
                        </li>
                        <li>
                            revising and editing your work continuously until you have refined your ideas and expressed
                            them
                            clearly
                        </li>
                    </ol>

                    <p>
                        It’s always <b>important to be open to feedback</b> and seek it from your friends, family, or
                        even
                        people you don’t
                        know to get a fresh perspective, for example, a mentor. It may be hard at first, but it’s normal
                        to
                        make
                        mistakes!
                    </p>

                    <p>
                        The university essays will also touch upon your personal experiences, therefore <b>spend some
                            time
                            self-reflecting</b> and digging back into your memories which you can use later on.
                    </p>

                    <p>
                        Be sincere in your writing and it will definitely show!
                    </p>
                </div>
            @endif

            {{-- Activities in writing --}}
            @if ($reports[4][2])
                <div class="activities-in-writing">
                    <p>
                        Engaging in writing activities prior to doing your university admissions is very important and
                        here’s
                        why!
                    </p>
                    <p>
                        First off, <b>the more you write, the better you get at it!</b> Writing helps you get your
                        thoughts
                        straight
                        and argue your points like a pro. It also <b>makes you better at sharing your own stories and
                            feelingss</b>,
                        which is exactly what college essays often ask you to do. Plus, <b>practicing writing with
                            deadlines
                            teaches you how to work fast</b> and still do a great job, which is a lifesaver when you're
                        filling
                        out those college applications and also later on when you go to college.
                    </p>
                    <p>
                        Second, trying out different kinds of writing makes you more creative and gives you a bunch of
                        cool
                        ideas
                        for your college essays. You'll also have a bunch of writing pieces ready to go, which can
                        really
                        help
                        when
                        you're stuck. Getting good at changing your writing style depending on the question, doing
                        research
                        for
                        your
                        essays, and gearing up for all the writing you'll have to do in college are all super important.
                        And
                        don’t
                        forget, <b>the more you write, the more confident you'll feel</b> about your writing skills. So
                        when
                        it's time
                        to
                        apply to college, you'll be ready to ace those essays.
                    </p>
                    <ul class="list-lower-latin">
                        So let’s try increasing that participation in:
                        <li>
                            Various competitions: doing academic essays or writing business plans can help you
                            understand
                            what
                            universities are usually looking for and train your brain to be quick.
                        </li>
                        <li>
                            Writing workshops or bootcamps
                        </li>
                        <li>
                            Self-writing (journals, stories, etc.): take time for at least 10 minutes a day to write
                            down
                            what
                            you did
                            that day or how you were feeling. Doing this will help prepare you for writing about your
                            personal
                            experiences!
                        </li>
                    </ul>

                </div>
            @endif


        </div>
    @endif

</div>
