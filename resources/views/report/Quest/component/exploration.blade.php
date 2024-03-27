<div class="category">
    <div class="text-center mt-3 mb-4">
        <h5>Exploration</h5>
    </div>
    {{-- @if ($reports[1][1]) --}}
    <div class="onet">
        <p>
            Starting off with the exploration area, you took a profiler test called ONE*T which can help you
            discover
            the type of work activities and occupations that you might find exciting.
        </p>

        <p>
            <b>Based on your test</b> here were the result:
        </p>

        <ul>
            <b>
                <li>Realistic:</li>
                <li>Investigative:</li>
                <li>Artistic:</li>
                <li>Social:</li>
                <li>Enterprising:</li>
                <li>Conventional:</li>
            </b>
        </ul>

        <p>
            While this shows what you tend to gravitate towards, it shouldn’t limit you in exploring more about
            yourself!
        </p>

        <table class="table-detail">
            <tr>
                <th></th>
                <th>Realistic</th>
                <th>Investigative</th>
                <th>Artistic</th>
                <th>Social</th>
                <th>Enterprising</th>
                <th>Conventional</th>
            </tr>
            <tr>
                <td></td>
                <td>You are a practical and hands-on person who enjoys working with tools, machines, or physical
                    activities.</td>
                <td>You are an analytical and curious individual who enjoys solving problems through research and
                    intellectual pursuits.</td>
                <td>You are a creative and expressive person who enjoy using imagination and artistic skills</td>
                <td>You are a compassionate and people-oriented person who enjoy helping and interacting with others
                <td>You are an ambitious and persuasive individual who likes to lead and influence other people
                </td>
                <td>You are a detail-oriented and organized individual who likes to work with data, systems, and
                    established procedures
                </td>
            </tr>
            <tr>
                <td>
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
                <td>
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
                <td>
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
                <td>
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
                <td>
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


        {{-- <table border="0" class="table-detail">
            <tr>
                <td colspan="5" align="center">
                    <b>Realistic</b>
                    You are a practical and hands-on person who enjoys working with tools, machines, or physical
                    activities.
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    modest, pratical,
                    frank, mechanical
                </td>
                <td>
                    tradition, results,
                    practicality
                </td>
                <td>
                    fixing/repairing
                    things, building,
                    operating machines
                </td>
                <td>
                    engineering,
                    agriculture, sport
                    science
                </td>
                <td>
                    mechanic, carpenter,
                    electrician, engineer
                </td>
            </tr>
        </table>

        <table border="0" class="table-detail mt-3">
            <tr>
                <td colspan="5" align="center">
                    <b>Investigative</b>
                    You are an analytical and curious individual who enjoys solving problems through research and
                    intellectual pursuits.
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    analytical, independent, logical, scientific
                </td>
                <td>
                    knowledge, intellectual challenge
                </td>
                <td>
                    collecting data, experimenting, doing research
                </td>
                <td>
                    computer science, biology, physics, chemistry, mathematics, economics, philosophy
                </td>
                <td>
                    researcher, scientist, programmer, analyst, consultant
                </td>
            </tr>
        </table>

        <table border="0" class="table-detail mt-3">
            <tr>
                <td colspan="5" align="center">
                    <b>Artistic</b>
                    You are a creative and expressive person who enjoy using imagination and artistic skills
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    imaginative, intuitive, original
                </td>
                <td>
                    aesthetics, self-expression, creativity
                </td>
                <td>
                    designing, creating original work, expressing
                </td>
                <td>
                    fine arts, graphic design, performing arts, music
                </td>
                <td>
                    musician, designer, artist, writer, actor
                </td>
            </tr>
        </table>

        <table border="0" class="table-detail mt-3">
            <tr>
                <td colspan="5" align="center">
                    <b>Social</b>
                    You are a compassionate and people-oriented person who enjoy helping and interacting with others
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    helpful, sociable, supportive, empathic
                </td>
                <td>
                    helping others, cooperation, relationships
                </td>
                <td>
                    teaching / guiding, counseling, providing service
                </td>
                <td>
                    social work, psychology, medicine, education, hospitality
                </td>
                <td>
                    teacher, counselor, psychologist, doctor
                </td>
            </tr>
        </table>

        <table border="0" class="table-detail mt-3">
            <tr>
                <td colspan="5" align="center">
                    <b>Enterprising</b>
                    You are an ambitious and persuasive individual who likes to lead and influence other people
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    adventurous, energetic, assertive
                </td>
                <td>
                    achievement, power, recognition
                </td>
                <td>
                    leading / managing, selling, negotiating
                </td>
                <td>
                    law, business, communication, political science
                </td>
                <td>
                    manager, lawyer, chief executives, salesperson
                </td>
            </tr>
        </table>

        <table border="0" class="table-detail mt-3">
            <tr>
                <td colspan="5" align="center">
                    <b>Conventional</b>
                    You are a detail-oriented and organized individual who likes to work with data, systems, and
                    established procedures
                </td>
            </tr>
            <tr>
                <th>Personality</th>
                <th>Values</th>
                <th>Work Activity</th>
                <th>Potential Major</th>
                <th>Potential Career Path</th>
            </tr>
            <tr>
                <td>
                    careful, orderly, systematic
                </td>
                <td>
                    order, efficiency, accuracy
                </td>
                <td>
                    organizing, following procedure, filing or keeping records
                </td>
                <td>
                    accounting, information system, finance
                </td>
                <td>
                    accountant, financial analyst, actuary, banker, IT specialist
                </td>
            </tr>
        </table> --}}
    </div>
    {{-- @endif --}}

    @if ($reports[1][2])
        <div class="career-professionals mt-3">
            <p>
                Starting off with the exploration area, you were able to participate in a sharing session with a career
                professional!
            </p>

            <table class="table-detail">
                <tr>
                    <th>Hilda</th>
                    <td>
                        <p>
                            are Realistic Investigative, they focus on jobs surrounding working with tools, electrical
                            drawings,
                            machines, or plants and animals. Also like to study and solve math or science problems.
                        </p>

                        <p>
                            You might be interested in these professions: mechanic, carpenter, electrician, engineer,
                            researcher, scientist, programmer, analyst, consultant.
                        </p>

                        If you want to know more about careers with this specific personality type you can click below
                        <a
                            href="https://www.onetonline.org/explore/interests/Realistic/Investigative/">https://www.onetonline.org/explore/interests/Realistic/Investigative/</a>

                    </td>
                </tr>
                <tr>
                    <th>Dr Vanessa</th>
                    <td>
                        <p>
                            is Social Investigative, they focus on doing things to help people -- like, teaching,
                            nursing,
                            or
                            giving first aid, providing information; but also like to understand and solve science and
                            math
                            problems.
                        </p>

                        <p>
                            You might be interested in these professions: teacher, counselor, psychologist, doctor,
                            researcher,
                            scientist, programmer, analyst, consultant
                        </p>

                        If you want to know more about careers with this specific personality type you can click below
                        <a
                            href="https://www.onetonline.org/explore/interests/Investigative/Social/">https://www.onetonline.org/explore/interests/Investigative/Social/</a>
                    </td>
                </tr>
                <tr>
                    <th>Graphic Designer</th>
                    <td>
                        <p>
                            are Artistic, they focus on doing creative activities like art, drama, crafts, dance, music,
                            or
                            creative writing.
                        </p>

                        <p>
                            You might be interested in these professions: musician, designer, artist, writer, actor
                        </p>

                        If you want to know more about careers with this specific personality type you can click below
                        <a
                            href="https://www.onetonline.org/explore/interests/Artistic/">https://www.onetonline.org/explore/interests/Artistic/</a>

                    </td>
                </tr>
                <tr>
                    <th>Brenda Chia</th>
                    <td>
                        <p>
                            are Enterprising Conventional, they focus on leading and persuading people, and to sell
                            things
                            and
                            ideas, valuing success in business. They also prefer working with written records and
                            numbers in
                            a
                            systematic, orderly way.
                        </p>

                        <p>
                            You might be interested in these professions: accountant, financial analyst, actuary,
                            banker, IT
                            specialist, manager, lawyer, chief executives, or salesperson
                        </p>

                        If you want to know more about careers with this specific personality type you can click below
                        <a
                            href="https://www.onetonline.org/explore/interests/Enterprising/Conventional/">https://www.onetonline.org/explore/interests/Enterprising/Conventional/</a>
                    </td>
                </tr>
            </table>

            <p class="mt-2">
                To learn more about how these careers can correlate with your ONE*T profile, head over to <a
                    href="www.onetonline.org">www.onetonline.org</a>
                where you can find detailed explanations of a variety of professions..
            </p>

            <p>
                Hopefully, through sharing you can get a glimpse of what it’ll be like, and from that you can pinpoint
                the
                next step for your future.
            </p>


        </div>
    @endif


</div>
