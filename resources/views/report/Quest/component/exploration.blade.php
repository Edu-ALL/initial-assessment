<div class="category">
    @if ($reports[1][1])
        <div class="onet">
            <p>
                Starting off with the exploration area, you took a profiler test called ONE*T which can help you
                discover the type of work activities and occupations that you might find exciting.
            </p>

            <p>
                <b>Based on your test</b> here were the result:
            </p>

            <ul class="mb-3">
                <b>
                    @if (isset($reports[1]['onet']))
                        @foreach ($reports[1]['onet'] as $onets)
                            @foreach ($onets as $key => $onet)
                                <li>{{ $key }}: {!! $onet !!} </li>
                            @endforeach
                        @endforeach
                    @endif
                    {{-- <li>Realistic: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][0]['Realistic'] : null }}</li>
                    <li>Investigative: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][0]['Investigative'] : null }}
                    </li>
                    <li>Artistic: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][0]['Artistic'] : null }}</li>
                    <li>Social: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][0]['Social'] : null }}</li>
                    <li>Enterprising: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][0]['Enterprising'] : null }}
                    </li>
                    <li>Conventional: {{ isset($reports[1]['onet']) ? $reports[1]['onet'][5]['Conventional'] : null }}
                    </li> --}}
                </b>
            </ul>

            <p>
                <b>
                    Your most dominant personality type is
                    @php
                        $i = 0;
                    @endphp
                    @if (isset($reports[1]['onet']))
                        @foreach ($reports[1]['onet'] as $onets)
                            @foreach ($onets as $key => $onet)
                                @if ($i < 3)
                                    {{ $key }}
                                    @switch($i)
                                        @case(0)
                                            ,
                                        @break

                                        @case(1)
                                            , and
                                        @break
                                    @endswitch
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @endforeach
                    @endif
                </b>
            </p>

            <p>
                While this shows what you tend to gravitate towards, it shouldn’t limit you in exploring more about
                yourself!
            </p>

            <table class="table-detail">
                <tr>
                    <th></th>
                    <th class="bckg-color-table">Realistic</th>
                    <th class="bckg-color-table">Investigative</th>
                    <th class="bckg-color-table">Artistic</th>
                    <th class="bckg-color-table">Social</th>
                    <th class="bckg-color-table">Enterprising</th>
                    <th class="bckg-color-table">Conventional</th>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">Profile</td>
                    <td>You are a practical and hands-on person who enjoys working with tools, machines, or physical
                        activities.</td>
                    <td>You are an analytical and curious individual who enjoys solving problems through research and
                        intellectual pursuits.</td>
                    <td>You are a creative and expressive person who enjoy using imagination and artistic skills</td>
                    <td>You are a compassionate and people-oriented person who enjoy helping and interacting with others
                    </td>
                    <td>You are an ambitious and persuasive individual who likes to lead and influence other people
                    </td>
                    <td>You are a detail-oriented and organized individual who likes to work with data, systems, and
                        established procedures
                    </td>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">
                        Personality
                    </td>
                    <td>
                        modest, pratical, frank, mechanical
                    </td>
                    <td>
                        analytical, independent, logical, scientific
                    </td>
                    <td>
                        imaginative, intuitive, original
                    </td>
                    <td>
                        helpful, sociable, supportive, empathic
                    </td>
                    <td>
                        adventurous, energetic, assertive
                    </td>
                    <td>
                        careful, orderly, systematic
                    </td>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">
                        Values
                    </td>
                    <td>
                        tradition, results, practicality
                    </td>
                    <td>
                        knowledge, intellectual challenge
                    </td>
                    <td>
                        aesthetics, self-expression, creativity
                    </td>
                    <td>
                        helping others, cooperation, relationships
                    </td>
                    <td>
                        achievement, power, recognition
                    </td>
                    <td>
                        order, efficiency, accuracy
                    </td>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">
                        Work Activity
                    </td>
                    <td>
                        fixing/repairing things, building, operating machines
                    </td>
                    <td>
                        collecting data, experimenting, doing research
                    </td>
                    <td>
                        designing, creating original work, expressing
                    </td>
                    <td>
                        teaching / guiding, counseling, providing service
                    </td>
                    <td>
                        leading / managing, selling, negotiating
                    </td>
                    <td>
                        organizing, following procedure, filing or keeping records
                    </td>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">
                        Potential major
                    </td>
                    <td>
                        engineering, agriculture, sport science
                    </td>
                    <td>
                        computer science, biology, physics, chemistry, mathematics,
                        economics, philosophy
                    </td>
                    <td>
                        fine arts, graphic design, performing arts, music
                    </td>
                    <td>
                        social work, psychology, medicine, education, hospitality
                    </td>
                    <td>
                        law, business, communication, political science
                    </td>
                    <td>
                        accounting, information system, finance
                    </td>
                </tr>
                <tr>
                    <td class="bckg-color-table fw-bold">
                        Potential career path
                    </td>
                    <td>
                        mechanic, carpenter, electrician, engineer
                    </td>
                    <td>
                        researcher, scientist, programmer, analyst, consultant
                    </td>
                    <td>
                        musician, designer, artist, writer, actor
                    </td>
                    <td>
                        teacher, counselor, psychologist, doctor
                    </td>
                    <td>
                        manager, lawyer, chief executives, salesperson
                    </td>
                    <td>
                        accountant, financial analyst, actuary, banker, IT specialist
                    </td>
                </tr>
            </table>

        </div>
    @endif

    @if ($reports[1][2])
        <div class="career-professionals mt-3">
            <p>
                Based on the professional you picked, you can see what profile their careers are in and what you might
                be interested in the future.
            </p>

            <table class="table-detail">
                <tr>
                    <th class="bckg-color-table fw-bold">Hilda</th>
                    <td>
                        <p>
                            Hilda is the Head Of Research And Development at Java Fresh (PT Nusantara Segar Global).
                        </p>

                        <p>
                            <u>Her occupational code is Realistic Investigative</u>. They focus on jobs surrounding
                            working
                            with tools, electrical drawings, machines, or plants and animals. They also like to study
                            and solve math or science problems.
                        </p>

                        <p>
                            <b>You might be interested in these professions:</b> mechanic, carpenter, electrician,
                            engineer, researcher, scientist, programmer, analyst, consultant.
                        </p>
                        <p>
                            If you want to know more about careers with this specific personality type you can click
                            below
                            <a
                                href="https://www.onetonline.org/explore/interests/Realistic/Investigative/">https://www.onetonline.org/explore/interests/Realistic/Investigative/</a>
                        </p>

                    </td>
                </tr>
                <tr>
                    <th class="bckg-color-table fw-bold">Dr Angelina Vanessa</th>
                    <td>
                        <p>Dr Vanessa is the head of Revociety.</p>
                        <p>
                            <u>Her occupational code is Social Investigative</u>. They focus on doing things to help
                            people --
                            like teaching, nursing, or giving first aid, providing information; but also like to
                            understand and solve science and math problems.
                        </p>

                        <p>
                            <b>You might be interested in these professions:</b> teacher, counselor, psychologist,
                            doctor,
                            researcher, scientist, programmer, analyst, consultant.
                        </p>

                        <p>
                            If you want to know more about careers with this specific personality type you can click
                            below
                            <a
                                href="https://www.onetonline.org/explore/interests/Investigative/Social/">https://www.onetonline.org/explore/interests/Investigative/Social/</a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th class="bckg-color-table fw-bold">Renardi Oetomo</th>
                    <td>
                        <p>
                            Renardi Oetomo is a graphic designer at Shopee.
                        </p>
                        <p>
                            <u>Her occupational code is Artistic</u>. They focus on doing creative activities like art,
                            drama,
                            crafts, dance, music, or creative writing.
                        </p>

                        <p>
                            <b>You might be interested in these professions:</b> musician, designer, artist, writer,
                            actor.
                        </p>

                        <p>
                            If you want to know more about careers with this specific personality type you can click
                            below
                            <a
                                href="https://www.onetonline.org/explore/interests/Artistic/">https://www.onetonline.org/explore/interests/Artistic/</a>
                        </p>

                    </td>
                </tr>
                <tr>
                    <th class="bckg-color-table fw-bold">Brenda Chia</th>
                    <td>
                        <p>
                            Brenda Chia is the CEO of PT X.
                        </p>
                        <p>
                            Her occupational code is <u>Enterprising Conventional</u>. They focus on leading and
                            persuading
                            people, and to sell things and ideas, valuing success in business. They also prefer working
                            with written records and numbers in a systematic, orderly way.
                        </p>

                        <p>
                            <b>You might be interested in these professions:</b> accountant, financial analyst, actuary,
                            banker, IT specialist, manager, lawyer, chief executives, or salesperson
                        </p>

                        <p>
                            If you want to know more about careers with this specific personality type you can click
                            below
                            <a
                                href="https://www.onetonline.org/explore/interests/Enterprising/Conventional/">https://www.onetonline.org/explore/interests/Enterprising/Conventional/</a>
                        </p>
                    </td>
                </tr>
            </table>

            <p class="mt-2">
                To learn more about how these careers can correlate with your ONE*T profile, head over to <a
                    href="www.onetonline.org">www.onetonline.org</a>
                where you can find detailed explanations of a variety of professions..
            </p>

            <p>
                Hopefully, through sharing you can get a glimpse of what it’ll be like, and from that you can
                pinpoint
                the
                next step for your future.
            </p>


        </div>
    @endif


</div>
