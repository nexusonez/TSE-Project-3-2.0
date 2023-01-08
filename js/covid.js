// Covid API
fetch('https://disease.sh/v3/covid-19/countries/Malaysia')

.then((response)=>{
	return response.json();
})

.then((data)=>{
	document.getElementById("flag").src = data.countryInfo.flag;
	document.getElementById("cases").innerHTML = data.cases;
	document.getElementById("recovered").innerHTML = data.recovered;
	document.getElementById("deaths").innerHTML = data.deaths;
})



const ctx = document.getElementById("axes_line_chart").getContext("2d");

fetch('https://api.covid19api.com/total/country/malaysia/status/confirmed')
let my_chart;
function axesLinearChart() {
	
	 my_chart = new Chart(ctx, {
		type: "line",
    data: {
        datasets: [
		{
            label: "First dataset",
            data: [0, 20, 40, 50],
			fill: false,
			borderColor: "#FFF",
			backgroundColor: "#FFF",
			borderWidth: 1,
        },
		],
        labels: ['January', 'February', 'March', 'April']
    },
    options: {
        responsive: true,
		maintainAspectRatio: false,
        
    },
});

}