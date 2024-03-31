var options = {
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    },],
    chart: {
        type: 'bar',
        height: 500
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '35%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
    },


    fill: {
        opacity: 1,
        colors: ['#D8C081', '#6F59A4']
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();