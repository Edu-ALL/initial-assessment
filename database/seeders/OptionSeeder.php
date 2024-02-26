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
        # seeds for options no 1
        $faculty = ['Arts and Humanities', 'Social Sciences', 'Science', 'Engineering', 'Business', 'Health Sciences', 'Law', 'Agriculture', 'Architecture and Design', 'Information Technology'];
        $major_0 = ['English Literature', 'History', 'Philosophy', 'Languages and Linquistics', 'Art and Design', 'Music', 'Theatre and Performance Studies', 'Religious Studies', 'Classics'];
        $major_1 = ['Psychology', 'Sociology', 'Political Science', 'Economics', 'Geography', 'Anthroplogy', 'Media and Communications', 'Education', 'Social Work'];
        $major_2 = ['Biology', 'Chemistry', 'Physics', 'Mathematics', 'Environmental Science', 'Geology', 'Astronomy', 'Statistics', 'Computer Science'];
        $major_3 = ['Mechanical Engineering', 'Electrical Engineering', 'Civil Engineering', 'Chemical Engineering', 'Aerospace Engineering', 'Computer Engineering', 'Biomedical Engineering', 'Industrial Engineering'];
        $major_4 = ['Business Administration', 'Accounting', 'Finance', 'Marketing', 'International Business', 'Human Resources Management', 'Entrepreneurship', 'Supply Chain Management'];
        $major_5 = ['Nursing', 'Medicine', 'Pharmacy', 'Dentistry', 'Public Health', 'Nutrition and Dietetics', 'Physical Therapy', 'Occupational Therapy'];
        $major_6 = ['Law', 'International Law', 'Criminal Justice', 'Environmental Law', 'Corporate Law', 'Human Rights Law'];
        $major_7 = ['Agriculture', 'Animal Science', 'Horticulture', 'Soil Science', 'Agricultural Economics', 'Plant Science', 'Food Science and Technology', 'Forestry'];
        $major_8 = ['Architecture', 'Landscape Architecture', 'Interior Design', 'Urban Planning', 'Graphic Design', 'Industrial Design'];
        $major_9 = ['Information Technology', 'Software Engineering', 'Cybersecurity', 'Data Science', 'Information Systems'];
        foreach ($faculty as $key => $value) {
            foreach (${'major_'.$key} as $key_2 => $value_2) {
                $seeds[] =
                    [
                        'question_id' => 1,
                        'sub_question_id' => 1,
                        'title_of_answer' => $faculty[$key],
                        'option_answer' => $value_2,
                        'point' => 1
                    ];
            }
        }

        # seeds for answer no 2
        

        DB::table('options')->insert($seeds);
    }
}
