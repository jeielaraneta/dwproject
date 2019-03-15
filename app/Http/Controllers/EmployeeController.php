<?php

namespace dwproject\Http\Controllers;

use Illuminate\Http\Request;
use dwproject\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeController extends Controller
{
    protected $employee;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Employee $e)
    {
        $this->middleware('auth');
        $this->employee = $e;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee');
    }

    public function showEmployeeData(){

        $data = $this->employee->getData();

        $countPerInvolvement = $this->employee->getEmployeeCountPerInvolvement($data);
        $countPerDepartment = $this->employee->getEmployeeCountPerDepartment($data);
        $countPerCategory = $this->employee->getEmployeeCountPerCategory($data);
        $countPerAcadRank = $this->employee->getEmployeeCountPerAcadRank($data);
        
        $output = $this->employee->setDataModel($countPerInvolvement, $countPerDepartment, $countPerCategory, $countPerAcadRank);

        return response()->json($output);
    }
}
