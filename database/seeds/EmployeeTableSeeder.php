<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use dwproject\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees  = [
        	[
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Administration',
                'academic_rank' => ''
            ],

        	[
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],

            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Casual',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Administration',
                'academic_rank' => ''
            ],

            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Administration',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Casual',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],

            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Casual',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],

            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Casual',
                'department' => 'Finance',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'J.O',
                'department' => 'Security',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],
            [
                'involvement' => 'NT',
                'category' => 'Permanent',
                'department' => 'Technology',
                'academic_rank' => ''
            ],

            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Master'
            ],

            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Education',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Master'
            ],

            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Computer Studies',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Engineering',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Master'
            ],

            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Master'
            ],

            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Computer Studies',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Engineering',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Master'
            ],

            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Casual',
                'department' => 'Computer Studies',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'COS',
                'department' => 'Engineering',
                'academic_rank' => 'Master'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Engineering',
                'academic_rank' => 'Bachelor'
            ],
            [
                'involvement' => 'T',
                'category' => 'Permanent',
                'department' => 'Education',
                'academic_rank' => 'Bachelor'
            ]
        ];

        foreach ($employees as $employee) {
            $e = new Employee;
            $e->involvement = $employee['involvement'];
            $e->category = $employee['category'];
            $e->department = $employee['department'];
            $e->academic_rank = $employee['academic_rank'];
            $e->save();
        }
    }
}
