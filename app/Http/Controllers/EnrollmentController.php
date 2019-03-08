<?php

namespace dwproject\Http\Controllers;

use Illuminate\Http\Request;
use dwproject\Models\Enrollment;
use Illuminate\Database\Eloquent\Collection;

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
        $data = $this->enrollment->getData();

        $uniqueSchoolYears = $this->enrollment->getUniqueSchoolYear($data);
        $uniqueSemesters = $this->enrollment->getUniqueSemester($data);
        $uniqueColleges = $this->enrollment->getUniqueCollege($data);
        $uniqueCourses = $this->enrollment->getUniqueCourse($data, $uniqueColleges);

        $countPerSchoolYear = $this->enrollment->getEnrollmentCountPerSchoolYear($data, $uniqueSchoolYears);
        $countPerSemester = $this->enrollment->getEnrollmentCountPerSemester($data, $uniqueSchoolYears, $uniqueSemesters);
        $countPerCollege = $this->enrollment->getEnrollmentCountPerCollege($data, $uniqueSchoolYears, $uniqueSemesters, $uniqueColleges);
        $countPerCourses = $this->enrollment->getEnrollmentCountPerCourse($data, $uniqueSchoolYears, $uniqueSemesters, $uniqueCourses);
        
        $output = $this->enrollment->setDataModel($countPerSchoolYear, $countPerSemester, $countPerCollege, $countPerCourses);

        return view('enrollment', ['data' => $output]);
    }

}
