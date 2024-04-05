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
        $indexOption = 1;

        # seeds for options no 1a
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
            foreach (${'major_' . $key} as $key_2 => $value_2) {
                $seeds[$indexOption] =
                    [
                        'id' => $indexOption,
                        'question_id' => 1,
                        'sub_question_id' => 1,
                        'title_of_answer' => $faculty[$key],
                        'option_answer' => $value_2,
                        'reference_to' => null,
                        'point' => 1
                    ];

                $indexOption++;
            }
        }


        # seeds for options no 1b
        $major_na = ['Sports and Athletics', 'Music, Singing', 'Creative Art', 'Public Speaking', 'Debate', 'Robotic, Coding', 'Cooking and Baking', 'Reading and writing'];
        foreach ($major_na as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 1,
                'sub_question_id' => 2,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        # seeds for options no 2
        $option_no_2 = ['School', 'Tutoring', 'Clubs (after school activities)', 'Volunteering', 'Internship', 'Competition preparation', 'Helping family business/do family errands', 'Personal development (hobbies)'];
        $point_no_2 = [1, 1, 1, 2, 3, 2, 2, 2];
        foreach ($option_no_2 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 2,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => $point_no_2[$key]
            ];

            $indexOption++;
        }


        # seeds for options no 3
        $options_no_3 = ['Hard-working', 'Creative', 'Adaptive', 'Empathetic', 'Resilient', 'Meticulous', 'Honest', 'Love to learn'];
        foreach ($options_no_3 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 3,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        $indexOption++;

        # seeds for options no 4
        $options_no_4 = ['Procrastination', 'Impatience', 'Carelessness', 'Irresponsibility', 'Insecurity', 'Stubbornness', 'Pessimism', 'Ignorance'];
        foreach ($options_no_4 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 4,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        $indexOption++;

        $options_no_6 = ['United States of America', 'United Kingdom', 'Hong Kong', 'Singapore', 'Japan', 'China', 'European Union (Netherlands, Germany, etc.)'];
        foreach ($options_no_6 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 6,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
        }

        $options_no_8 = ['International', 'National', 'Province/Town', 'School'];
        $point_option_no_8 = [1, 0.75, 0.5, 0.25];
        foreach ($options_no_8 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 8,
                'sub_question_id' => 5,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => $point_option_no_8[$key]
            ];

            $indexOption++;
        }

        $options_no_11 = ['IB Diploma Programme (IBDP)', 'IB MYP', 'Cambridge IGCSE', 'Cambridge A-Level', 'National curriculum', 'Others'];
        foreach ($options_no_11 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 11,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        # no 12
        $group_0 = ['Studies in Language and Literature', 'Language Acquisition', 'Individuals and Societies', 'Sciences', 'Mathematics', 'The Arts'];
        $group_1 = ['Sciences', 'Mathematics', 'Humanities and Social Sciences', 'Languages', 'Arts and Design', 'Technology and Vocational', 'Physical Education'];


        $subject0_0 = ['Literature', 'Language and Literature', 'Literature and Performance'];
        $subject0_1 = ['Language B', 'Language ab initio', 'Classical Languages'];
        $subject0_2 = ['Business Management', 'Economics', 'Geography', 'Global Politics', 'History', 'Information Technology in a Global Society', 'Philosophy', 'Psychology', 'Social and Cultural Anthropology', 'Environmental Systems and Societies', 'World Religions'];
        $subject0_3 = ['Biology', 'Chemistry', 'Physics', 'Computer Science', 'Design Technology', 'Sports, Exercise, and Health Science'];
        $subject0_4 = ['Mathematics: Analysis and Approaches', 'Mathematics: Applications and Interpretation'];
        $subject0_5 = ['Visual Arts', 'Music', 'Theatre', 'Dance', 'Film'];
        // $subject0_6 = ['Theory of Knowledge (TOK)', 'Extended Essay (EE)', 'Creativity', 'Activity', 'Service (CAS)'];

        $subject1_0 = ['Biology', 'Chemistry', 'Physics', 'Environmental Science', 'Marine Science', 'Psychology'];
        $subject1_1 = ['Mathematics', 'Further Mathematics'];
        $subject1_2 = ['Geography', 'History', 'Sociology', 'Law', 'Government and Politics', 'Psychology', 'Economics', 'Business Studies', 'Global Perspectives', 'Research'];
        $subject1_3 = ['English Language', 'English Literature', 'Chinese', 'Spanish', 'French', 'German', 'Arabic', 'Other languages'];
        $subject1_4 = ['Art and Design', 'Music', 'Theatre Studies', 'Media Studies', 'Textile Design', 'Photography'];
        $subject1_5 = ['Computer Science', 'Information Technology', 'Design', 'Technology'];
        $subject1_6 = ['Physical Education'];

        $subject2_0 = ['Bahasa Indonesia (Indonesian Language and Literature)', 'Matematika (Mathematics)', 'Ilmu Pengetahuan Alam Terpadu (Science Studies)', 'Ilmu Pengetahuan Sosial Terpadu (Social Studies)', 'Pendidikan Kewarganegaraan (Civic)', 'Pendidikan Agama (Religion)', 'Bahasa Inggris (English Language)', 'Seni dan Prakarya (Arts and Craftsmanship)', 'Pendidikan Jasmani, Olahraga, dan Kesehatan (Physical Education)', 'Bahasa Asing (Foreign Language)', 'Teknologi Informasi dan Komunikasi (Information and Communication Technology)', 'Fisika (Physics)', 'Kimia (Chemistry)', 'Biologi (Biology)', 'Sejarah (History)', 'Geografi (Geography)', 'Ekonomi (Economics)', 'Sosiologi (Sociology)'];
        $reference_to = ['IB', 'Cambridge'];
        for ($i = 0; $i < 2; $i++) {
            foreach (${'group_' . $i} as $key => $value) {
                foreach (${'subject' . $i . '_' . $key} as $key_2 => $value_2) {
                    $seeds[$indexOption] =
                        [
                            'id' => $indexOption,
                            'question_id' => 12,
                            'sub_question_id' => null,
                            'title_of_answer' => $value,
                            'option_answer' => $value_2,
                            'reference_to' => $reference_to[$i],
                            'point' => 0
                        ];

                    $indexOption++;
                }
            }
        }
        $indexOption += 8;
        // '11'

        foreach ($subject2_0 as $key => $value) {
            $seeds[$indexOption] =
                [
                    'id' => $indexOption,
                    'question_id' => 12,
                    'sub_question_id' => null,
                    'title_of_answer' => null,
                    'option_answer' => $value,
                    'reference_to' => 'National',
                    'point' => 0
                ];

            $indexOption++;
        }
        # end no 12


        $options_no_15 = ['Yes', 'No'];
        foreach ($options_no_15 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 15,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
        }

        $options_no_17 = ['Research reports', 'Descriptive texts', 'Argumentative texts', 'Narrative texts', 'Journals', 'Self-reflection'];
        foreach ($options_no_17 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 17,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
        }

        $indexOption++;

        #No 18
        for ($i = 1; $i < 6; $i++) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 18,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $i,
                'reference_to' => null,
                'point' => $i
            ];

            $indexOption++;
        }

        #No 19
        for ($i = 1; $i < 6; $i++) {

            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 19,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $i,
                'reference_to' => null,
                'point' => $i
            ];

            $indexOption++;
        }

        $newIndex = 259;
        # Additional option no 1b
        $add_major_na = [
            'Carpentry', 'Gardening', 'Hiking and Camping', 'Photography', 'Traveling', 'Video Gaming', 'Watching Movies and TV Shows', 'Fitness and Exercise', 'Collecting', 'Board Games and Puzzles', 'Fashion and Beauty', 'Volunteering and Community Service', 'Astronomy', 'Model United Nations', 'Animal Welfare', 'Music Bands or Orchestras', 'Chess', 'Business and Entrepreneurship'
        ];
        foreach ($add_major_na as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $newIndex,
                'question_id' => 1,
                'sub_question_id' => 2,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
            $newIndex++;
        }

        # Additional option no 6
        $add_options_no_6 = ['Korea', 'Australia'];
        foreach ($add_options_no_6 as $key => $value) {

            $seeds[$indexOption] = [
                'id' => $newIndex,
                'question_id' => 6,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
            $newIndex++;
        }


        # additional subject IB no 12
        $add_subject_ib_no_12 = ['Standard Mathematics', 'Extended Mathematics'];
        foreach ($add_subject_ib_no_12 as $key => $value) {
            $seeds[$indexOption] =
                [
                    'id' => $newIndex,
                    'question_id' => 12,
                    'sub_question_id' => null,
                    'title_of_answer' => 'Mathematics',
                    'option_answer' => $value,
                    'reference_to' => 'IB',
                    'point' => 0
                ];

            $indexOption++;
            $newIndex++;
        }


        # additional subject cambridge no 12
        $add_subject_cambridge_no_12 = ['English General Paper'];
        foreach ($add_subject_cambridge_no_12 as $key => $value) {
            $seeds[$indexOption] =
                [
                    'id' => $newIndex,
                    'question_id' => 12,
                    'sub_question_id' => null,
                    'title_of_answer' => 'Languages',
                    'option_answer' => $value,
                    'reference_to' => 'Cambridge',
                    'point' => 0
                ];

            $indexOption++;
            $newIndex++;
        }

        # option no 20
        $option_no_20 = ['Yes', 'No'];
        foreach ($option_no_20 as $key => $value) {
            $seeds[$indexOption] =
                [
                    'id' => $newIndex,
                    'question_id' => 12,
                    'sub_question_id' => null,
                    'title_of_answer' => null,
                    'option_answer' => $value,
                    'reference_to' => null,
                    'point' => 0
                ];

            $indexOption++;
            $newIndex++;
        }



        DB::table('options')->insert($seeds);
    }
}
