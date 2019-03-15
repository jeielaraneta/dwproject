<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use dwproject\Models\Research;

class ResearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $researches = [
        	[
        		'college' => 'Computer Studies',
        		'total_count'=> 30
        	],
        	[
        		'college' => 'Engineering',
        		'total_count' => 50
        	],
        	[
        		'college' => 'Education',
        		'total_count' => 20
        	]

        ];

        foreach ($researches as $research) {
            $r = new Research;
            $r->college = $research['college'];
            $r->total_count = $research['total_count'];
            $r->save();
        }
    }
}
