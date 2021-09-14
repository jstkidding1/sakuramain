<script>
import VueCharts from 'vue-chartjs';
import { Line, mixins } from 'vue-chartjs';

export default {
    mixins: [mixins.reactiveData],
    data() {
        return {
            chartData: [],
            options: {
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                                responsive: false,
                                maintainAspectRatio: true
                            }
                        }
                    ],
                    xAxes: [
                        {
                            gridLines: {
                                display: false
                            }
                        }
                    ]
                },
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        };
    },
    extends: Line,
    mounted() {
        this.renderChart(this.chartData, this.options);
    },
    created() {
        this.getReservation();
    },
    methods: {
        getReservation() {
            axios
                .get('api/chart')
                .then(response => {
                    console.log(response.data);
                    this.chartData = {
                        labels: [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                        ],
                        datasets: [
                            {
                                label: response.data.labelOrders,
                                backgroundColor: 'rgb(54, 162, 235, 0.6)',
                                data: response.data.total
                            }
                        ]
                    };
                })
                .catch(e => {
                    this.errors.push(e);
                });
        }
    }
};
</script>

<style>
.small {
    max-width: 600px;
    margin: 150px auto;
}
</style>
