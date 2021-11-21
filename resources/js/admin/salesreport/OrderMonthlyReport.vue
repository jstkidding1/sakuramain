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
                                responsive: false,
                                maintainAspectRatio: false
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
            let Months = [];
            let Data = [];
            axios
                .get('/api/monthlyChart')
                .then(response => {
                    $.each(response.data, function(key, value) {
                        Months.push(key);
                        Data.push(value);
                        // console.log(key);
                        // console.log(value);
                    });
                    this.chartData = {
                        labels: Months,
                        datasets: [
                            {
                                label: 'Monthly Sales',
                                // fill: false,
                                backgroundColor: 'rgba(255,99,71, 0.2)',
                                borderColor: 'rgba(255,99,71, 1)',
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
