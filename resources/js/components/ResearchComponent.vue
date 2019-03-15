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

    function setResearchData(researchArr) {
	    var perResearch = [];
	    $.each(researchArr, function(key, value) {
	        perResearch.push({
	            "name": key, "y": value
	        })
	    });

	    return perResearch;
	}

	function setDashboard(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/research-data",
            method:'GET',
            dataType: 'json',
            success:function(research){
                
                var perResearch = setResearchData(research);
                console.log(perResearch)

                // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Research'
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
                        name: 'Count',
                        colorByPoint: true,
                        data: perResearch
                    }]
                });
            }
        });
    }

</script>