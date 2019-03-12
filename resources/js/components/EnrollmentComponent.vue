<template>
    <div class="container" id="container"></div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            setDashboard()
        }
    }
       
    function setPerCourseData(enrollmentArr) {
        var perCourse = [];
        $.each(enrollmentArr, function(schoolYear, semester) {
            $.each(semester, function(sem, college) {
                $.each(college, function(college, course) {

                    var sy = removeSpecialCharSchoolYear(schoolYear)
                    var dataArray = [];
                    var stringSem = (sem == '0') ? 'S' : (sem == '1') ? 'FS' : 'SS';

                    $.each(course, function(key, value) {
                        dataArray.push({
                            "name": key, 
                            "y": value
                        });
                    })

                    perCourse.push({ 
                        "id":stringSem+sy+setLastDrilldownId(college),
                        "name": "Per Course",
                        "data": dataArray 
                    });
                    
                })
            })
        })
        return perCourse;
    }

    function setPerCollegeData(enrollmentArr) {
        
        var perCollege = [];
        $.each(enrollmentArr, function(schoolYear, semester) {
            $.each(semester, function(sem, college) {

                var sy = removeSpecialCharSchoolYear(schoolYear)
                var dataArray = [];
                var stringSem = (sem == '0') ? 'S' : (sem == '1') ? 'FS' : 'SS';

                $.each(college, function(key, value){
                    dataArray.push({
                        "name": key, 
                        "y": value,
                        "drilldown": stringSem+sy+setLastDrilldownId(key)
                    });
                })

                perCollege.push({ 
                    "id":stringSem+sy,
                    "name": "Per College",
                    "data": dataArray 
                });
                
            });
        });

        return perCollege;
    }

    function setPerSemesterData(enrollmentArr) {
        var perSemester = [];
        $.each(enrollmentArr, function(key, value){
            var sy = removeSpecialCharSchoolYear(key)
            perSemester.push({ 
                "id":key, 
                "name": "Per Semester", 
                "data": [{
                            "name": "Summer",
                            "y": value[0],
                            "drilldown": "S"+sy
                        }, {
                            "name": "First Semester",
                            "y": value[1],
                            "drilldown": "FS"+sy
                        }, {
                            "name": "Second Semester",
                            "y": value[2],
                            "drilldown": "SS"+sy
                        }]
            });
        });
        return perSemester;
    }

    function setPerSchoolYearData(enrollmentArr) {
        var perSchoolYear = [];
        $.each(enrollmentArr, function(key, value) {
            perSchoolYear.push({
                "name": key, "y": value, "drilldown": key
            })
        });

        return perSchoolYear;
    }

    function setDashboard(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/enrollment-data",
            method:'GET',
            dataType: 'json',
            success:function(enrollment){
                
                var perSchoolYear = setPerSchoolYearData(enrollment.school_year);
                var perSemester = setPerSemesterData(enrollment.semester);
                var perCollege = setPerCollegeData(enrollment.college);
                var perCourse = setPerCourseData(enrollment.courses);

                // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Enrollment Population'
                    },
                    xAxis: {
                        type: 'category'
                    },

                    legend: {
                        enabled: false
                    },

                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },

                    series: [{
                        name: 'Per School Year',
                        colorByPoint: true,
                        data: perSchoolYear
                    }],
                    drilldown: {
                            series: perSemester.concat(perCollege, perCourse)
                        }
                });
            }
        });
    }

    function setLastDrilldownId(college) {
        
        if(college.match(' ')) {
            var idArr = [];
            var words = college.split(' ')

            $.each(words, function(key, value) {
                idArr.push(value.toUpperCase().charAt(0))
            })

            return idArr.join('');

        } else {
            var id = college.substr(0,4);
            return id;
        }
        
    }

    function removeSpecialCharSchoolYear(schoolYear) {
        var newSchoolYear = schoolYear.replace('-', '')
        return newSchoolYear;
    }

</script>
