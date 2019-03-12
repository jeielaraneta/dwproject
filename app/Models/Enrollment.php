<?php

namespace dwproject\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
	use Notifiable;

	public $table = 'enrollment';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year', 'semester', 'college', 'course'
    ];

    public function setDataModel($countPerSchoolYear, $countPerSemester, $countPerCollege, $countPerCourses) {
        
        $output = array(
            'school_year' => $countPerSchoolYear,
            'semester' => $countPerSemester,
            'college' => $countPerCollege,
            'courses' => $countPerCourses
        );
        return $output;
    }

    public function getData(){
        $data = Enrollment::get();
        return $data;
    }

    public function getUniqueSchoolYear($data) {
        
        $rows = $data->unique('school_year');
        $schoolYearsArr = array();

        foreach ($rows as $row => $value) {
            $schoolYearsArr[] = $value->school_year;
        }

        return $schoolYearsArr;
    }

    public function getUniqueSemester($data) {
        
        $rows = $data->unique('semester');
        $semestersArr = array();

        foreach ($rows as $row => $value) {
            $semestersArr[] = $value->semester;
        }

        return $semestersArr;
    }

    public function getUniqueCollege($data) {
        
        $rows = $data->unique('college');
        $collegesArr = array();

        foreach ($rows as $row => $value) {
            $collegesArr[] = $value->college;
        }

        return $collegesArr;
    }

    public function getUniqueCourse($data, $collegeArr) {

        $coursesArr = array();
        foreach ($collegeArr as $college) {
            $rows = $data->unique('course')->where('college', $college);
            foreach ($rows as $row => $value) {
                $coursesArr[$college][] = $value->course;
            }
        }
        return $coursesArr;
    }

    public function getEnrollmentCountPerSchoolYear($data, $valueArr) {

        $output = array();
        foreach ($valueArr as $key) {
            $output[$key] = $data->where('school_year', $key)->count();
        }

        return $output;
    }

    public function getEnrollmentCountPerSemester($data, $schoolYearArr, $semesterArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                $output[$schoolYear][$semester] = $data->where('school_year', $schoolYear)->where('semester', $semester)->count();
            }
        }

        return $output;
    }

    public function getEnrollmentCountPerCollege($data, $schoolYearArr, $semesterArr, $collegeArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                foreach ($collegeArr as $college) {
                    $output[$schoolYear][$semester][$college] = $data->where('school_year', $schoolYear)
                                                                     ->where('semester', $semester)
                                                                     ->where('college', $college)->count();
                }
            }
        }

        return $output;
    }

    public function getEnrollmentCountPerCourse($data, $schoolYearArr, $semesterArr, $courseArr) {

        $output = array();
        foreach ($schoolYearArr as $schoolYear) {
            foreach ($semesterArr as $semester) {
                foreach ($courseArr as $college => $courses) {
                    foreach ($courses as $course) {
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
