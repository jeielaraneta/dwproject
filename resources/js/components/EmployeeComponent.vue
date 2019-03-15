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

    function setPerInvolvementData(involvementArr) {
	    var perInvolvement= [];
	    $.each(involvementArr, function(key, value) {
	        perInvolvement.push({
	            "name": (key == 'NT') ? 'Non-Teaching' : 'Teaching', "y": value, "drilldown": key
	        })
	    });

	    return perInvolvement;
	}

	function setPerDepartmentData(employeeArr) {
        var perDepartment = [];
        $.each(employeeArr, function(involvements, departments){
  			var dataArray = [];

  			$.each(departments, function(key, value) {

  				var dept = removeSpaces(key);
  				dataArray.push({
  					"name": key,
                    "y": value,
                    "drilldown": involvements+dept
  				})
  			});

            perDepartment.push({ 
                "id":involvements, 
                "name": "Per Department", 
                "data": dataArray
            });
        });
        return perDepartment;
    }

    function setPerCategoryData(employeeArr) {
        var perCategory = [];
        $.each(employeeArr, function(involvements, departments){
  			$.each(departments, function(department, categories) {

  				var dataArray = [];
  				var dept = removeSpaces(department);

  				$.each(categories, function(key, value) {
	  				dataArray.push({
	  					"name": key,
	                    "y": value,
	                    "drilldown": dept+key
	  				})
	  			})

	  			perCategory.push({ 
	                "id":involvements+dept,
	                "name": "Per Category", 
	                "data": dataArray
	            });

  			});
        });

        return perCategory;
    }

    function setPerAcadRankData(employeeArr) {
        var perAcadRank = [];
        $.each(employeeArr, function(departments, department){
  			$.each(department, function(categories, category) {

  				var dataArray = [];
  				var dept = removeSpaces(departments);

  				$.each(category, function(key, value) {
	  				dataArray.push({
	  					"name": key,
	                    "y": value
	  				})
	  			})

	  			perAcadRank.push({ 
	                "id": dept+categories,
	                "name": "Per Academic Rank", 
	                "data": dataArray
	            });
  			});
        });

        return perAcadRank;
    }
       
    function setDashboard(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/employee-data",
            method:'GET',
            dataType: 'json',
            success:function(employee){
                
                var perInvolvement = setPerInvolvementData(employee.involvement);
                var perDepartment = setPerDepartmentData(employee.department);
                var perCategory = setPerCategoryData(employee.category);
                var perAcadRank = setPerAcadRankData(employee.academic_rank);

                // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Employee Population'
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
                        name: 'Per Involvement',
                        colorByPoint: true,
                        data: perInvolvement
                    }],
                    drilldown: {
                            series: perDepartment.concat(perCategory, perAcadRank)
                        }
                });
            }
        });
    }

    function removeSpaces(text) {
        var result = text.replace(/ /g, '')
        return result;
    }

</script>
