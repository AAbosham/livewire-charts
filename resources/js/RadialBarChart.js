
const RadialBarChart = () => {
    return {
        chart: null,

        drawChart(component) {
            if (this.chart) {
                this.chart.destroy()
            }

            const animated = component.get('radialBarChartModel.animated') || false;
            const dataLabels = component.get('radialBarChartModel.dataLabels') || {};
            const data = component.get('radialBarChartModel.data');
            const sparkline = component.get('radialBarChartModel.sparkline');

            const options = {
              series: [data.map(item => item.value)],
              colors: data.map(item => item.color),
                chart: {
                type: 'radialBar',
                offsetY: -20,
                sparkline: sparkline
              },
              plotOptions: {
                radialBar: {
                  startAngle: -90,
                  endAngle: 90,
                  track: {
                    background: "#e7e7e7",
                    strokeWidth: '97%',
                    margin: 5, // margin is in pixels
                    dropShadow: {
                      enabled: true,
                      top: 2,
                      left: 0,
                      color: '#999',
                      opacity: 1,
                      blur: 2
                    }
                  },
                  dataLabels: {
                    name: {
                      show: false,
                    },
                    value: {
                      show: true,
                      // fontSize: '50px',
                      offsetY: 0,
                      fontWeight: 600,
                      formatter: function (val) {
                        return val 
                      }
                    },
                    // total: {
                    //   show: true,
                    //   label: 'Total',
                    //   color: '#373d3f',
                    //   fontSize: '400px',
                    //   // fontFamily: undefined,
                    //   fontWeight: 600,
                    //   formatter: function () {
                    //     return 120
                    //   }
                    // }
                  }
                }
              },
              grid: {
                padding: {
                  top: -10
                }
              },
              fill: {
                type: 'gradient',
                gradient: {
                  shade: 'light',
                  shadeIntensity: 0.4,
                  inverseColors: false,
                  opacityFrom: 1,
                  opacityTo: 1,
                  stops: [0, 50, 53, 91]
                },
              },
              labels: component.get('radialBarChartModel.title'),
            };

            this.chart = new ApexCharts(this.$refs.container, options);
            this.chart.render();
        }
    }
}

export default RadialBarChart
