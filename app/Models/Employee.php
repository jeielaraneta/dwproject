<?php

namespace dwproject\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    public $table = 'employee';

    protected $fillable = [
        'involvement', 'category', 'department', 'academic_rank'
    ];

    public function setDataModel($countPerInvolvement, $countPerDepartment, $countPerCategory) {
        
        $output = array(
            'involvement' => $countPerInvolvement,
            'department' => $countPerDepartment,
            'category' => $countPerCategory
        );
        return $output;
    }

    public function getData(){
        $data = Employee::get();
        return $data;
    }

    public function getUniqueInvolvement($data) {
        
        $rows = $data->unique('involvement');
        $involvementArr = array();

        foreach ($rows as $row => $value) {
            $involvementArr[] = $value->involvement;
        }

        return $involvementArr;
    }

    public function getUniqueDepartment($data) {
        
        $rows = $data->unique('department');
        $departmentsArr = array();

        foreach ($rows as $row => $value) {
            $departmentsArr[] = $value->department;
        }

        return $departmentsArr;
    }

    public function getUniqueCategory($data) {
        
        $rows = $data->unique('category');
        $categoriesArr = array();

        foreach ($rows as $row => $value) {
            $categoriesArr[] = $value->category;
        }

        return $categoriesArr;
    }

    public function getEmployeeCountPerInvolvement($data) {

        $output = array();
        $collection = array();

        $collection = $data->groupBy(['involvement', function($key, $value) {
        	return $value;
        }]);

        foreach ($collection as $key => $value) {
        	$output[$key]= count($value);
        }

        return $output;
    }

    public function getEmployeeCountPerDepartment($data) {

        $output = array();
        $collection = array();

        $collection = $data->groupBy(['involvement', function($key, $value) {
        	return $key->department;
        }]);

        foreach ($collection as $key => $value) {
        	foreach ($value as $a => $b) {
        		$output[$key][$a] = count($b);
        	}
        }

        return $output;
    }

    public function getEmployeeCountPerCategory($data) {

        $output = array();
        $collections = array();

        $collections = $data->groupBy(['involvement','department', 'category', function($key, $item) {
        	return $key->id;
        }]);

        foreach ($collections as $involvementKey => $departments) {
        	foreach ($departments as $departmentKey => $categories) {
                foreach ($categories as $categoryKey => $category) {
                    $output[$involvementKey][$departmentKey][$categoryKey] = count($category);
                }
        	
        	}
        }

        return $output;
    }

}
