<?php

namespace dwproject\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    public $table = 'research';

    protected $fillable = [
        'college', 'total_count'
    ];

    public function getData(){
        $data = Research::get();
        return $data;
    }

    public function getResearchCountPerCollege($data) {

        $output = array();
        $collection = $data->groupBy('college', function ($item) {
		    return $item;
		});

		foreach ($collection as $college => $row) {
			foreach ($row as $key => $value) {
				$output[$college] = $value->total_count;
			}
		}

        return $output;
    }
}
