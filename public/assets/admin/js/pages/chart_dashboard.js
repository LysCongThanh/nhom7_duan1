// const chartTypeOrders = document.querySelector('#chartType');
// const chartTypeProducts = document.querySelector('#chartTypeProducts');
let typeOfChart = 'bar'; // Default chart type
let currentChart = null;

// chartTypeOrders.addEventListener('change', () => {
//     const selectedOption = chartTypeOrders.options[chartTypeOrders.selectedIndex].value;
//     typeOfChart = selectedOption;

//     if (window.myChart) {
//         window.myChart.destroy();
//     }

//     ordersChart(typeOfChart);
// });

// chartTypeProducts.addEventListener('change', () => {
//     typeOfChart = chartTypeProducts.options[chartTypeProducts.selectedIndex].value;

//     if (window.myChart) {
//         window.myChart.destroy();
//     }

    

//     productsChart(typeOfChart);
// });

function ordersChart(chartType) {
    const xml = new XMLHttpRequest();
    const url = `${webRoot}/order/getStatisticsByMonth`; // Replace with the actual URL

    xml.open('GET', url, true);

    xml.onload = function () {
        if (true) {
            console.log('Existing chart destroyed.');
            const response = JSON.parse(xml.responseText);
            console.log(response);
            

            let labels = [];
            let datas = [];
            response.forEach(data => {
                labels.push(`Tháng ${data.monthNumber}`);
                datas.push(data.totalPrice);
            });
            const truncateLabelChars = labels.map(label => truncateLabel(label, 30));
            const dataOptions = {
                labels: truncateLabelChars,
                datasets: [{
                    label: 'Doanh thu',
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 2,
                    pointBackgroundColor: "#55A6F8",
                    borderColor: "#55C6F8",
                    borderWidth: 3,
                    backgroundColor: "rgba(85, 166, 248, 0.2)",
                    fill: true,
                    data: datas,
                    maxBarThickness: 6
                },
                ],
            }

            createChart('#chart-line', chartType, dataOptions);
        } else {
            console.error('Failed to fetch data. Status: ' + xml.status);
        }
    };

    xml.onerror = function () {
        console.error('Error making the request.');
    };

    xml.send();
}

function productsChart(chartType) {
    const xml = new XMLHttpRequest();
    const url = `${webRoot}/product/top_sale`; // Replace with the actual URL

    xml.open('GET', url, true);

    xml.onload = function () {
        if (xml.status >= 200 && xml.status < 300) {
            const response = JSON.parse(xml.responseText);
            console.log(response);
            let labels = [];
            let datas = {
                quantityTotal: [],
                totalPrice: [],
            };
            response.forEach(data => {
                labels.push(`Sản phẩm: ${data.name}`);
                datas.quantityTotal.push(data.total);
                datas.totalPrice.push(data.total_revenue);
            });
            const truncateLabelChars = labels.map(label => truncateLabel(label, 30));
            const dataOptions = {
                labels: truncateLabelChars,
                datasets: [{
                    label: 'Số lượng đã bán',
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 2,
                    pointBackgroundColor: "#55A6F8",
                    borderColor: "#55A6F8",
                    borderWidth: 3,
                    backgroundColor: "rgba(85, 166, 248, 0.2)",
                    fill: true,
                    data: datas.quantityTotal,
                    maxBarThickness: 6
                },{
                    label: 'Tổng doanh thu',
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 2,
                    pointBackgroundColor: "#55A6F8",
                    borderColor: "#774dd3",
                    borderWidth: 3,
                    backgroundColor: "rgba(85, 166, 248, 0.2)",
                    fill: true,
                    data: datas.totalPrice,
                    maxBarThickness: 6
                }
                ],
            }

            createChart('#chart-products', chartType, dataOptions);
        } else {
            console.error('Failed to fetch data. Status: ' + xml.status);
        }
    };

    xml.onerror = function () {
        console.error('Error making the request.');
    };

    xml.send();
}

function categoriesChart(chartType) {
    const xml = new XMLHttpRequest();
    const url = `${webRoot}/classify/categoriesStatistics`; // Replace with the actual URL

    xml.open('GET', url, true);

    xml.onload = function () {
        if (xml.status >= 200 && xml.status < 300) {
            const response = JSON.parse(xml.responseText);
            console.log(response);
            let labels = [];
            let datas = [];
            response.forEach(data => {
                labels.push(`Danh mục: ${data.category_name}`);
                datas.push(data.product_count);
            });
            const truncateLabelChars = labels.map(label => truncateLabel(label, 30));
            const dataOptions = {
                labels: truncateLabelChars,
                datasets: [{
                    label: 'Sản phẩm thuộc danh mục',
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 2,
                    pointBackgroundColor: "#55A6F8",
                    borderColor: "#55A6F8",
                    borderWidth: 3,
                    backgroundColor: "rgba(85, 166, 248, 0.2)",
                    fill: true,
                    data: datas,
                    maxBarThickness: 6
                }
                ],
            }

            createChart('#chart-categories', chartType, dataOptions);
        } else {
            console.error('Failed to fetch data. Status: ' + xml.status);
        }
    };

    xml.onerror = function () {
        console.error('Error making the request.');
    };

    xml.send();
}

// Initial chart creation
ordersChart(typeOfChart);
productsChart('line');
categoriesChart('pie');

// Function to create the chart
function createChart(chart, chartType, dataOptions) {
    if (document.querySelector(chart)) {
        const ctx2 = document.querySelector(chart).getContext("2d");


        window.myChart = new Chart(ctx2, {
            type: chartType,
            data: dataOptions,

            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            boxWidth: 6,
                            boxHeight: 6,
                            padding: 20,
                            pointStyle: 'circle',
                            borderRadius: 50,
                            usePointStyle: true,
                            font: {
                                weight: 600,
                            },
                        },
                        tooltip: {
                            backgroundColor: '#fff',
                            titleColor: '#1e293b',
                            bodyColor: '#1e293b',
                            borderColor: '#e9ecef',
                            borderWidth: 1,
                            pointRadius: 2,
                            usePointStyle: true,
                            boxWidth: 8,
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: true,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            borderDash: [5, 5]
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
}

getOrders({ value: 'All' });

function getOrders(req) {
    fetch(`${webRoot}/order/recent?status=${req.value}`, {
        method: 'get'
    })
        .then(response => response.json())
        .then(responseDatas => {

            datas = responseDatas;
            loadOrders(datas);

        })
        .catch(error => {
            // Xử lý lỗi nếu có
            console.error(error);
        });
}

const loadOrders = (datas) => {
    const ordersWrapper = document.querySelector('.orders_list');
    let template = '';
    ordersWrapper.innerHTML = '';

    totalItems = datas.length;
    if (totalItems === 0) {
        productsWrapper.innerHTML = '<h4 class="text-danger p-3 text-center">Trống</h4>';
        return;
    }

    datas.forEach((data) => {
        template += viewsOrders(data);
    });

    ordersWrapper.innerHTML = template;
}

if (document.getElementById('chart-bars')) {
    var ctx = document.getElementById("chart-bars").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderSkipped: false,
                backgroundColor: "#55A6F8",
                data: [450, 200, 100, 220, 500, 100, 400, 230, 500, 200],
                maxBarThickness: 6
            },
            {
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderSkipped: false,
                backgroundColor: "#774DD3",
                data: [200, 300, 200, 420, 400, 200, 300, 430, 400, 300],
                maxBarThickness: 6
            },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#1e293b',
                    bodyColor: '#1e293b',
                    borderColor: '#e9ecef',
                    borderWidth: 1,
                    usePointStyle: true
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    stacked: true,
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [4, 4],
                    },
                    ticks: {
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 12,
                            family: "Noto Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#64748B"
                    },
                },
                x: {
                    stacked: true,
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        font: {
                            size: 12,
                            family: "Noto Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#64748B"
                    },
                },
            },
        },
    });
}

function viewsOrders(data) {
    return `
    <tr>
    <td>
        <p class="mb-0 text-sm font-weight-normal">${data.name}</p>
    </td>
    <td>
        <div class="px-2 d-flex">
            <div class="my-auto">
                <h6 class="mb-0 text-sm">${data.status}</h6>
            </div>
        </div>
    </td>
    <td>
        <p class="mb-0 text-sm font-weight-normal">${formattedCurrency(data.total_price)}</p>
    </td>
    <td>
        <span class="text-sm font-weight-normal">${data.created_at}</span>
    </td>
    <td class="align-middle">
        <div class="d-flex">
            <div class="ms-4">
                <p class="mb-0 text-sm text-dark">${data.payment_method}</p>
                <p class="mb-0 text-sm text-secondary">${data.payment_method}</p>
            </div>
        </div>
    </td>
    <td class="align-middle">
        <a href="javascript:;" class="text-xs text-secondary font-weight-bold" data-bs-toggle="tooltip" data-bs-title="Edit user">
            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
            </svg>
        </a>
    </td>
</tr>
    `;
}

function truncateLabel(label, maxLength) {
    if (label.length > maxLength) {
        return label.substring(0, maxLength - 3) + "...";
    }
    return label;
}