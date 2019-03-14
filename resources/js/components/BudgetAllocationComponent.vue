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

    function setPerSchoolYearData(budgetAllocationArr) {
	    var perSchoolYear= [];
	    $.each(budgetAllocationArr, function(key, value) {
	        perSchoolYear.push({
	            "name": key, "y": value, "drilldown": removeSpecialCharSchoolYear(key)
	        })
	    });

	    return perSchoolYear;
	}

	function setPerDepartmentData(budgetAllocationArr) {
        var perDepartment = [];
        $.each(budgetAllocationArr, function(schoolYear, departments){
  			var dataArray = [];

  			$.each(departments, function(key, value) {
  				dataArray.push({
  					"name": key,
                    "y": value
  				})
  			});

            perDepartment.push({ 
                "id":removeSpecialCharSchoolYear(schoolYear),
                "name": "Per Department", 
                "data": dataArray
            });
        });

        return perDepartment;
    }

	function setDashboard(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/budget-data",
            method:'GET',
            dataType: 'json',
            success:function(budgetAllocation){
                
                var perSchoolYear = setPerSchoolYearData(budgetAllocation.sy);
                var perDepartment = setPerDepartmentData(budgetAllocation.department);
             
                // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Budget Allocation'
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
                        series: perSchoolYear.concat(perDepartment)
                    }
                });
            }
        });
    }

    function removeSpecialCharSchoolYear(schoolYear) {
        var newSchoolYear = schoolYear.replace('-', '')
        return newSchoolYear;
    }

</script>