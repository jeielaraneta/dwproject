<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use dwproject\Models\Enrollment;

class EnrollmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enrollments  = [
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSCS'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSIE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSIE'
            ],

            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSCS'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSCS'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSCpE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSIE'
            ],

            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSCpE'
            ],
            [
                'school_year' => '2017-2018',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],

            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSCS'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSCpE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],

            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSCS'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '0',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSCpE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '1',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],

            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Computer Studies',
                'course' => 'BSIT'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Education',
                'course' => 'BSEd'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSME'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSCE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSCpE'
            ],
            [
                'school_year' => '2018-2019',
                'semester' => '2',
                'college' => 'Engineering',
                'course' => 'BSME'
            ]
        ];
        foreach ($enrollments as $enrollment) {
            $e = new Enrollment;
            $e->school_year = $enrollment['school_year'];
            $e->semester = $enrollment['semester'];
            $e->college = $enrollment['college'];
            $e->course = $enrollment['course'];
            $e->save();
        }
    }
}
