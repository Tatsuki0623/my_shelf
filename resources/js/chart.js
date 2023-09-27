import Chart from "chart.js/auto";

const ctx = document.getElementById("myChart");

var date = [];
var read_times =[];
read_times_data.data.forEach((items) => date.push(items.created_at.split('T')[0]))
read_times_data.data.forEach((items) => read_times.push(items.read_time))

console.log(date);

const myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: date.reverse(),
        datasets: [
            {
                label: "# of Votes",
                data: read_times.reverse(),
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                ],
            },
        ],
    },
});