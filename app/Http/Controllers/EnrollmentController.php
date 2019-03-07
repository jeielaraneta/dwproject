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
        $uniqueSemesters = $this->getUniqueSemester($data);
        $uniqueColleges = $this->getUniqueCollege($data);
        $uniqueCourses = $this->getUniqueCourse($data);

        $countPerSchoolYear = $this->getEnrollmentCountPerSchoolYear($data, $uniqueSchoolYears);
        $countPerSchoolYearSemester = $this->getEnrollmentCountPerSchoolYearSemester($data, $uniqueSchoolYears, $uniqueSemesters);
        $countPerSchoolYearSemesterCollge = $this->getEnrollmentCountPerSchoolYearSemesterCollege($data, $uniqueSchoolYears, $uniqueSemesters, $uniqueColleges);
        $countPerSchoolYearSemesterCollgeCourses = $this->getEnrollmentCountPerSchoolYearSemesterCollegeCourse($data, $uniqueSchoolYears, $uniqueSemesters, $uniqueColleges, $uniqueCourses);
       
        //$data->unique('school_year')
        //return json_encode($data[0]);
        //$data = [];
      

        /*response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ])*/

        return $countPerSchoolYearSemesterCollgeCourses;
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

    private function getUniqueSemester($data) {
        
        $rows = $data->unique('semester');
        $semestersArr = array();

        foreach ($rows as $row => $value) {
            $semestersArr[] = $value->semester;
        }

        return $semestersArr;
    }

    private function getUniqueCollege($data) {
        
        $rows = $data->unique('college');
        $collegesArr = array();

        foreach ($rows as $row => $value) {
            $collegesArr[] = $value->college;
        }

        return $collegesArr;
    }

    private function getUniqueCourse($data) {
        
        $rows = $data->unique('course');
        $coursesArr = array();

        foreach ($rows as $row => $value) {
            $coursesArr[] = $value->course;
        }

        return $coursesArr;
    }

    private function getEnrollmentCountPerSchoolYear($data, $valueArr) {

        $output = array();
        foreach ($valueArr as $key) {
            $output[$key] = $data->where('school_year', $key)->count();
        }

        return $output;
    }

    private function getEnrollmentCountPerSchoolYearSemester($data, $schoolYearArr, $semesterArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                $output[$schoolYear][$semester] = $data->where('school_year', $schoolYear)->where('semester', $semester)->count();
            }
        }

        return $output;
    }

    private function getEnrollmentCountPerSchoolYearSemesterCollege($data, $schoolYearArr, $semesterArr, $collgeArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                foreach ($collgeArr as $collge) {
                    $output[$schoolYear][$semester][$collge] = $data->where('school_year', $schoolYear)
                                                                    ->where('semester', $semester)
                                                                    ->where('college', $collge)->count();
                }
            }
        }

        return $output;
    }

    private function getEnrollmentCountPerSchoolYearSemesterCollegeCourse($data, $schoolYearArr, $semesterArr, $collgeArr, $courseArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                foreach ($collgeArr as $college) {
                    foreach ($courseArr as $course) {
                        $output[$schoolYear][$semester][$college][$course] = $data->where('school_year', $schoolYear)
                                                                    ->where('semester', $semester)
                                                                    ->where('college', $college)
                                                                    ->where('course', $course)->count();
                    }
                    
                }
            }
        }

        return $output;
    }


}
