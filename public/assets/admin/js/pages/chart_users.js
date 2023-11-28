

// Pie chart
var ctx4 = document.getElementById("pie-chart").getContext("2d");

new Chart(ctx4, {
    type: "pie",
    data: {
        labels: ['/Người Dùng', '/Đánh Giá', '/Mua Hàng', '/Tổng Tiền'],
        datasets: [{
            label: "Projects",
            weight: 9,
            cutout: 0,
            tension: 0.9,
            pointRadius: 2,
            borderWidth: 0.5,
            backgroundColor: ['#165DFF', '#5B8DFF', '#A3BFFF'],
            data: [countUsers.nguoidung, countReviews.danhgia, countOrders.giaodich, 3],
            fill: false
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                },
                ticks: {
                    display: false
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                },
                ticks: {
                    display: false,
                }
            },
        },
    },
});

// Bar chart

if(document.getElementById('bar-chart')) {
    var ctx5 = document.getElementById("bar-chart").getContext("2d");
new Chart(ctx5, {
    type: "bar",
    data: {
        labels: ['Google', 'Facebook', 'Twitter', 'TikTok', 'Instagram'],
        datasets: [{
            label: "Percentage",
            weight: 5,
            borderWidth: 0,
            borderRadius: 4,
            backgroundColor: ['#165DFF', '#4878FF', '#7197FE', '#9AB3FF', '#C2D1FC'],
            data: [44.45, 20.25, 14.45, 10.45, 9.03],
            fill: false,
            maxBarThickness: 60
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: true,
                    drawTicks: false,
                },
                ticks: {
                    display: false,
                    padding: 10,
                    color: '#9ca2b7'
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: true,
                    drawTicks: true,
                },
                ticks: {
                    display: true,
                    color: '#9ca2b7',
                    padding: 10
                }
            },
        },
    },
});
}
