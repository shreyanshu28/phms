const ctx = document.getElementById("myChart").getContext("2d");

//TODO: Add Ajax in ordermodel to fetch order reports.

let gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "rgba(58,123,213,1)");
gradient.addColorStop(1, "rgba(0,210,255,0.3)");

const labels = [
  "2012",
  "2013",
  "2014",
  "2015",
  "2016",
  "2017",
  "2018",
  "2019",
  "2020",
];

const data = {
  labels,
  datasets: [
    {
      data: [211, 326, 165, 350, 420, 370, 500, 375, 415],
      labels: "Minecrafty Sales",
      fill: true,
      backgroundColor: gradient,
      borderColor: "#fff",
      pointBackgroundColor: "rgb(189,195,199)",
      tension: 0.4,
    },
  ],
};

const config = {
  type: "line",
  data: data,
  options: {
    radius: 5,
    hitRadius: 30,
    hoverRadius: 12,
    responsive: true,

    scales: {
      y: {
        ticks: {
          callback: function (value) {
            return "$" + value + "m"; //dollar 400million
          },
        },
      },
    },
  },
};

const myChart = new Chart(ctx, config);
