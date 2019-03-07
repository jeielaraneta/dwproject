<?php

namespace dwproject\Http\Controllers;

use Illuminate\Http\Request;
use dwproject\Models\Enrollment;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Support\Collection;

class EnrollmentController extends Controller
{
    protected $enrollment;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Enrollment $e)
    {
        $this->middleware('auth');
        $this->enrollment = $e;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->enrollment->get();
        $uniqueSchoolYears = $this->getUniqueSchoolYear($data);

        $output = $this->getEnrollmentCount($data, 'school_year', $uniqueSchoolYears);
       
        //$data->unique('school_year')
        //return json_encode($data[0]);
        //$data = [];
      

        /*response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ])*/

        return $output;
        //return view('enrollment', ['data' => json_encode($data->countBy())]);
    }

    private function getUniqueSchoolYear($data) {
        
        $rows = $data->unique('school_year');
        $schoolYearsArr = array();

        foreach ($rows as $row => $value) {
            $schoolYearsArr[] = $value->school_year;
        }

        return $schoolYearsArr;
    }

    private function getEnrollmentCount($data, $tableColumn, $valueArr) {

        $output = array();
        foreach ($valueArr as $key) {
            $output[$key] = $data->where($tableColumn, $key)->count();
        }

        return $output;
    }


}
