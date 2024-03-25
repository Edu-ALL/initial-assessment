<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .content {
            font-size: 12px !important;
        }

        .list-lower-latin {
            list-style-type: lower-latin;
        }

        .header {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/pdf/edu-all-header.webp') }}" width="auto" height="50px" style="margin-left: 50px; margin-top: 50px;">

    </div>

    {{-- Start Surpass --}}
    <div class="surpass-0 section-title text-center mt-5">
        <h5>Exploration</h5>
    </div>

    {{-- Content Exploration --}}
    <div class="content mt-5 ms-5">
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
                <td>: ...</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>: ...</td>
            </tr>
            <tr>
                <td>University</td>
                <td>: ...</td>
            </tr>
        </table>

        <p class="mt-2">
            That’s great! Knowing what and where you want to study, aligning them with your goals, and implementing them
            through a comprehensive daily schedule will definitely help ease you in the university admissions process.
        </p>

        <p class="mt-2">
            The next step that you could do:
        <ol>
            <li>Start working on your profile branding by crafting a comprehensive portrayal of yourself that highlights
                your academic achievements, extracurricular activities, skills, experiences, and personal qualities.
            </li>
            <li>Delve deeper and investigate potential career paths, fields of study, and hobbies that align with your
                interests. This can involve reading articles, watching documentaries, attending workshops or seminars,
                and talking to professionals in various fields.</li>
            <li>Be extra prepared by making curated university lists, that are realistic and tiered based on your
                ability, for example:
                <ul class="list-lower-latin">
                    <li>
                        Reach: Ivy leagues, university with low acceptance rates.
                    </li>
                    <li>
                        Target: The universities where your academic credentials fall well within the school's average
                        acceptance rates.
                    </li>
                    <li>
                        Safety: Back-up universities that you know you will be accepted into, high acceptance rates.
                    </li>
                </ul>
            </li>
        </ol>
        </p>
    </div>

    {{-- end surpass --}}

    {{-- start Improvement --}}
    <div class="improvement-0 section-title ms-5 mt-5">
        <h5>Improvement</h5>
    </div>

    <div class="content mt-3 ms-5">
        <p>
            Hi "Name"!
        </p>

        <p>
            You have done some explorations while building up your profile but for sure there is so much more
            that you can and should do to maximize the exploration journey.
        </p>

        {{-- Improvement by question --}}

        {{-- Major --}}
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

        {{-- Daily Schedule --}}
        <div class="daily-schedule">
            <p>
                Let’s upgrade that schedule! Many universities will be interested in what you’ve done and always look at
                the
                amount of your activities
            </p>
            <p>
                While the end results of your efforts is definitely a plus, the process towards achieving that can also
                be
                documented to showcase your persistence and hard work!
            </p>
            <p>
                Even doing something as simple as your hobbies will count towards something, so invest more in doing
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
                    Helping out with family errands or running their business shows your ability to be responsible
                </li>
            </ul>

            <p>
                Many of these activities can be inserted in your application later on!
            </p>
        </div>


        {{-- Goals --}}
        <div class="goals">
            <p>
                Identifying your goals may seem daunting, but they are important as they can give you direction and keep
                the
                motivation going as you know that you are aiming towards something.
            </p>
            <ol>
                How can we do that?
                <li>
                    <b>Think About What You Like</b>: Ask yourself what you enjoy and where you want to be in the
                    future.
                    Know what you're good at and what you can improve.
                </li>
                <li>
                    <b>Look Into Options</b>: Explore careers, studies, and hobbies that catch your interest by reading,
                    watching videos, attending events, or talking to people already in those fields.
                </li>
                <li>
                    <b>
                        Know What Matters to You
                    </b>
                    : Figure out which values are most important to you, like helping others, being creative, or making
                    money. These values should guide your goals.
                </li>
                <li>
                    <b>
                        Set Big and Small Goals
                    </b>
                    : Understand the difference between goals you can reach soon and those that will take longer. Make
                    sure
                    all your goals help you move toward your big picture.
                </li>
                <li>
                    <b>
                        Be Clear and Measurable
                    </b>
                    : Instead of vague goals, set clear ones like improving your GPA to a certain number. This helps you
                    know exactly what you're aiming for.
                </li>
                <li>
                    <b>
                        Write Them Down
                    </b>
                    : Putting your goals on paper makes them real and reminds you of what you're working towards. You
                    can
                    also check and change them as needed.
                </li>
                <li>
                    <b>
                        Plan Your Steps
                    </b>
                    : Decide what actions you need to take for each goal. This might include learning new things, taking
                    certain classes, or getting work experience.
                </li>
                <li>
                    <b>
                        Get Advice
                    </b>
                    : Share your goals with people who can support and advise you, like mentors, teachers, or family.
                </li>
                <li>
                    <b>
                        Check In On Your Goals
                    </b>
                    : As you grow and learn, your goals might change. Regularly look at your goals and how you're doing,
                    and
                    be ready to adjust them.
                </li>
            </ol>
        </div>

        {{-- Dream Country --}}
        <div class="dream-country">
            <p>
                Starting to pick your dream country or university shouldn’t be complicated!
            </p>
            <p>
                When choosing where to study abroad, start by looking into different countries and universities that
                offer
                programs related to your interests. But it's not just about the courses; <b>the culture and lifestyle of
                    the
                    place</b> are super important too. Imagine living there—does it feel right to you?
            </p>
            <p>
                Language is another big thing to consider. Will you be comfortable speaking the language used there,
                both in
                and out of class? And then there's the money aspect. Look at how much it will cost for tuition and
                living
                expenses. Can you manage it, or are there scholarships you can apply for?
            </p>
            <p>
                You'll also need to check out the nitty-gritty details like admission requirements and what you need to
                do
                to get a visa. It's a good idea to chat with people who've been there and done that—alumni or current
                students can give you the real scoop on what it's like.
            </p>
            <p>
                Think about your future too. <b>What kind of job opportunities are there in that country after you
                    graduate?</b>
                And if it's possible, try to visit the place before you make your final decision. Nothing beats
                experiencing
                it firsthand to see if it truly feels like the right fit for you.
            </p>
        </div>

    </div>
    {{-- end exploration --}}

    {{-- Start Surpass Profile Building --}}
    <div class="surpass section-title text-center mt-5">
        <h5>Profile Building</h5>
    </div>

    {{-- Content Exploration --}}
    <div class="content mt-5 ms-5">
        <p>
            The amount of activities you have is great! Yet, imagine the endless possibilities if you were to enrich
            your profile even further.
        </p>

        <ul>
            When the opportunity strikes, continue by doing more of these activities:
            <li>
                Competitions
            </li>
            <li>
                Internships
            </li>
            <li>
                Volunteering
            </li>
            <li>
                School Clubs
            </li>
            <li>
                Out-of-school
            </li>
            <li>
                Summer/winter programs
            </li>
        </ul>

        <ol>
            Some tips to make your profile more robust:
            <li>
                Increasing activities that align with the major you want to pursue later on.
            </li>
            <li>
                Initiate a project that has benefits for those around you, such as:
                <ul class="list-lower-latin">
                    <li>
                        Community/organization
                    </li>
                    <li>
                        Campaign on issues that weigh on your mind
                    </li>
                    <li>
                        Projects solving problems around you through science and social sciences
                    </li>
                    <li>
                        Innovation of tools that can facilitate human activities
                    </li>
                    <li>
                        Artistic innovation
                    </li>
                </ul>
            </li>
        </ol>

        <p>
            Another tip is don’t forget to always document all your activities and keep the files organized as they will
            be asked for admission.
        </p>
    </div>

    {{-- end surpass --}}

    {{-- start Improvement --}}
    <div class="improvement section-title ms-5 mt-5">
        <h5>Improvement</h5>
    </div>

    <div class="content mt-3 ms-5">
        <p>
            Hi "Name"!
        </p>

        <p>
            It seems you haven’t spent time building your profile. Let’s list down what activities you can do to
            boost your profile.
        </p>

        {{-- Improvement by question --}}

        {{-- competition --}}
        <div class="competition">
            <p>
                Participating in competitions showcases your ambition and drive to excel in a specific area. It
                helps
                develop your skills under pressure and can highlight your achievements on a national or
                international
                level.
            </p>

            <p>
                Note that there are a wide variety of competitions which are not limited to just academic subjects
                like
                olympiads. Understand your abilities and branch out by doing competitions such as:
            </p>

            <ol>
                <li>
                    business pitching,
                </li>
                <li>
                    resarch paper,
                </li>
                <li>
                    or event essay competitions,
                </li>
            </ol>
        </div>

        {{-- Internship --}}
        <div class="internship">
            <p>
                Internships provide hands-on experience in your field of interest, allowing you to apply academic
                knowledge in real-world settings. They are crucial for understanding workplace dynamics, building
                professional networks, and enhancing your resume with practical experience.
            </p>

            <p>
                Remember! The point of an internship is to expose you to a professional setting. Thus whether the
                size
                of the company and the amount of time done is small it will still be beneficial for you!
            </p>
        </div>

        {{-- Volunteering --}}
        <div class="volunteering">
            <p>
                Volunteering demonstrates your commitment to community service and social responsibility. It helps
                develop empathy, teamwork, and leadership skills while contributing positively to society. It also
                broadens your perspective and can open up new areas of interest.
            </p>

            <p>
                Volunteering doesn’t have to be grand by collaborating with a big company and using many funds!
                Initiating small prolonged causes is also great!
            </p>

            <ul>
                <li>
                    Teaching academic subjects twice a week at an orphanage
                </li>
                <li>
                    Holding art/music therapy classes for elders
                </li>
                <li>
                    Doing fundraising and donating to people in need
                </li>
            </ul>
        </div>

        {{-- School Clubs --}}
        <div class="school-clubs">
            <p>
                Involvement in school clubs indicates your ability to balance academic and extracurricular
                activities. It's an opportunity to pursue interests outside of the traditional curriculum.
            </p>
            <p>
                In some schools, you can create your own club if there are enough people interested in joining!
                Through these school clubs, you can also initiate external activities which show your commitment to
                upgrading your profile.
            </p>
            <ul>
                Examples:
                <li>
                    Participating in tournaments with your school sports club or debate club
                </li>
                <li>
                    Going to entrepreneurship club and making a collaborative business
                </li>
            </ul>
        </div>

        {{-- Out of school --}}
        <div class="out-of-school">
            <p>
                Engaging in out-of-school activities showcases your initiative to seek personal growth opportunities
                beyond the classroom. It reflects a well-rounded character, time management skills, and the ability
                to pursue passions independently.
            </p>

            <ul>
                Examples:
                <li>
                    Doing coding club and creating a website/game
                </li>
                <li>
                    Going to art clubs and creating crafts or performing shows
                </li>
                <li>
                    Attending cooking club and contributing to a food bank
                </li>
            </ul>
        </div>

        {{-- summer/winter --}}
        <div class="summer">
            <p>
                Participating in summer or winter educational programs demonstrates your eagerness to use breaks
                productively for further learning. These programs can offer intensive learning experiences, exposure
                to new cultures, and opportunities to explore subjects in depth.
            </p>

            <p>
                Don’t forget, it’s important to take a look into what the program offers so it can be useful for
                your CV. For example, focusing on
            </p>

            <ol>
                <li>
                    Community service
                </li>
                <li>
                    Research initiatives
                </li>
                <li>
                    Exploring certain majors
                </li>
                <li>
                    Cultural exchange and university tours
                </li>
            </ol>
        </div>

        {{-- Personal project --}}
        <div class="personal-project">
            <p>
                Undertaking personal projects shows self-motivation and the ability to work independently. It's a
                chance to explore interests deeply, solve problems creatively, and potentially innovate or create
                something unique.
            </p>

            <ol>
                Examples:
                <li>
                    Create an app that tackles a social issue
                </li>
                <li>
                    Starting a small business, such as selling your own creations
                </li>
                <li>
                    Designing a book or IG page that aims to bring awareness to a certain cause
                </li>
            </ol>
        </div>

        {{-- Research project --}}
        <div class="research-project">
            <p>
                Engaging in research projects, especially those that lead to publication or presentation,
                underscores your commitment to academic inquiry and contribution to your field of study. It develops
                critical thinking, and analytical skills, and can significantly enhance your academic profile.
            </p>
            <p>
                Remember, research doesn’t always have to be scientific! It can encompass various subjects, all you
                need to do is cater the research question to the topic you want to investigate.
            </p>

            <ol>
                For example, analyzing:
                <li>
                    Financial situations in different countries
                </li>
                <li>
                    Repercussions of social media
                </li>
                <li>
                    Environmental hazards towards a society
                </li>
            </ol>
        </div>
    </div>

    {{-- Start Surpass Academic --}}
    <div class="surpass section-title text-center mt-5">
        <h5>Academic</h5>
    </div>

    {{-- Content Exploration --}}
    <div class="content mt-5 ms-5">
        <p>
            Keep up the exceptional work! Having a good score is a great start to being noticed by university
            admission officers, it shows your dedication to studying hard and lets them know you are serious about
            your academics and will definitely be when you sit in university!
        </p>
        <p>
            Continue to maintain that score, especially if you are aiming to go to UK and Asian universities, they
            put more focus on your academic score as they are usually the main requirements in getting accepted; not
            only your final score, but also required subjects that are related to the major that you apply to (HL
            subject in IBDP and A-Level subject in Cambridge A-Level.
        </p>
        <p>
            If you haven’t taken any standardized tests, please do so. They can sometimes be considered as a “bonus”
            score which can definitely help boost your profile. Having these tests on hand is also helpful if you
            are planning to apply to various countries.
        </p>
    </div>
    {{-- end surpass --}}


    {{-- start Improvement --}}
    <div class="improvement section-title ms-5 mt-5">
        <h5>Improvement</h5>
    </div>

    <div class="content mt-3 ms-5">
        <p>
            Hi "Name"!
        </p>

        <p>
            While many aspects such as your activities and writing abilities are taken into account, having a decent
            score serves as the first pinpoint an admission officer would look at, therefore let’s aim to achieve the
            best!
        </p>

        {{-- Improvement by question --}}

        {{-- Standardized Tests --}}
        <div class="standardized-tests">
            <div class="sat">
                <b>SAT:</b>
                <p>
                    The SAT test aims to measure a high school student's readiness for college through their English and
                    math abilities. It is usually aimed at students who are applying to the US but it can still be
                    beneficial as a plus point if you plan to go to the UK, Australia, or Japan.
                </p>

                <p>
                    To find complete info on the SAT test from registration procedures, and content curriculum of the
                    test,
                    everything can be accessed at
                    <a href="https://satsuite.collegeboard.org/sat">https://satsuite.collegeboard.org/sat</a>
                </p>

                <p>
                    In addition you can also find official simulations of the test on
                    <a href="https://bluebook.collegeboard.org/">https://bluebook.collegeboard.org/.</a>
                </p>

                <p>
                    Another website that provides a comprehensive study guide is
                    <a href="https://www.khanacademy.org/digital-sat">https://www.khanacademy.org/digital-sat.</a>
                </p>

                <p>
                    Be sure to check it out!
                </p>
            </div>

            <div class="ielts-toefl">
                <b>IELTS & TOEFL:</b>
                <p>
                    As you may know, both the IELTS and TOEFL test are used to measure the English language ability of
                    non-native speakers wishing to enroll in English-speaking universities.
                </p>
                <p>
                    If your school implements the IBDP curriculum, usually it won’t be necessary, however, if you are
                    from a
                    school that uses the Cambridge or national Indonesian curriculum it is mainly mandatory.
                </p>
                <p>
                    Both have a similar structure of <b>Reading, Listening, Writing, Speaking,</b> but the content and
                    scoring still differ. Therefore don’t forget to study the structure and tips and tricks to excel at
                    the
                    test!
                </p>
                <p>
                    For TOEFL you can access their resources and register for the official test at
                    <a href="https://www.ets.org/toefl/test-takers/ibt/about.html">https://www.ets.org/toefl/test-takers/ibt/about.html</a>
                </p>
                <p>
                    While for IELTS, applying for the official test has to be done through external agents. In
                    Indonesia,
                    the 3
                    main agents that have centers in every city are
                    IDP:
                    <a href="https://ielts.idp.com/indonesia/test-dates">https://ielts.idp.com/indonesia/test-dates</a>
                    IALF:
                    <a href="https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/">https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/</a>

                    The British Council:
                    <a href="https://www.britishcouncilfoundation.id/en/exam/ielts">https://www.britishcouncilfoundation.id/en/exam/ielts</a>

                </p>

                <p>
                    Be careful when choosing whether you want to take the computer or paper-based test!
                </p>
            </div>
        </div>

        {{-- Based on score --}}
        <div class="based-on-score">
            <div class="low-score">
                <p>
                    With this score, there is a slight probability you can be accepted in some low-competitive
                    universities (taking into account other aspects like your profile and essays are exceptional).
                </p>
                <p>
                    However, it’s time to also be realistic and search for alternative options!
                </p>
                <p>
                    Other choices that you can do is going to community college, doing a gap year, or taking foundation
                    classes first before continuing on to university.
                </p>
                <p>
                    Don’t worry! There are many benefits to this, not only are class sizes much smaller and the schedule
                    is more flexible, but by doing this you will actually be more prepared for entering university later
                    on.
                </p>
            </div>

            <div class="mid-score">
                <p>
                    The score you have received is fairly decent and above average. With this score, it will be easier
                    to apply for admission to normal universities/ colleges.
                </p>
            </div>

            <div class="high-score">
                <p>
                    This is already considered a good score. It shows that you have worked hard to pass the IBDP or
                    A-Level
                    and you are an intelligent person. Although it is not a top-type result, you are still considered in
                    the
                    top 30% of all who completed the program. Keep on striving to maintain and improve these scores!
                </p>
            </div>
        </div>

        {{-- additional tips --}}
        <div class="additional-tips">
            <ul class="list-lower-latin">
                Some additional tips:
                <li>
                    If you are not yet in your final year of school, make sure to earnestly work on improving or
                    maintaining your grades and to obtain or maintain a ranking (if your school has a ranking system).

                </li>
                <li>
                    If you find it difficult to achieve the previous point or you are in your final year of school,
                    consider and take advantage of other opportunities such as leadership experiences or skill
                    development.
                </li>
                <li>
                    It would be very helpful if you prepare for and take standardized tests, like the
                    SAT/ACT/TOEFL/IELTS or similar tests as a 'bonus score' in the file selection process.
                </li>
            </ul>
        </div>
    </div>

    {{-- Start Surpass Writing --}}
    <div class="surpass section-title text-center mt-5">
        <h5>Writing</h5>
    </div>

    {{-- Content Exploration --}}
    <div class="content mt-5 ms-5">
        <p>
            Writing is very much the only window where university admission officers can get a different perspective on
            you beyond your academic achievements, test scores, and extracurriculars.
        </p>
        <p>
            Therefore, if you’re confused or not confident with your writing, it’s important to begin your essays early
            so you can always have time to revise, edit, and submit the best piece you can offer!
        </p>

    </div>
    {{-- end surpass --}}

    {{-- start Improvement --}}
    <div class="improvement section-title ms-5 mt-5">
        <h5>Improvement</h5>
    </div>

    <div class="content mt-3 ms-5">
        <p>
            Hi "Name"!
        </p>

        {{-- Improvement by question --}}

        {{-- Increasing-confidence --}}
        <div class="increasing-confidence">
            <p>
                Increasing confidence in writing involves practice, feedback, and a positive mindset!
            </p>
            <p>
                The easiest way to start would be by <b>writing regularly and starting small</b>, you can gradually
                increase the length and complexity of your writing as you become more comfortable.
            </p>

            <ol>
                For university essays, this can be implemented by:
                <li>
                    creating a simple outline first
                </li>
                <li>
                    updating each paragraph daily but little by little (setting achievable writing goals to help track
                    your
                    progress)
                </li>
                <li>
                    ask feedback
                </li>
                <li>
                    revising and editing your work continuously until you have refined your ideas and expressed them
                    clearly
                </li>
            </ol>

            <p>
                It’s always <b>important to be open to feedback</b> and seek it from your friends, family, or even
                people you don’t
                know to get a fresh perspective, for example, a mentor. It may be hard at first, but it’s normal to make
                mistakes!
            </p>

            <p>
                The university essays will also touch upon your personal experiences, therefore <b>spend some time
                    self-reflecting</b> and digging back into your memories which you can use later on.
            </p>

            <p>
                Be sincere in your writing and it will definitely show!
            </p>
        </div>

        {{-- Activities in writing --}}
        <div class="activities-in-writing">
            <p>
                Engaging in writing activities prior to doing your university admissions is very important and here’s
                why!
            </p>
            <p>
                First off, <b>the more you write, the better you get at it!</b> Writing helps you get your thoughts
                straight
                and argue your points like a pro. It also <b>makes you better at sharing your own stories and
                    feelingss</b>,
                which is exactly what college essays often ask you to do. Plus, <b>practicing writing with deadlines
                    teaches you how to work fast</b> and still do a great job, which is a lifesaver when you're filling
                out those college applications and also later on when you go to college.
            </p>
            <p>
                Second, trying out different kinds of writing makes you more creative and gives you a bunch of cool
                ideas
                for your college essays. You'll also have a bunch of writing pieces ready to go, which can really help
                when
                you're stuck. Getting good at changing your writing style depending on the question, doing research for
                your
                essays, and gearing up for all the writing you'll have to do in college are all super important. And
                don’t
                forget, <b>the more you write, the more confident you'll feel</b> about your writing skills. So when
                it's time
                to
                apply to college, you'll be ready to ace those essays.
            </p>
            <ul class="list-lower-latin">
                So let’s try increasing that participation in:
                <li>
                    Various competitions: doing academic essays or writing business plans can help you understand what
                    universities are usually looking for and train your brain to be quick.
                </li>
                <li>
                    Writing workshops or bootcamps
                </li>
                <li>
                    Self-writing (journals, stories, etc.): take time for at least 10 minutes a day to write down what
                    you did
                    that day or how you were feeling. Doing this will help prepare you for writing about your personal
                    experiences!
                </li>
            </ul>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
