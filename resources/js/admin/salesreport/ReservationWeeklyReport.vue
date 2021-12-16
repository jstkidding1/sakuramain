<script>
import VueCharts from 'vue-chartjs';
import { Pie, Bar, Line, mixins } from 'vue-chartjs';

export default {
    mixins: [mixins.reactiveData],
    data() {
        return {
            chartData: '',
            dates: [],
            errors: [],
            options: {
                scales: {
                    yAxes: [
                        {
                            type: 'linear',
                            ticks: {
                                beginAtZero: true,
                                steps: 1,
                                stepValue: 1,
                                max: 10,
                                min: 0
                            }
                        }
                    ]
                }
            }
        };
    },
    extends: Line,
    mounted() {
        this.renderChart(this.chartData, this.options);
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            let Weeks = [];
            let Data = [];
            axios
                .get('/api/weeklyReservationReport')
                .then(response => {
                    $.each(response.data, function(key, value) {
                        Weeks.push(key);
                        Data.push(value);
                        // console.log(key);
                        // console.log(value);
                    });
                    this.chartData = {
                        labels: Weeks,
                        datasets: [
                            {
                                label: 'Weekly Sales',
                                // fill: false,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255,99,132,1)',
                                tension: 0.1,
                                data: Data
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
