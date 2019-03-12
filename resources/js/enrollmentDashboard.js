$(document).ready(function () {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function setPerCourseData(enrollmentArr) {
    	
    }

    function setPerCollegeData(enrollmentArr) {
    	
    	var perCollege = [];
    	$.each(enrollmentArr, function(schoolYear, semester) {
    		$.each(semester, function(sem, college) {

    			var dataArray = [];
    			var stringSem = (sem == '0') ? 'summer' : (sem == '1') ? 'firstSem' : 'secondSem';

    			$.each(college, function(key, value){
    				dataArray.push({"name": key, "y": value});
    			})

    			perCollege.push({ "id":stringSem+schoolYear, "data": dataArray });
    			
    		});
    	});
    	return perCollege;
    }

    function setPerSemesterData(enrollmentArr) {
    	var perSemester = [];
    	$.each(enrollmentArr, function(key, value){
    		perSemester.push({ 
    			"id":key, 
    			"name": "Population", 
    			"data": [{
		    				"name": "Summer",
		    				"y": value[0],
		    				"drilldown": "summer"+key
		    			}, {
		    				"name": "First Semester",
		    				"y": value[1],
		    				"drilldown": "firstSem"+key
		    			}, {
		    				"name": "Second Semester",
		    				"y": value[2],
		    				"drilldown": "secondSem"+key
		    			}]
    		});
    	});
    	return perSemester;
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
	
	function setPerSchoolYearData(enrollmentArr) {
    	var perSchoolYear = [];
    	$.each(enrollmentArr, function(key, value) {
    		perSchoolYear.push({
    			"name": key, "y": value, "drilldown": key
    		})
    	});

    	return perSchoolYear;
    }
    
})
