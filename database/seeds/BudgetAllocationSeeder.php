<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use dwproject\Models\BudgetAllocation;

class BudgetAllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $budgetAllocations  = [
        	[
                'school_year' => '2017-2018',
                'department' => 'Finance',
                'amount' => 350000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Administration',
                'amount' => 500000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Computer Studies',
                'amount' => 325000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Engineering',
                'amount' => 325000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Security',
                'amount' => 205000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Education',
                'amount' => 390000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Technology',
                'amount' => 650000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Business and Arts',
                'amount' => 325000
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Humanities',
                'amount' => 385500
            ],
            [
                'school_year' => '2017-2018',
                'department' => 'Physical Education',
                'amount' => 189000
            ],

            [
                'school_year' => '2018-2019',
                'department' => 'Finance',
                'amount' => 470000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Administration',
                'amount' => 565000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Computer Studies',
                'amount' => 225000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Engineering',
                'amount' => 375000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Security',
                'amount' => 275000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Education',
                'amount' => 450000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Technology',
                'amount' => 400000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Business and Arts',
                'amount' => 425000
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Humanities',
                'amount' => 405500
            ],
            [
                'school_year' => '2018-2019',
                'department' => 'Physical Education',
                'amount' => 200000
            ],

        ];

        foreach ($budgetAllocations as $budget) {
            $ba = new BudgetAllocation;
            $ba->school_year = $budget['school_year'];
            $ba->department = $budget['department'];
            $ba->amount = $budget['amount'];
            $ba->save();
        }
    }
}
