<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indexOption = 240;

        $seeds[$indexOption] = [
            'id' => $indexOption,
            'question_id' => 21,
            'sub_question_id' => 27,
            'title_of_answer' => null,
            'option_answer' => 'One*t Test',
            'reference_to' => null,
            'point' => 2
        ];

        $indexOption++;


        #sub no 28
        $option_subno_28 = ['Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional'];
        foreach ($option_subno_28 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 21,
                'sub_question_id' => 28,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
        }

        #sub no 29
        $option_subno_29 = ['Brenda Chia'];
        foreach ($option_subno_29 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 22,
                'sub_question_id' => 29,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 1
            ];

            $indexOption++;
        }

        #sub no 31
        $option_subno_31 = ['Revociety', 'Anak Harapan Sahabat', 'Rumah Sahabat'];
        foreach ($option_subno_31 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 23,
                'sub_question_id' => 31,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        #sub no 33
        $option_subno_33 = ['3D printing', 'Makeblock', 'Hydroponics'];
        foreach ($option_subno_33 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 24,
                'sub_question_id' => 33,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        #no 25
        $option_no_25 = ['SAT', 'IELTS', 'TOEFL'];
        foreach ($option_no_25 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 25,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => 0
            ];

            $indexOption++;
        }

        #no 13
        #Initial Assessment
        $option_no_13 = ["I don't know", "I know"];
        $point_no_13 = [6, 12];
        foreach ($option_no_13 as $key => $value) {
            $seeds[$indexOption] = [
                'id' => $indexOption,
                'question_id' => 13,
                'sub_question_id' => null,
                'title_of_answer' => null,
                'option_answer' => $value,
                'reference_to' => null,
                'point' => $point_no_13[$key]
            ];

            $indexOption++;
        }


        DB::table('options')->insert($seeds);
    }
}
