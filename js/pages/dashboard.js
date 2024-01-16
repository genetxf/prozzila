// let category_options = {
//     series: [44, 55, 41, 17],
//     labels: ['Cloths', 'Devices', 'Bags', 'Watches'],
//     chart: {
//         type: 'donut',
//     },
//     colors: ['#6ab04c', '#2980b9', '#f39c12', '#d35400']
// }

// let category_chart = new ApexCharts(document.querySelector("#category-chart"), category_options)
// category_chart.render()


let customer_options = {
    series: [{
        name: "completed",
        data: [40, 70, 20, 90, 36, 80, 30, 91, 60]
    }, {
        name: "in_progress",
        data: [10, 30, 50, 20, 76, 40, 20, 51, 10]
    }],
    colors: ['#3C21F7', '#FFCA1F'],
    chart: {
        height: 300,
        type: 'line',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    },


}

let customer_chart = new ApexCharts(document.querySelector("#customer-chart"), customer_options)
customer_chart.render()

// Fetch data from JSON file using AJAX
fetch('data.json')
    .then(response => response.json())
    .then(data => {
        // Update the chart data with the received data
        customer_chart.updateSeries([
            { data: data.completed },
            { data: data.in_progress }
        ]);

        // Update x-axis categories if available in the data
        if (data.categories) {
            customer_chart.updateOptions({
                xaxis: {
                    categories: data.categories
                }
            });
        }
    })
    .catch(error => console.error('Error fetching data:', error));
