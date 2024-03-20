<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $reports[1] =
            [
                'id' => 1,
                'category_id' => 1,
                'surpass' => "<p>\n" .
                    "            It seems you are set on what you want for your future:\n" .
                    "        </p>\n" .
                    "\n" .
                    "        <table>\n" .
                    "            <tr>\n" .
                    "                <th></th>\n" .
                    "                <th></th>\n" .
                    "            </tr>\n" .
                    "            <tr>\n" .
                    "                <td>Major</td>\n" .
                    "                <td>: ...</td>\n" .
                    "            </tr>\n" .
                    "            <tr>\n" .
                    "                <td>Country</td>\n" .
                    "                <td>: ...</td>\n" .
                    "            </tr>\n" .
                    "            <tr>\n" .
                    "                <td>University</td>\n" .
                    "                <td>: ...</td>\n" .
                    "            </tr>\n" .
                    "        </table>\n" .
                    "\n" .
                    "        <p class=\"mt-2\">\n" .
                    "            That’s great! Knowing what and where you want to study, aligning them with your goals, and implementing them\n" .
                    "            through a comprehensive daily schedule will definitely help ease you in the university admissions process.\n" .
                    "        </p>\n" .
                    "\n" .
                    "        <p class=\"mt-2\">\n" .
                    "            The next step that you could do:\n" .
                    "        <ol>\n" .
                    "            <li>Start working on your profile branding by crafting a comprehensive portrayal of yourself that highlights\n" .
                    "                your academic achievements, extracurricular activities, skills, experiences, and personal qualities.\n" .
                    "            </li>\n" .
                    "            <li>Delve deeper and investigate potential career paths, fields of study, and hobbies that align with your\n" .
                    "                interests. This can involve reading articles, watching documentaries, attending workshops or seminars,\n" .
                    "                and talking to professionals in various fields.</li>\n" .
                    "            <li>Be extra prepared by making curated university lists, that are realistic and tiered based on your\n" .
                    "                ability, for example:\n" .
                    "                <ul class=\"list-lower-latin\">\n" .
                    "                    <li>\n" .
                    "                        Reach: Ivy leagues, university with low acceptance rates.\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Target: The universities where your academic credentials fall well within the school's average\n" .
                    "                        acceptance rates.\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Safety: Back-up universities that you know you will be accepted into, high acceptance rates.\n" .
                    "                    </li>\n" .
                    "                </ul>\n" .
                    "            </li>\n" .
                    "        </ol>\n" .
                    "        </p>",
                'heading_improvement' => "<p>\n" .
                    "            You have done some explorations while building up your profile but for sure there is so much more\n" .
                    "            that you can and should do to maximize the exploration journey.\n" .
                    "        </p>",
            ];


        $reports[2] =
            [
                'id' => 2,
                'category_id' => 2,
                'surpass' => " <p>\n" .
                    "            The amount of activities you have is great! Yet, imagine the endless possibilities if you were to enrich\n" .
                    "            your profile even further.\n" .
                    "        </p>\n" .
                    "\n" .
                    "        <ul>\n" .
                    "            When the opportunity strikes, continue by doing more of these activities:\n" .
                    "            <li>\n" .
                    "                Competitions\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                Internships\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                Volunteering\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                School Clubs\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                Out-of-school\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                Summer/winter programs\n" .
                    "            </li>\n" .
                    "        </ul>\n" .
                    "\n" .
                    "        <ol>\n" .
                    "            Some tips to make your profile more robust:\n" .
                    "            <li>\n" .
                    "                Increasing activities that align with the major you want to pursue later on.\n" .
                    "            </li>\n" .
                    "            <li>\n" .
                    "                Initiate a project that has benefits for those around you, such as:\n" .
                    "                <ul class=\"list-lower-latin\">\n" .
                    "                    <li>\n" .
                    "                        Community/organization\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Campaign on issues that weigh on your mind\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Projects solving problems around you through science and social sciences\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Innovation of tools that can facilitate human activities\n" .
                    "                    </li>\n" .
                    "                    <li>\n" .
                    "                        Artistic innovation\n" .
                    "                    </li>\n" .
                    "                </ul>\n" .
                    "            </li>\n" .
                    "        </ol>\n" .
                    "\n" .
                    "        <p>\n" .
                    "            Another tip is don’t forget to always document all your activities and keep the files organized as they will\n" .
                    "            be asked for admission.\n" .
                    "        </p>",
                'heading_improvement' => "<p>\n" .
                    "            It seems you haven’t spent time building your profile. Let’s list down what activities you can do to\n" .
                    "            boost your profile.\n" .
                    "        </p>"
            ];

        $reports[3] =
            [
                'id' => 3,
                'category_id' => 3,
                'surpass' => "<p>\n" .
                    "            Keep up the exceptional work! Having a good score is a great start to being noticed by university\n" .
                    "            admission officers, it shows your dedication to studying hard and lets them know you are serious about\n" .
                    "            your academics and will definitely be when you sit in university!\n" .
                    "        </p>\n" .
                    "        <p>\n" .
                    "            Continue to maintain that score, especially if you are aiming to go to UK and Asian universities, they\n" .
                    "            put more focus on your academic score as they are usually the main requirements in getting accepted; not\n" .
                    "            only your final score, but also required subjects that are related to the major that you apply to (HL\n" .
                    "            subject in IBDP and A-Level subject in Cambridge A-Level.\n" .
                    "        </p>\n" .
                    "        <p>\n" .
                    "            If you haven’t taken any standardized tests, please do so. They can sometimes be considered as a “bonus”\n" .
                    "            score which can definitely help boost your profile. Having these tests on hand is also helpful if you\n" .
                    "            are planning to apply to various countries.\n" .
                    "        </p>",
                'heading_improvement' => "<p>\n" .
                    "            While many aspects such as your activities and writing abilities are taken into account, having a decent\n" .
                    "            score serves as the first pinpoint an admission officer would look at, therefore let’s aim to achieve the\n" .
                    "            best!\n" .
                    "        </p>"
            ];

        $reports[4] =
            [
                'id' => 4,
                'category_id' => 4,
                'surpass' => "<p>\n" .
                    "            Writing is very much the only window where university admission officers can get a different perspective on\n" .
                    "            you beyond your academic achievements, test scores, and extracurriculars.\n" .
                    "        </p>\n" .
                    "        <p>\n" .
                    "            Therefore, if you’re confused or not confident with your writing, it’s important to begin your essays early\n" .
                    "            so you can always have time to revise, edit, and submit the best piece you can offer!\n" .
                    "        </p>",
                'heading_improvement' => null
            ];

        DB::table('report')->insert($reports);

        $improvement_reports[0] =
            [
                'id' => 1,
                'report_id' => 1,
                'question_id' => 1,
                'sub_question_id' => 1,
                'improvement' => "<div class=\"major\">\n" .
                    "            <p>\n" .
                    "                Still confused about which major to pick?\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                To narrow it down you can do these steps:\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ul class=\"list-lower-latin\">\n" .
                    "                <li>\n" .
                    "                    <b>Assess Interests</b>: Identify what you enjoy studying or doing.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>Evaluate Strengths</b>: Consider what subjects or skills you excel in.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>Research Majors</b>: Look into what each major involves and offers.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>Consider Careers</b>: Explore job prospects for difference majors.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>Seek advice</b>: Talk to student, alumni, and, professionals for insight.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>By Open to Change</b>: It's okay to switch majors if your interests goals evolve.\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "        </div>",
            ];

        $improvement_reports[1] =
            [
                'id' => 2,
                'report_id' => 1,
                'question_id' => 2,
                'sub_question_id' => null,
                'improvement' => "<div class=\"daily-schedule\">\n" .
                    "            <p>\n" .
                    "                Let’s upgrade that schedule! Many universities will be interested in what you’ve done and always look at\n" .
                    "                the\n" .
                    "                amount of your activities\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                While the end results of your efforts is definitely a plus, the process towards achieving that can also\n" .
                    "                be\n" .
                    "                documented to showcase your persistence and hard work!\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Even doing something as simple as your hobbies will count towards something, so invest more in doing\n" .
                    "                various\n" .
                    "                pastimes that will be beneficial for admissions and preparing you for university life.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ul>\n" .
                    "                For Example:\n" .
                    "                <li>\n" .
                    "                    Doing sports like football, tennis, etc, shows your ability in teamwork\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Doing hobbies like crocheting or cooking shows your ability to be patient\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Helping out with family errands or running their business shows your ability to be responsible\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Many of these activities can be inserted in your application later on!\n" .
                    "            </p>\n" .
                    "        </div>"
            ];

        $improvement_reports[2] =
            [
                'id' => 3,
                'report_id' => 1,
                'question_id' => 2,
                'sub_question_id' => null,
                'improvement' => "<div class=\"daily-schedule\">\n" .
                    "            <p>\n" .
                    "                Let’s upgrade that schedule! Many universities will be interested in what you’ve done and always look at\n" .
                    "                the\n" .
                    "                amount of your activities\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                While the end results of your efforts is definitely a plus, the process towards achieving that can also\n" .
                    "                be\n" .
                    "                documented to showcase your persistence and hard work!\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Even doing something as simple as your hobbies will count towards something, so invest more in doing\n" .
                    "                various\n" .
                    "                pastimes that will be beneficial for admissions and preparing you for university life.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ul>\n" .
                    "                For Example:\n" .
                    "                <li>\n" .
                    "                    Doing sports like football, tennis, etc, shows your ability in teamwork\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Doing hobbies like crocheting or cooking shows your ability to be patient\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Helping out with family errands or running their business shows your ability to be responsible\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Many of these activities can be inserted in your application later on!\n" .
                    "            </p>\n" .
                    "        </div>"
            ];

        $improvement_reports[3] =
            [
                'id' => 4,
                'report_id' => 1,
                'question_id' => 5,
                'sub_question_id' => null,
                'improvement' => "<div class=\"goals\">\n" .
                    "            <p>\n" .
                    "                Identifying your goals may seem daunting, but they are important as they can give you direction and keep\n" .
                    "                the\n" .
                    "                motivation going as you know that you are aiming towards something.\n" .
                    "            </p>\n" .
                    "            <ol>\n" .
                    "                How can we do that?\n" .
                    "                <li>\n" .
                    "                    <b>Think About What You Like</b>: Ask yourself what you enjoy and where you want to be in the\n" .
                    "                    future.\n" .
                    "                    Know what you're good at and what you can improve.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>Look Into Options</b>: Explore careers, studies, and hobbies that catch your interest by reading,\n" .
                    "                    watching videos, attending events, or talking to people already in those fields.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Know What Matters to You\n" .
                    "                    </b>\n" .
                    "                    : Figure out which values are most important to you, like helping others, being creative, or making\n" .
                    "                    money. These values should guide your goals.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Set Big and Small Goals\n" .
                    "                    </b>\n" .
                    "                    : Understand the difference between goals you can reach soon and those that will take longer. Make\n" .
                    "                    sure\n" .
                    "                    all your goals help you move toward your big picture.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Be Clear and Measurable\n" .
                    "                    </b>\n" .
                    "                    : Instead of vague goals, set clear ones like improving your GPA to a certain number. This helps you\n" .
                    "                    know exactly what you're aiming for.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Write Them Down\n" .
                    "                    </b>\n" .
                    "                    : Putting your goals on paper makes them real and reminds you of what you're working towards. You\n" .
                    "                    can\n" .
                    "                    also check and change them as needed.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Plan Your Steps\n" .
                    "                    </b>\n" .
                    "                    : Decide what actions you need to take for each goal. This might include learning new things, taking\n" .
                    "                    certain classes, or getting work experience.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Get Advice\n" .
                    "                    </b>\n" .
                    "                    : Share your goals with people who can support and advise you, like mentors, teachers, or family.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    <b>\n" .
                    "                        Check In On Your Goals\n" .
                    "                    </b>\n" .
                    "                    : As you grow and learn, your goals might change. Regularly look at your goals and how you're doing,\n" .
                    "                    and\n" .
                    "                    be ready to adjust them.\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "        </div>"
            ];

        $improvement_reports[4] =
            [
                'id' => 5,
                'report_id' => 1,
                'question_id' => 6,
                'sub_question_id' => null,
                'improvement' => "<div class=\"dream-country\">\n" .
                    "            <p>\n" .
                    "                Starting to pick your dream country or university shouldn’t be complicated!\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                When choosing where to study abroad, start by looking into different countries and universities that\n" .
                    "                offer\n" .
                    "                programs related to your interests. But it's not just about the courses; <b>the culture and lifestyle of\n" .
                    "                    the\n" .
                    "                    place</b> are super important too. Imagine living there—does it feel right to you?\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Language is another big thing to consider. Will you be comfortable speaking the language used there,\n" .
                    "                both in\n" .
                    "                and out of class? And then there's the money aspect. Look at how much it will cost for tuition and\n" .
                    "                living\n" .
                    "                expenses. Can you manage it, or are there scholarships you can apply for?\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                You'll also need to check out the nitty-gritty details like admission requirements and what you need to\n" .
                    "                do\n" .
                    "                to get a visa. It's a good idea to chat with people who've been there and done that—alumni or current\n" .
                    "                students can give you the real scoop on what it's like.\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Think about your future too. <b>What kind of job opportunities are there in that country after you\n" .
                    "                    graduate?</b>\n" .
                    "                And if it's possible, try to visit the place before you make your final decision. Nothing beats\n" .
                    "                experiencing\n" .
                    "                it firsthand to see if it truly feels like the right fit for you.\n" .
                    "            </p>\n" .
                    "        </div>"
            ];

        $improvement_reports[5] =
            [
                'id' => 6,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 5,
                'improvement' => "<div class=\"competition\">\n" .
                    "            <p>\n" .
                    "                Participating in competitions showcases your ambition and drive to excel in a specific area. It\n" .
                    "                helps\n" .
                    "                develop your skills under pressure and can highlight your achievements on a national or\n" .
                    "                international\n" .
                    "                level.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Note that there are a wide variety of competitions which are not limited to just academic subjects\n" .
                    "                like\n" .
                    "                olympiads. Understand your abilities and branch out by doing competitions such as:\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ol>\n" .
                    "                <li>\n" .
                    "                    business pitching,\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    resarch paper,\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    or event essay competitions,\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "        </div>"
            ];

        $improvement_reports[6] =
            [
                'id' => 7,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 6,
                'improvement' => "<div class=\"internship\">\n" .
                    "            <p>\n" .
                    "                Internships provide hands-on experience in your field of interest, allowing you to apply academic\n" .
                    "                knowledge in real-world settings. They are crucial for understanding workplace dynamics, building\n" .
                    "                professional networks, and enhancing your resume with practical experience.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Remember! The point of an internship is to expose you to a professional setting. Thus whether the\n" .
                    "                size\n" .
                    "                of the company and the amount of time done is small it will still be beneficial for you!\n" .
                    "            </p>\n" .
                    "        </div>"
            ];

        $improvement_reports[7] =
            [
                'id' => 8,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 7,
                'improvement' => "<div class=\"volunteering\">\n" .
                    "            <p>\n" .
                    "                Volunteering demonstrates your commitment to community service and social responsibility. It helps\n" .
                    "                develop empathy, teamwork, and leadership skills while contributing positively to society. It also\n" .
                    "                broadens your perspective and can open up new areas of interest.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Volunteering doesn’t have to be grand by collaborating with a big company and using many funds!\n" .
                    "                Initiating small prolonged causes is also great!\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ul>\n" .
                    "                <li>\n" .
                    "                    Teaching academic subjects twice a week at an orphanage\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Holding art/music therapy classes for elders\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Doing fundraising and donating to people in need\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "        </div>"
            ];

        $improvement_reports[8] =
            [
                'id' => 9,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 8,
                'improvement' => "<div class=\"school-clubs\">\n" .
                    "            <p>\n" .
                    "                Involvement in school clubs indicates your ability to balance academic and extracurricular\n" .
                    "                activities. It's an opportunity to pursue interests outside of the traditional curriculum.\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                In some schools, you can create your own club if there are enough people interested in joining!\n" .
                    "                Through these school clubs, you can also initiate external activities which show your commitment to\n" .
                    "                upgrading your profile.\n" .
                    "            </p>\n" .
                    "            <ul>\n" .
                    "                Examples:\n" .
                    "                <li>\n" .
                    "                    Participating in tournaments with your school sports club or debate club\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Going to entrepreneurship club and making a collaborative business\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "        </div>"
            ];

        $improvement_reports[9] =
            [
                'id' => 10,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 9,
                'improvement' => "<div class=\"out-of-school\">\n" .
                    "            <p>\n" .
                    "                Engaging in out-of-school activities showcases your initiative to seek personal growth opportunities\n" .
                    "                beyond the classroom. It reflects a well-rounded character, time management skills, and the ability\n" .
                    "                to pursue passions independently.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ul>\n" .
                    "                Examples:\n" .
                    "                <li>\n" .
                    "                    Doing coding club and creating a website/game\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Going to art clubs and creating crafts or performing shows\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Attending cooking club and contributing to a food bank\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "        </div>"
            ];

        $improvement_reports[10] =
            [
                'id' => 11,
                'report_id' => 2,
                'question_id' => 8,
                'sub_question_id' => 10,
                'improvement' => "<div class=\"summer\">\n" .
                    "            <p>\n" .
                    "                Participating in summer or winter educational programs demonstrates your eagerness to use breaks\n" .
                    "                productively for further learning. These programs can offer intensive learning experiences, exposure\n" .
                    "                to new cultures, and opportunities to explore subjects in depth.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Don’t forget, it’s important to take a look into what the program offers so it can be useful for\n" .
                    "                your CV. For example, focusing on\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ol>\n" .
                    "                <li>\n" .
                    "                    Community service\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Research initiatives\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Exploring certain majors\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Cultural exchange and university tours\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "        </div>"
            ];

        $improvement_reports[11] =
            [
                'id' => 12,
                'report_id' => 2,
                'question_id' => 9,
                'sub_question_id' => null,
                'improvement' => "<div class=\"personal-project\">\n" .
                    "            <p>\n" .
                    "                Undertaking personal projects shows self-motivation and the ability to work independently. It's a\n" .
                    "                chance to explore interests deeply, solve problems creatively, and potentially innovate or create\n" .
                    "                something unique.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ol>\n" .
                    "                Examples:\n" .
                    "                <li>\n" .
                    "                    Create an app that tackles a social issue\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Starting a small business, such as selling your own creations\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Designing a book or IG page that aims to bring awareness to a certain cause\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "        </div>"
            ];

        $improvement_reports[12] =
            [
                'id' => 13,
                'report_id' => 2,
                'question_id' => 10,
                'sub_question_id' => null,
                'improvement' => " <div class=\"research-project\">\n" .
                    "            <p>\n" .
                    "                Engaging in research projects, especially those that lead to publication or presentation,\n" .
                    "                underscores your commitment to academic inquiry and contribution to your field of study. It develops\n" .
                    "                critical thinking, and analytical skills, and can significantly enhance your academic profile.\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Remember, research doesn’t always have to be scientific! It can encompass various subjects, all you\n" .
                    "                need to do is cater the research question to the topic you want to investigate.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ol>\n" .
                    "                For example, analyzing:\n" .
                    "                <li>\n" .
                    "                    Financial situations in different countries\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Repercussions of social media\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Environmental hazards towards a society\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "        </div>"
            ];

        $improvement_reports[13] =
            [
                'id' => 14,
                'report_id' => 3,
                'question_id' => 14,
                'sub_question_id' => null,
                'improvement' => "<div class=\"standardized-tests\">\n" .
                    "            <div class=\"sat\">\n" .
                    "                <b>SAT:</b>\n" .
                    "                <p>\n" .
                    "                    The SAT test aims to measure a high school student's readiness for college through their English and\n" .
                    "                    math abilities. It is usually aimed at students who are applying to the US but it can still be\n" .
                    "                    beneficial as a plus point if you plan to go to the UK, Australia, or Japan.\n" .
                    "                </p>\n" .
                    "\n" .
                    "                <p>\n" .
                    "                    To find complete info on the SAT test from registration procedures, and content curriculum of the\n" .
                    "                    test,\n" .
                    "                    everything can be accessed at\n" .
                    "                    <a href=\"https://satsuite.collegeboard.org/sat\">https://satsuite.collegeboard.org/sat</a>\n" .
                    "                </p>\n" .
                    "\n" .
                    "                <p>\n" .
                    "                    In addition you can also find official simulations of the test on\n" .
                    "                    <a href=\"https://bluebook.collegeboard.org/\">https://bluebook.collegeboard.org/.</a>\n" .
                    "                </p>\n" .
                    "\n" .
                    "                <p>\n" .
                    "                    Another website that provides a comprehensive study guide is\n" .
                    "                    <a href=\"https://www.khanacademy.org/digital-sat\">https://www.khanacademy.org/digital-sat.</a>\n" .
                    "                </p>\n" .
                    "\n" .
                    "                <p>\n" .
                    "                    Be sure to check it out!\n" .
                    "                </p>\n" .
                    "            </div>\n" .
                    "\n" .
                    "            <div class=\"ielts-toefl\">\n" .
                    "                <b>IELTS & TOEFL:</b>\n" .
                    "                <p>\n" .
                    "                    As you may know, both the IELTS and TOEFL test are used to measure the English language ability of\n" .
                    "                    non-native speakers wishing to enroll in English-speaking universities.\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    If your school implements the IBDP curriculum, usually it won’t be necessary, however, if you are\n" .
                    "                    from a\n" .
                    "                    school that uses the Cambridge or national Indonesian curriculum it is mainly mandatory.\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    Both have a similar structure of <b>Reading, Listening, Writing, Speaking,</b> but the content and\n" .
                    "                    scoring still differ. Therefore don’t forget to study the structure and tips and tricks to excel at\n" .
                    "                    the\n" .
                    "                    test!\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    For TOEFL you can access their resources and register for the official test at\n" .
                    "                    <a\n" .
                    "                        href=\"https://www.ets.org/toefl/test-takers/ibt/about.html\">https://www.ets.org/toefl/test-takers/ibt/about.html</a>\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    While for IELTS, applying for the official test has to be done through external agents. In\n" .
                    "                    Indonesia,\n" .
                    "                    the 3\n" .
                    "                    main agents that have centers in every city are\n" .
                    "                    IDP:\n" .
                    "                    <a href=\"https://ielts.idp.com/indonesia/test-dates\">https://ielts.idp.com/indonesia/test-dates</a>\n" .
                    "                    IALF:\n" .
                    "                    <a\n" .
                    "                        href=\"https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/\">https://www.ialf.edu/ielts-test-dates-locations-in-indonesia/</a>\n" .
                    "\n" .
                    "                    The British Council:\n" .
                    "                    <a\n" .
                    "                        href=\"https://www.britishcouncilfoundation.id/en/exam/ielts\">https://www.britishcouncilfoundation.id/en/exam/ielts</a>\n" .
                    "\n" .
                    "                </p>\n" .
                    "\n" .
                    "                <p>\n" .
                    "                    Be careful when choosing whether you want to take the computer or paper-based test!\n" .
                    "                </p>\n" .
                    "            </div>\n" .
                    "        </div>"
            ];

        $improvement_reports[14] =
            [
                'id' => 15,
                'report_id' => 3,
                'question_id' => 13,
                'sub_question_id' => null,
                'improvement' => null
            ];

        $improvement_reports[15] =
            [
                'id' => 16,
                'report_id' => 4,
                'question_id' => 18,
                'sub_question_id' => null,
                'improvement' => "<div class=\"increasing-confidence\">\n" .
                    "            <p>\n" .
                    "                Increasing confidence in writing involves practice, feedback, and a positive mindset!\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                The easiest way to start would be by <b>writing regularly and starting small</b>, you can gradually\n" .
                    "                increase the length and complexity of your writing as you become more comfortable.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <ol>\n" .
                    "                For university essays, this can be implemented by:\n" .
                    "                <li>\n" .
                    "                    creating a simple outline first\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    updating each paragraph daily but little by little (setting achievable writing goals to help track\n" .
                    "                    your\n" .
                    "                    progress)\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    ask feedback\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    revising and editing your work continuously until you have refined your ideas and expressed them\n" .
                    "                    clearly\n" .
                    "                </li>\n" .
                    "            </ol>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                It’s always <b>important to be open to feedback</b> and seek it from your friends, family, or even\n" .
                    "                people you don’t\n" .
                    "                know to get a fresh perspective, for example, a mentor. It may be hard at first, but it’s normal to make\n" .
                    "                mistakes!\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                The university essays will also touch upon your personal experiences, therefore <b>spend some time\n" .
                    "                    self-reflecting</b> and digging back into your memories which you can use later on.\n" .
                    "            </p>\n" .
                    "\n" .
                    "            <p>\n" .
                    "                Be sincere in your writing and it will definitely show!\n" .
                    "            </p>\n" .
                    "        </div>"
            ];

        $improvement_reports[16] =
            [
                'id' => 17,
                'report_id' => 4,
                'question_id' => 20,
                'sub_question_id' => null,
                'improvement' => " <div class=\"activities-in-writing\">\n" .
                    "            <p>\n" .
                    "                Engaging in writing activities prior to doing your university admissions is very important and here’s\n" .
                    "                why!\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                First off, <b>the more you write, the better you get at it!</b> Writing helps you get your thoughts\n" .
                    "                straight\n" .
                    "                and argue your points like a pro. It also <b>makes you better at sharing your own stories and\n" .
                    "                    feelingss</b>,\n" .
                    "                which is exactly what college essays often ask you to do. Plus, <b>practicing writing with deadlines\n" .
                    "                    teaches you how to work fast</b> and still do a great job, which is a lifesaver when you're filling\n" .
                    "                out those college applications and also later on when you go to college.\n" .
                    "            </p>\n" .
                    "            <p>\n" .
                    "                Second, trying out different kinds of writing makes you more creative and gives you a bunch of cool\n" .
                    "                ideas\n" .
                    "                for your college essays. You'll also have a bunch of writing pieces ready to go, which can really help\n" .
                    "                when\n" .
                    "                you're stuck. Getting good at changing your writing style depending on the question, doing research for\n" .
                    "                your\n" .
                    "                essays, and gearing up for all the writing you'll have to do in college are all super important. And\n" .
                    "                don’t\n" .
                    "                forget, <b>the more you write, the more confident you'll feel</b> about your writing skills. So when\n" .
                    "                it's time\n" .
                    "                to\n" .
                    "                apply to college, you'll be ready to ace those essays.\n" .
                    "            </p>\n" .
                    "            <ul class=\"list-lower-latin\">\n" .
                    "                So let’s try increasing that participation in:\n" .
                    "                <li>\n" .
                    "                    Various competitions: doing academic essays or writing business plans can help you understand what\n" .
                    "                    universities are usually looking for and train your brain to be quick.\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Writing workshops or bootcamps\n" .
                    "                </li>\n" .
                    "                <li>\n" .
                    "                    Self-writing (journals, stories, etc.): take time for at least 10 minutes a day to write down what\n" .
                    "                    you did\n" .
                    "                    that day or how you were feeling. Doing this will help prepare you for writing about your personal\n" .
                    "                    experiences!\n" .
                    "                </li>\n" .
                    "            </ul>\n" .
                    "\n" .
                    "        </div>"
            ];


        DB::table('improvement_report')->insert($improvement_reports);


        $sub_improvement_reports[0] =
            [
                'id' => 1,
                'improvement_report_id' => 15,
                'improvement' => "<div class=\"low-score\">\n" .
                    "                <p>\n" .
                    "                    With this score, there is a slight probability you can be accepted in some low-competitive\n" .
                    "                    universities (taking into account other aspects like your profile and essays are exceptional).\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    However, it’s time to also be realistic and search for alternative options!\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    Other choices that you can do is going to community college, doing a gap year, or taking foundation\n" .
                    "                    classes first before continuing on to university.\n" .
                    "                </p>\n" .
                    "                <p>\n" .
                    "                    Don’t worry! There are many benefits to this, not only are class sizes much smaller and the schedule\n" .
                    "                    is more flexible, but by doing this you will actually be more prepared for entering university later\n" .
                    "                    on.\n" .
                    "                </p>\n" .
                    "            </div>"
            ];

        $sub_improvement_reports[1] =
            [
                'id' => 2,
                'improvement_report_id' => 15,
                'improvement' => " <div class=\"mid-score\">\n" .
                    "                <p>\n" .
                    "                    The score you have received is fairly decent and above average. With this score, it will be easier\n" .
                    "                    to apply for admission to normal universities/ colleges.\n" .
                    "                </p>\n" .
                    "            </div>"
            ];

        $sub_improvement_reports[2] =
            [
                'id' => 3,
                'improvement_report_id' => 15,
                'improvement' => "<div class=\"high-score\">\n" .
                    "                <p>\n" .
                    "                    This is already considered a good score. It shows that you have worked hard to pass the IBDP or\n" .
                    "                    A-Level\n" .
                    "                    and you are an intelligent person. Although it is not a top-type result, you are still considered in\n" .
                    "                    the\n" .
                    "                    top 30% of all who completed the program. Keep on striving to maintain and improve these scores!\n" .
                    "                </p>\n" .
                    "            </div>"
            ];

        DB::table('sub_improvement_report')->insert($sub_improvement_reports);
    }
}
