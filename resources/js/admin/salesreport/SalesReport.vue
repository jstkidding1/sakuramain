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
    // watch: {
    //     chartData(to, from) {
    //         this.renderChart(this.chartData);
    //     }
    // },
    created() {
        this.getReservation();
    },
    methods: {
        getReservation() {
            axios
                .get(`api/chart`)
                .then(response => {
                    // const responseData = response.data;
                    console.log(response.data);

                    this.chartData = {
                        labels: ['Users'],
                        datasets: [
                            {
                                label: 'Admin',
                                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                                data: response.data.roleAdmin
                            },
                            {
                                label: 'Secretary',
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                data: response.data.roleSecretary
                            },
                            {
                                label: 'Manager',
                                backgroundColor: 'rgba(255, 206, 86, 0.6)',
                                data: response.data.roleManager
                            },
                            {
                                label: 'Customer',
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                data: response.data.roleCustomer
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
