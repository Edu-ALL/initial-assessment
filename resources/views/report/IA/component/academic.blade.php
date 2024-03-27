<div class="category">
    <div class="text-center mb-4">
        <h5>Academic</h5>
    </div>

    @if ($reports[3]['is_surpass'])
        <div class="surpass">
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
    @else
        <div class="improvement">
            <p>
                While many aspects such as your activities and writing abilities are taken into account, having a decent
                score serves as the first pinpoint an admission officer would look at, therefore let’s aim to achieve
                the
                best!
            </p>

            {{-- Improvement by question --}}

            {{-- Standardized Tests --}}
            @if ($reports[3][1])
                <div class="standardized-tests">
                    <div class="sat">
                        <b>SAT:</b>
                        <p>
                            The SAT test aims to measure a high school student's readiness for college through their
                            English
                            and
                            math abilities. It is usually aimed at students who are applying to the US but it can still
                            be
                            beneficial as a plus point if you plan to go to the UK, Australia, or Japan.
                        </p>

                        <p>
                            To find complete info on the SAT test from registration procedures, and content curriculum
                            of
                            the
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
                            <a
                                href="https://www.khanacademy.org/digital-sat">https://www.khanacademy.org/digital-sat.</a>
                        </p>

                        <p>
                            Be sure to check it out!
                        </p>
                    </div>

                    <div class="ielts-toefl">
                        <b>IELTS & TOEFL:</b>
                        <p>
                            As you may know, both the IELTS and TOEFL test are used to measure the English language
                            ability
                            of
                            non-native speakers wishing to enroll in English-speaking universities.
                        </p>
                        <p>
                            If your school implements the IBDP curriculum, usually it won’t be necessary, however, if
                            you
                            are
                            from a
                            school that uses the Cambridge or national Indonesian curriculum it is mainly mandatory.
                        </p>
                        <p>
                            Both have a similar structure of <b>Reading, Listening, Writing, Speaking,</b> but the
                            content
                            and
                            scoring still differ. Therefore don’t forget to study the structure and tips and tricks to
                            excel
                            at
                            the
                            test!
                        </p>
                        <p>
                            For TOEFL you can access their resources and register for the official test at
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
                        <tr>
                            <th>Score</th>
                            <th>Information</th>
                        </tr>
                        <tr>
                            <td>
                                <p>Score IB: < 30 </p>
                                        <p>
                                            Score Cambridge: Hanya ada C kebawah
                                        </p>
                                        Score Kurnas: < 70 </td>
                            <td>
                                <p>
                                    With this score, there is a slight probability you can be accepted in some
                                    low-competitive universities (taking into account other aspects like your profile
                                    and essays are exceptional).
                                </p>
                                <p>
                                    However, it’s time to also be realistic and search for alternative options!
                                </p>
                                <p>
                                    Other choices that you can do is going to community college, doing a gap year, or
                                    taking foundation classes first before continuing on to university.
                                </p>
                                <p>
                                    Don’t worry! There are many benefits to this, not only are class sizes much smaller
                                    and the schedule is more flexible, but by doing this you will actually be more
                                    prepared for entering university later on.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Score IB: 30 - 35 </p>
                                <p>
                                    Score Cambridge: Ada B and C (jadi BBC, ABC)
                                </p>
                                Score Kurnas: 70-85
                            </td>
                            <td>
                                <p>
                                    The score you have received is fairly decent and above average. With this score, it
                                    will be easier to apply for admission to normal universities/ colleges.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Score IB: 34,5 </p>
                                <p>
                                    Score Cambridge: BBB
                                </p>
                                Score Kurnas: < 85 </td>
                            <td>
                                <p>
                                    This is already considered a good score. It shows that you have worked hard to pass
                                    the IBDP or A-Level and you are an intelligent person. Although it is not a top-type
                                    result, you are still considered in the top 30% of all who completed the program.
                                    Keep on striving to maintain and improve these scores!
                                </p>
                            </td>
                        </tr>
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
