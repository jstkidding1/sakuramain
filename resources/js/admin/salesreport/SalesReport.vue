<template>
    <div>
        <line-chart :data="{ '2017-01-01': 11, '2017-01-02': 6 }"></line-chart>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            vehicles: [],
            chartData: {
                '2017-05-13': 2,
                '2017-05-14': 5,
                '2017-05-15': 4
            }
            // products: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getVehicles();
        // this.getProducts();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getVehicles() {
            axios
                .get('api/vehicle')
                .then(response => {
                    this.vehicles = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        // getProducts() {
        //     axios
        //         .get('/api/products/')
        //         .then(response => {
        //             this.products = response.data;
        //         })
        //         .catch(error => {
        //             console.error(error);
        //         });
        // }
    }
};
</script>

<style></style>
