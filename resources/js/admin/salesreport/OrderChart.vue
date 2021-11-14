<script>
import VueCharts from 'vue-chartjs';
import { Line, Bar, mixins } from 'vue-chartjs';

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
                .get('api/graph')
                .then(response => {
                    console.log('success', response.data);
                    this.chartData = {
                        datasets: [
                            {
                                label: ['Daily', 'Weekly', 'Monthly'],
                                backgroundColor: 'rgb(54, 162, 235, 0.6)',
                                data: response.data.count
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
