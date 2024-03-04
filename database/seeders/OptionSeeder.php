<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # seeds for options no 1a
        // $faculty = ['Arts and Humanities', 'Social Sciences', 'Science', 'Engineering', 'Business', 'Health Sciences', 'Law', 'Agriculture', 'Architecture and Design', 'Information Technology'];
        // $major_0 = ['English Literature', 'History', 'Philosophy', 'Languages and Linquistics', 'Art and Design', 'Music', 'Theatre and Performance Studies', 'Religious Studies', 'Classics'];
        // $major_1 = ['Psychology', 'Sociology', 'Political Science', 'Economics', 'Geography', 'Anthroplogy', 'Media and Communications', 'Education', 'Social Work'];
        // $major_2 = ['Biology', 'Chemistry', 'Physics', 'Mathematics', 'Environmental Science', 'Geology', 'Astronomy', 'Statistics', 'Computer Science'];
        // $major_3 = ['Mechanical Engineering', 'Electrical Engineering', 'Civil Engineering', 'Chemical Engineering', 'Aerospace Engineering', 'Computer Engineering', 'Biomedical Engineering', 'Industrial Engineering'];
        // $major_4 = ['Business Administration', 'Accounting', 'Finance', 'Marketing', 'International Business', 'Human Resources Management', 'Entrepreneurship', 'Supply Chain Management'];
        // $major_5 = ['Nursing', 'Medicine', 'Pharmacy', 'Dentistry', 'Public Health', 'Nutrition and Dietetics', 'Physical Therapy', 'Occupational Therapy'];
        // $major_6 = ['Law', 'International Law', 'Criminal Justice', 'Environmental Law', 'Corporate Law', 'Human Rights Law'];
        // $major_7 = ['Agriculture', 'Animal Science', 'Horticulture', 'Soil Science', 'Agricultural Economics', 'Plant Science', 'Food Science and Technology', 'Forestry'];
        // $major_8 = ['Architecture', 'Landscape Architecture', 'Interior Design', 'Urban Planning', 'Graphic Design', 'Industrial Design'];
        // $major_9 = ['Information Technology', 'Software Engineering', 'Cybersecurity', 'Data Science', 'Information Systems'];
        // foreach ($faculty as $key => $value) {
        //     foreach (${'major_'.$key} as $key_2 => $value_2) {
        //         $seeds[] =
        //             [
        //                 'question_id' => 1,
        //                 'sub_question_id' => 1,
        //                 'title_of_answer' => $faculty[$key],
        //                 'option_answer' => $value_2,
        //                 'point' => 1
        //             ];
        //     }
        // }

        // # seeds for options no 1b
        // $major_na = ['Sports', 'Music, Singing', 'Creative Art', 'Public Speaking', 'Debate', 'Robotic, Coding', 'Cooking', 'Reading and writing']; 
        // foreach ($major_na as $key => $value) {
        //     $seeds[] = [
        //         'question_id' => 1,
        //         'sub_question_id' => 2,
        //         'title_of_answer' => null,
        //         'option_answer' => $value,
        //         'point' => 0
        //     ];
        // }

        # seeds for options no 2
        // $seeds = [
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'School',
        //         'point' => 1
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Tutoring',
        //         'point' => 1
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Clubs (after school activities)',
        //         'point' => 1
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Volunteering',
        //         'point' => 2
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Internship',
        //         'point' => 3
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Competition preparation',
        //         'point' => 2
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Helping family business/do family errands',
        //         'point' => 2
        //     ],
        //     [
        //         'question_id' => 2,
        //         'sub_question_id' => null,
        //         'title_of_answer' => null,
        //         'option_answer' => 'Personal development (hobbies)',
        //         'point' => 2
        //     ],
        // ];

        # seeds for options no 3
        $options_no_3 = ['Hard-working', 'Creative', 'Adaptive', 'Empathetic', 'Resilient', 'Meticulous', 'Honest', 'Love to learn', 'Others (long answer)'];
        foreach ($options_no_3 as $key => $value) {

            $seeds[] = [
                'question_id' => 3,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'point' => 0
            ];

        }

        # seeds for options no 4
        $options_no_4 = ['Procrastinate', 'Impatient', 'Careless', 'Irresponsible', 'Insecure', 'Stubborn', 'Pessimistic', 'Ignorant', 'Others (long answer)'];
        foreach ($options_no_4 as $key => $value) {

            $seeds[] = [
                'question_id' => 4,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'point' => 0
            ];

        }

        $options_no_5 = ['Academic', 'Personal (for example your dream job)'];
        foreach ($options_no_5 as $key => $value) {
            
            $seeds[] = [
                'question_id' => 5,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'point' => 3
            ];

        }

        $options_no_6 = ['US', 'UK', 'HK', 'Singapore', 'Japan', 'China, Korea', 'EU (Netherlands, Germany, etc.)'];
        foreach ($options_no_6 as $key => $value) {

            $seeds[] = [
                'question_id' => 6,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'point' => 1
            ];

        }


        DB::table('options')->insert($seeds);
    }
}
