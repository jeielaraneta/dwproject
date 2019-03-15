<?php

namespace dwproject\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetAllocation extends Model
{
    public $table = 'budget_allocation';

    protected $fillable = [
        'school_year', 'department', 'amount'
    ];

    public function setDataModel($baPerSY, $baPerDept) {
        
        $output = array(
            'sy' => $baPerSY,
            'department' => $baPerDept
        );
        return $output;
    }

    public function getData(){
        $data = BudgetAllocation::get();
        return $data;
    }

    public function getBudgetAllocationPerSY($data) {

        $output = array();
        $collection = $data->groupBy('school_year')->map(function ($item) {

        	$budgetPerSY = array();
        	foreach ($item as $key => $value) {
        		$budgetPerSY[$key] = $value->amount;
        	}

		    return $budgetPerSY;
		});

        foreach ($collection as $key => $value) {
        	$output[$key] = array_sum($value);
        }

        return $output;
    }

    public function getBudgetAllocationPerDept($data) {

        $output = array();

        $collection = $data->groupBy(['school_year','department'])->map(function ($item, $value) {

        	$budgetPerDept = array();
        	foreach ($item as $key => $value) {
        		foreach ($value as $a => $b) {
        			$budgetPerDept[$key] = $b->amount;
        		}
        	}

		    return $budgetPerDept;
		});

        return $collection;
    }

}
