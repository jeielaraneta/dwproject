$(document).ready(function () {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   

    function setPerCourseData(enrollmentArr) {
    	var perCourse = [];
    	$.each(enrollmentArr, function(schoolYear, semester) {
    		$.each(semester, function(sem, college) {
    			$.each(college, function(course, value) {

    			})
    		})
    	})
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
    			"name": "Population", 
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

    $.ajax({
        url:"/enrollment-data",
        method:'GET',
        dataType: 'json',
        success:function(enrollment){
           	console.log(enrollment);

           	var perSchoolYear = setPerSchoolYearData(enrollment.school_year);
           	var perSemester = setPerSemesterData(enrollment.semester);
           	var perCollege = setPerCollegeData(enrollment.college);
           	console.log(perSchoolYear);
           	console.log(perSemester);
           	console.log(perCollege);

           	//console.log(setLastDrilldownId('Engineering'))       

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
			        name: 'Population of Enrollees',
			        colorByPoint: true,
			        data: perSchoolYear
			    }],
			    drilldown: {
			            series: perSemester.concat(perCollege) /*[{
			                id: '2017-2018',
			                name: 'Population',
			                data: [{
			                        name: 'Summer',
			                        y: 200,
			                        drilldown: 'summer2018'
			                    }, {
			                        name: '1st Semester',
			                        y: 100,
			                        drilldown: 'firstSem2018'
			                    }, {
			                        name: '2nd Semester',
			                        y: 150,
			                        drilldown: 'secondSem2018'
			                    }
			                ]

			            }, {
			                id: '2018-2019',
			                name: 'Population',
			                data: [{
			                        name: 'Summer',
			                        y: 100,
			                        drilldown: 'summer2019'
			                    }, {
			                        name: '1st Semester',
			                        y: 300,
			                        drilldown: 'firstSem2019'
			                    }, {
			                        name: '2nd Semester',
			                        y: 200,
			                        drilldown: 'secondSem2019'
			                    }
			                ]

			            }, {
			                id: 'summer2019',
			                data: [{
			                    name: 'Engineering',
			                    y: 30
			                }, {
			                    name: 'Computer Studies',
			                    y: 30
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 10
			                }, {
			                    name: 'Education',
			                    y: 10
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 20
			                }]
			            }, {
			                id: 'firstSem2019',
			                data: [{
			                    name: 'Engineering',
			                    y: 150
			                }, {
			                    name: 'Computer Studies',
			                    y: 150
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 100
			                }, {
			                    name: 'Education',
			                    y: 100
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 100
			                }]
			            }, {
			                id: 'secondSem2019',
			                data: [{
			                    name: 'Engineering',
			                    y: 30
			                }, {
			                    name: 'Computer Studies',
			                    y: 30
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 40
			                }, {
			                    name: 'Education',
			                    y: 30
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 70
			                }]
			            }, {
			                id: 'summer2018',
			                data: [{
			                    name: 'Engineering',
			                    y: 30
			                }, {
			                    name: 'Computer Studies',
			                    y: 45
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 35
			                }, {
			                    name: 'Education',
			                    y: 25
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 65
			                }]
			            }, {
			                id: 'firstSem2018',
			                data: [{
			                    name: 'Engineering',
			                    y: 10
			                }, {
			                    name: 'Computer Studies',
			                    y: 20
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 30
			                }, {
			                    name: 'Education',
			                    y: 25
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 15
			                }]
			            }, {
			                id: 'secondSem2018',
			                data: [{
			                    name: 'Engineering',
			                    y: 10
			                }, {
			                    name: 'Computer Studies',
			                    y: 30
			                }, {
			                    name: 'Business and Public Administration',
			                    y: 50
			                }, {
			                    name: 'Education',
			                    y: 10
			                }, {
			                    name: 'Arts and Sciences',
			                    y: 50
			                }]
			            }]*/
			        }
			});
        }
    });

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
    
})
