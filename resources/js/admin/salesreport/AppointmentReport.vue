<script>
import VueCharts from 'vue-chartjs';
import { Bar, mixins } from 'vue-chartjs';

export default {
    mixins: [mixins.reactiveData],
    data() {
        return {
            chartData: [],
            options: {
                scales: {
                    yAxes: [
                        {
                            type: 'linear',
                            ticks: {
                                beginAtZero: true,
                                responsive: false,
                                maintainAspectRatio: true
                            }
                        }
                    ]
                }
            }
        };
    },
    extends: Bar,
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
                        labels: ['Status'],
                        datasets: [
                            {
                                label: response.data.labelPending,
                                backgroundColor: 'rgb(255, 205, 86, 0.6)',
                                data: response.data.appointmentPending
                            },
                            {
                                label: response.data.labelApprove,
                                backgroundColor: 'rgb(75, 192, 192, 0.6)',
                                data: response.data.appointmentApproved
                            },
                            {
                                label: response.data.labelChecked,
                                backgroundColor: 'rgb(54, 162, 235, 0.6)',
                                data: response.data.appointmentChecked
                            },
                            {
                                label: response.data.labelInProgress,
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                data: response.data.appointmentInProgress
                            },
                            {
                                label: response.data.labelDeclined,
                                backgroundColor: 'rgb(255, 99, 132, 0.6)',
                                data: response.data.appointmentDeclined
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
