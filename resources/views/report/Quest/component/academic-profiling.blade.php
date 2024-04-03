<div class="category">
    <div class="mt-4 mb-4">
        @if (
            $reports['checkListQuest']['Exploration'] &&
                $reports['checkListQuest']['Profile Building'] &&
                $reports['checkListQuest']['Academic Profiling']
        )
            <h5>C. Academic</h5>
        @elseif(
            (!$reports['checkListQuest']['Exploration'] && $reports['checkListQuest']['Profile Building']) ||
                ($reports['checkListQuest']['Exploration'] && !$reports['checkListQuest']['Profile Building']))
            <h5>B. Academic</h5>
        @elseif(!$reports['checkListQuest']['Exploration'] && !$reports['checkListQuest']['Profile Building'])
            <h5>A. Academic</h5>
        @endif
    </div>

    @if ($reports[3][1])
        <div class="standard-test">
            <p>
                <b>To get to know more on how to excel at your university admission process, you stopped at the academic
                    section,</b> here you took a short diagnostic test to see where you score on these standardized
                tests, please note that these are only a small part of the tests and do not reflect your full abilities.
            </p>

            <p>
                Here is some additional information on these tests that may prove helpful!
            </p>

            <div class="sat">
                <b>Scholastic Aptitude Test (SAT):</b>
                <p>
                    As you know the SAT test aims to measure a high school student's readiness for college through their
                    Mathematics, and Evidence-Based Reading and Writing (EBRW) abilities.
                </p>
                <p>
                    SAT scores are important to give a boost in your US application, therefore it’s crucial to prepare
                    ahead of time, taking notes when the test is held (as it is usually limited and only on specific
                    months) for this year specifically you can see the dates below!
                </p>

                <table class="table-detail text-center" style="margin-left: auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>March</td>
                            <td>Mar 9, 2024</td>
                        </tr>
                        <tr>
                            <td>May</td>
                            <td>May 4, 2024</td>
                        </tr>
                        <tr>
                            <td>June</td>
                            <td>June 1, 2024</td>
                        </tr>
                        <tr>
                            <td>August</td>
                            <td>August 24, 2024</td>
                        </tr>
                        <tr>
                            <td>October</td>
                            <td>October 5, 2024</td>
                        </tr>
                        <tr>
                            <td>November</td>
                            <td>November 2, 2024</td>
                        </tr>
                        <tr>
                            <td>December</td>
                            <td>December 7, 2024</td>
                        </tr>
                    </tbody>
                </table>

                <p class="mt-3">
                    Students also receive an SAT percentile ranking, from 1 to 99. The SAT percentile will let you know
                    how well you did compared to other people taking the SAT. If your percentile is 90, you scored
                    higher than 90% of students who took the SAT that year.
                </p>

                <table class="table-detail text-center" style="margin-left: auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Score</th>
                            <th>Percentile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1600</td>
                            <td><b>Top Score</b></td>
                        </tr>
                        <tr>
                            <td>1520</td>
                            <td>99th</td>
                        </tr>
                        <tr>
                            <td>1350</td>
                            <td>90th</td>
                        </tr>
                        <tr>
                            <td>1210</td>
                            <td>75th</td>
                        </tr>
                    </tbody>
                </table>

                <p class="mt-3">
                    However at the end of the day, the SAT score you need is determined by the college you want to
                    attend, so be sure to double check!
                </p>
            </div>

            <div class="ielts-toefl">
                <b>International English Language Testing System (IELTS) & Test of English as a Foreign Language
                    (TOEFL):</b>
                <p>
                    As you may know, both the IELTS and TOEFL test are used to measure the English language ability of
                    non-native speakers wishing to enroll in English-speaking universities.
                </p>
                <p>
                    Both have a similar structure of <u><b>Reading, Listening, Writing, Speaking,</b></u> but the
                    content
                    and scoring
                    still differs. Therefore don’t forget to study the structure and tips and tricks to excel at the
                    test!
                </p>

                <ul class="list-lower-latin">
                    <li>
                        <p>
                            For TOEFL you can access there resources and register for the official test at
                            <a
                                href="https://www.ets.org/toefl/test-takers/ibt/about.html">https://www.ets.org/toefl/test-takers/ibt/about.html</a>
                        </p>
                        <p>
                            For both Australian and Asian universities (Japan, Singapore, HK) the usual minimum required
                            score is 90 points out of 4 sections (each not getting less than 20 points).
                        </p>
                    </li>
                    <li>
                        While for IELTS, applying for the official test has to be done through external agents. In
                        Indonesia the 3 main agents that have centers in every city are:
                        <ul>
                            <li>
                                IDP:
                                <a
                                    href="https://ielts.idp.com/indonesia/test-dates">https://ielts.idp.com/indonesia/test-dates</a>
                            </li>
                            <li>
                                IALF:
                                <a
                                    href="https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/">https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/</a>
                            </li>
                            <li>
                                The British Council:
                                <a
                                    href="https://www.britishcouncilfoundation.id/en/exam/ielts">https://www.britishcouncilfoundation.id/en/exam/ielts</a>
                                <p>
                                    For both Australian and Asian universities (Japan, Singapore, HK) the minimum
                                    required score is 6.5, out of 4 sections (each not getting less than 6).
                                </p>
                                <p>
                                    Be careful when choosing whether you want to take the computer or paper-based test!
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>

                <p>
                    Here is a detailed view of the scores!
                </p>

                <table class="table-detail text-center" style="margin-left: auto; margin-right:auto">
                    <tr>
                        <th colspan="2" class="bckg-color-table">TOEFL</th>
                        <th colspan="2" class="bckg-color-table-ylw">IELTS</th>
                    </tr>
                    <tr>
                        <th class="bckg-color-table">Section</th>
                        <th class="bckg-color-table">Highest Score</th>
                        <th class="bckg-color-table-ylw">Section</th>
                        <th class="bckg-color-table-ylw">Highest Score</th>
                    </tr>
                    <tr>
                        <td>Reading</td>
                        <td>30</td>
                        <td>Reading</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>Listening</td>
                        <td>30</td>
                        <td>Listening</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>Writing</td>
                        <td>30</td>
                        <td>Writing</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>Speaking</td>
                        <td>30</td>
                        <td>Speaking</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>120</b></td>
                        <td><b>Total</b></td>
                        <td><b>Average of 4 section = 9</b></td>
                    </tr>
                </table>


                <p class="mt-3">
                    Be careful when choosing whether you want to take the computer or paper-based test!
                </p>
            </div>
        </div>
    @endif

    @if ($reports[3][2])
        <div class="subject-selection">
            <p>
                <b>To get to know more on how to excel at your university admission process, you stopped at the academic
                    section,</b> you consulted with our head of tutoring and came up with your own results as follows!
            </p>

            <p><b>Your Answer: <u>{{ $reports[3]['subject_selection'] }}</u></b></p>

            <P>
                As you know, universities from the UK, Australia, and even from Asian countries take academic scores
                very seriously. This doesn’t mean they will only look at how high your scores are, <b>but also the
                    subjects
                    you
                    select.</b>
            </P>

            <p>
                <b>So what is the next step?</b>
            </p>

            <ol>
                <li>
                    <p>
                        First, make sure what major grouping you want, it doesn’t have to be specific, but knowing in
                        general what you are aiming for will definitely help!
                    </p>
                    <p>
                        For example, you want to do something related to Biology. However, you don’t know what
                        specialization you want to take later on such as biomedicine, biotechnology, etc. From there you
                        can just pick, in general, Biology or opt for Science first. Don’t worry, these are only for
                        research purposes.
                    </p>
                </li>
                <li>
                    <p>
                        From there take time to check the academic entry requirements for that major on the official
                        university website. If you still feel confused, email an admission officer to get more
                        information.
                        Better safe than sorry!
                    </p>
                </li>
                <li>
                    Be very careful as some universities are very strict and detailed with the subjects they ask for,
                    such as for the IBDP curriculum asking if the applicant took Higher Level (HL) or Standard Level
                    (SL) from their subjects,
                    <br>
                    <br>
                    <p>
                        Excerpt:
                        <br>
                        <b>
                            Prerequisites
                        </b>
                        <br>
                    <div style="font-size: 10px; !important">
                        These are the subjects (with minimum scores) you must have completed to be eligible for entry to
                        this course.
                    </div>
                    </p>

                    <table class="mb-2">
                        <td style="border-left: 2px solid #467ecc; padding-left: 10px">
                            <b>A minimum grade of 4 in either Applications and interpretations HL, Analysis and
                                approaches
                                SL, or Analysis and approaches HL. A minimum grade of 4 in one of Biology, Chemistry or
                                Physics at HL or SL.</b>
                            <i>
                                For students with English as their second language a pass in
                                English B
                                at the required level will be accepted as satisfying the English prerequisite. Except
                                where
                                specified, IB subjects must be passed to at least Grade 4 Standard or Higher Level.
                                Mathematical Studies is not deemed equivalent to VCE Mathematical Methods.
                            </i>
                        </td>
                    </table>

                    <p>
                        Or with the Cambridge curriculum asking if they took A levels or AS levels.
                    </p>

                    <p>
                        Excerpt:
                        <br>
                        <b>
                            Prerequisites
                        </b>
                        <br>
                    <div style="font-size: 10px; !important">
                        These are the subjects (with minimum scores) you must have completed to be eligible for entry to
                        this course.
                    </div>
                    </p>

                    <table class="mb-2">
                        <td style="border-left: 2px solid #467ecc; padding-left: 10px">
                            <b>Mathematics, one of Biology, Chemistry and Physics, and an approved A or AS Level English
                                subject; or Both Mathematics and Further Mathematics, and an approved A or AS Level
                                English subject.</b>
                            <i>
                                A minimum of three A Levels is required and a grade of at least C is required in
                                prerequisite subjects unless otherwise specified. Approved GCE AS and A Level English
                                subjects are: General Paper, General Studies, English Language and Literature, English
                                Literature, English Language. Singapore A Level subject Knowledge and Enquiry (H2) is
                                also accepted. A grade of at least C is required to meet the University's English
                                language requirements.
                            </i>
                        </td>
                    </table>
                </li>
                <li>
                    <p>
                        Once that is done, be sure to also consult with your parents or counselor to see which is the
                        best fit for your abilities and dreams.
                    </p>
                </li>
                <li>
                    <p>
                        With this you are now prepared from the beginning, and with the correct subjects it’s all about
                        focusing on getting that great score. From there it’ll be smooth sailing!
                    </p>
                </li>
            </ol>

        </div>
    @endif



</div>
