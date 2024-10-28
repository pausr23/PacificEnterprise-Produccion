document.addEventListener('DOMContentLoaded', function () {
    const earningsView = document.getElementById('earningsView');
    const earningsChartContainer = document.getElementById('earningsChartContainer');
    const ordersView = document.getElementById('ordersView');
    const ordersChartContainer = document.getElementById('ordersChartContainer');
    const toggleSwitch = document.getElementById('toggleSwitch');

    earningsView.style.display = 'block';
    earningsChartContainer.style.display = 'none';
    ordersView.style.display = 'block';
    ordersChartContainer.style.display = 'none';

    let earningsChart;
    let ordersChart;

    const earningsData = window.earningsData;
    const ordersData = window.ordersData;
    const labels = window.labels;

    function setChartContainerHeight() {
        if (window.innerWidth >= 1024) {
            earningsChartContainer.style.height = '250px';
            ordersChartContainer.style.height = '250px';
        } else {
            earningsChartContainer.style.height = '300px';
            ordersChartContainer.style.height = '300px';
        }
    }

    function createCharts() {
        const ctxEarnings = document.getElementById('earningsChart').getContext('2d');
        earningsChart = new Chart(ctxEarnings, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ganancias',
                    data: earningsData,
                    borderColor: 'rgba(205, 160, 203, 1)',
                    backgroundColor: 'rgba(205, 160, 203, 0.2)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxOrders = document.getElementById('ordersChart').getContext('2d');
        
        const integerOrdersData = ordersData.map(Math.floor);
        
        ordersChart = new Chart(ctxOrders, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Pedidos',
                    data: integerOrdersData,
                    backgroundColor: 'rgba(255, 255, 159, 0.8)',
                    borderColor: 'rgba(255, 255, 159, 100)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }

    setChartContainerHeight();
    createCharts();

    toggleSwitch.addEventListener('change', function () {
        if (this.checked) {
            earningsView.style.display = 'none';
            earningsChartContainer.style.display = 'block';
            ordersView.style.display = 'none';
            ordersChartContainer.style.display = 'block';
        } else {
            earningsView.style.display = 'block';
            earningsChartContainer.style.display = 'none';
            ordersView.style.display = 'block';
            ordersChartContainer.style.display = 'none';
        }
    });

    window.addEventListener('resize', setChartContainerHeight);
});
