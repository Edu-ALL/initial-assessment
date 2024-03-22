<div class="category">
    <div class="text-center mt-3 mb-4">
        <h5>Profile Building</h5>
    </div>

    @if ($reports[2]['is_surpass'])
        <div class="surpass">
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
                Another tip is don’t forget to always document all your activities and keep the files organized as they
                will
                be asked for admission.
            </p>
        </div>
    @else
        <div class="improvement">
            @if ($reports[2][1])
                <div class="competition">
                    <p>
                        Participating in competitions showcases your ambition and drive to excel in a specific area. It
                        helps
                        develop your skills under pressure and can highlight your achievements on a national or
                        international
                        level.
                    </p>

                    <p>
                        Note that there are a wide variety of competitions which are not limited to just academic
                        subjects
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
            @endif

            {{-- Internship --}}
            @if ($reports[2][2])
                <div class="internship">
                    <p>
                        Internships provide hands-on experience in your field of interest, allowing you to apply
                        academic
                        knowledge in real-world settings. They are crucial for understanding workplace dynamics,
                        building
                        professional networks, and enhancing your resume with practical experience.
                    </p>

                    <p>
                        Remember! The point of an internship is to expose you to a professional setting. Thus whether
                        the
                        size
                        of the company and the amount of time done is small it will still be beneficial for you!
                    </p>
                </div>
            @endif

            {{-- Volunteering --}}
            @if ($reports[2][3])
                <div class="volunteering">
                    <p>
                        Volunteering demonstrates your commitment to community service and social responsibility. It
                        helps
                        develop empathy, teamwork, and leadership skills while contributing positively to society. It
                        also
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
            @endif

            {{-- School Clubs --}}
            @if ($reports[2][4])
                <div class="school-clubs">
                    <p>
                        Involvement in school clubs indicates your ability to balance academic and extracurricular
                        activities. It's an opportunity to pursue interests outside of the traditional curriculum.
                    </p>
                    <p>
                        In some schools, you can create your own club if there are enough people interested in joining!
                        Through these school clubs, you can also initiate external activities which show your commitment
                        to
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
            @endif


            {{-- Out of school --}}
            @if ($reports[2][5])
                <div class="out-of-school">
                    <p>
                        Engaging in out-of-school activities showcases your initiative to seek personal growth
                        opportunities
                        beyond the classroom. It reflects a well-rounded character, time management skills, and the
                        ability
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
            @endif


            {{-- summer/winter --}}
            @if ($reports[2][6])
                <div class="summer">
                    <p>
                        Participating in summer or winter educational programs demonstrates your eagerness to use breaks
                        productively for further learning. These programs can offer intensive learning experiences,
                        exposure
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
            @endif


            {{-- Personal project --}}
            @if ($reports[2][7])
                <div class="personal-project">
                    <p>
                        Undertaking personal projects shows self-motivation and the ability to work independently. It's
                        a
                        chance to explore interests deeply, solve problems creatively, and potentially innovate or
                        create
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
            @endif


            {{-- Research project --}}
            @if ($reports[2][8])
                <div class="research-project">
                    <p>
                        Engaging in research projects, especially those that lead to publication or presentation,
                        underscores your commitment to academic inquiry and contribution to your field of study. It
                        develops
                        critical thinking, and analytical skills, and can significantly enhance your academic profile.
                    </p>
                    <p>
                        Remember, research doesn’t always have to be scientific! It can encompass various subjects, all
                        you
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
            @endif

        </div>
    @endif

</div>
