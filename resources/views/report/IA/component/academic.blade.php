<div class="category">
    <div class="mt-4 mb-4">
        <h5>C. Academic</h5>
    </div>

    @if ($reports[3]['is_surpass'])
        <div class="surpass">
            <p>
                Keep up the exceptional work! Having a good score is a great start to being noticed by university
                admission officers, as it shows your dedication to studying hard and lets them know you are serious
                about your academics and will continue to do so when you sit in university!
            </p>
            <p>
                Continue to maintain that score, especially if you are aiming to go to UK and Asian universities, as
                they put more focus on your academic score as they are usually the main requirements in getting
                accepted. They do not only look at your final score but also at the required subjects that are related
                to the major that you are applying to (HL subject in IBDP and A-Level subject in Cambridge A-Level).
            </p>
            <p>
                If you haven’t taken any standardized tests, do so. They can sometimes be considered as a “bonus” score
                which can definitely help boost your profile. Having these tests on hand is also helpful if you are
                planning to apply to various countries.
            </p>
        </div>
    @else
        <div class="improvement">
            <p>
                While many aspects such as your activities and writing abilities are taken into account, having a decent
                score serves as the first pinpoint an admission officer would look at. Therefore, let’s aim to achieve
                the best!
            </p>

            {{-- Improvement by question --}}

            {{-- Standardized Tests --}}
            @if ($reports[3][1])
                <div class="standardized-tests">
                    <div class="sat">
                        <b>SAT:</b>
                        <p>
                            The SAT aims to measure a high school student's readiness for college through their English
                            and math abilities. It is usually aimed at students who are applying to the US but it can
                            still be beneficial as a plus point if you plan to go to the UK, Australia, or Japan.
                        </p>

                        <p>
                            To find complete info on the SAT from registration procedures, and content curriculum of the
                            test, everything can be accessed at
                            <a href="https://satsuite.collegeboard.org/sat">https://satsuite.collegeboard.org/sat</a>
                        </p>

                        <p>
                            In addition, you can also find official simulations of the test at
                            <a href="https://bluebook.collegeboard.org/">https://bluebook.collegeboard.org/.</a>
                        </p>

                        <p>
                            Another website that provides a comprehensive study guide is
                            <a
                                href="https://www.khanacademy.org/digital-sat">https://www.khanacademy.org/digital-sat.</a>
                        </p>

                        <p>
                            Be sure to check these resources out!
                        </p>
                    </div>

                    <div class="ielts-toefl">
                        <b>IELTS & TOEFL:</b>
                        <p>
                            As you may know, both the IELTS and TOEFL tests are used to measure the English language
                            ability of non-native speakers wishing to enroll in English-speaking universities.
                        </p>
                        <p>
                            Both have a similar structure of <b>Reading, Listening, Writing, and Speaking</b> sections,
                            but the
                            content and scoring still differ. Therefore, don’t forget to study the structure and tips
                            and tricks to excel at the test!
                        </p>
                        <p>
                            For TOEFL, you can access their resources and register for the official test at
                            <a
                                href="https://www.ets.org/toefl/test-takers/ibt/about.html">https://www.ets.org/toefl/test-takers/ibt/about.html</a>
                        </p>
                        <p>
                            While for IELTS, applying for the official test has to be done through external agents. In
                            Indonesia,
                            the 3
                            main agents that have centers in every city are
                            IDP:
                            <a
                                href="https://ielts.idp.com/indonesia/test-dates">https://ielts.idp.com/indonesia/test-dates</a>
                            IALF:
                            <a
                                href="https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/">https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/</a>

                            The British Council:
                            <a
                                href="https://www.britishcouncilfoundation.id/en/exam/ielts">https://www.britishcouncilfoundation.id/en/exam/ielts</a>

                        </p>

                        <p>
                            Be careful when choosing whether you want to take the computer or paper-based test!
                        </p>
                    </div>
                </div>
            @endif



            {{-- Based on score --}}
            @if ($reports[3][2])
                <div class="based-on-score">
                    <table class="table-detail">
                        <thead>
                            <tr class="text-center">
                                <th colspan="3">Score</th>
                                <th rowspan="2">Information</th>
                            </tr>
                            <tr class="text-center">
                                <th width="50px">IB</th>
                                <th>Cambridge</th>
                                <th>Kurikulum National</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    &lt;30 </td>
                                <td class="text-center">
                                    Scores with only a C and under:
                                    <br>
                                    <br>
                                    CCC
                                    DDD

                                </td>
                                <td class="text-center">
                                    &lt;70 </td>
                                <td>
                                    <p>
                                        With this score, there is a slight probability you can be accepted in some
                                        low-competitive
                                        universities (taking into account other aspects like your profile and essays are
                                        exceptional).
                                    </p>
                                    <p>
                                        However, it’s time to also be realistic and search for alternative options!
                                    </p>
                                    <p>
                                        Other choices that you can make are going to community college, doing a gap
                                        year, or
                                        taking
                                        foundation classes first before continuing to university.
                                    </p>

                                    Don’t worry! There are many benefits to this, not only are class sizes much smaller
                                    and the
                                    schedule is more flexible, but by doing this you will actually be more prepared for
                                    entering
                                    university later on.
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    30-33 </td>
                                <td class="text-center">
                                    Scores with a mixture of B and C in it:
                                    <br>
                                    <br>
                                    BBC
                                    BCC

                                </td>
                                <td class="text-center">
                                    70-85 </td>
                                <td>
                                    The score you have received is fairly decent and above average. With this score, it
                                    will be
                                    easier to apply for admission to normal universities/ colleges.
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    34,35 </td>
                                <td class="text-center">
                                    Scores that only consist of B:
                                    <br>
                                    <br>
                                    BBB

                                </td>
                                <td class="text-center">
                                    &lt;85 </td>
                                <td>
                                    This is already considered a good score. It shows that you have worked hard to pass
                                    the IBDP
                                    or
                                    A-Level and you are an intelligent person. Although it is not a top result, you are
                                    still
                                    considered in the top 30% of all who completed the program. Keep on striving to
                                    maintain and
                                    improve these scores!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- additional tips --}}
            <div class="additional-tips mt-3">
                <ul class="list-lower-latin">
                    Some additional tips:
                    <li>
                        If you are not yet in your final year of school, make sure to earnestly work on improving or
                        maintaining your grades and to obtain or maintain a ranking (if your school has a ranking
                        system).
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
    @endif

</div>
