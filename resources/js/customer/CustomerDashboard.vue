<template>
    <div>
        <div class="bg-white w-full rounded-md p-4 shadow-md mt-4 mb-6">
            <h5 class="font-sans text-lg font-bold text-gray-800">
                My Dashboard
            </h5>
        </div>

        <div class="bg-white w-full rounded shadow-md p-4">
            <h5 class="font-sans text-lg font-bold text-gray-800">
                My Reservations
            </h5>
            <hr class="p-2 mt-2" />
            <div v-for="(reservation, index) in reservations" :key="index">
                <div class="space-x-4">
                    <div class="flex items-center space-y-4 mb-3">
                        <img
                            :src="reservation.vehicle.image"
                            alt=""
                            class="w-24 h-24"
                        />
                        <div class="ml-3 font-bold text-gray-800">
                            <div class="flex">
                                {{ reservation.vehicle.year_model }}
                                {{ reservation.vehicle.brand_name }}
                                {{ reservation.vehicle.engine }}
                                {{ reservation.vehicle.transmission }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <div>Read for more information</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-full rounded shadow-md p-4 mt-4">
            <h5 class="font-sans text-lg font-bold text-gray-800">
                My Orders
            </h5>
        </div>
        <div class="bg-white w-full rounded shadow-md p-4 mt-4">
            <h5 class="font-sans text-lg font-bold text-gray-800">
                My Appointments
            </h5>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            isLogged: null,
            reservations: [],
            vehicle: []
        };
    },
    // mounted() {
    //     this.isLogged = localStorage.getItem('jwt') != null;
    // },
    beforeMount() {
        this.fetchUser();
        this.fetchReservations();
    },
    methods: {
        fetchUser() {
            // if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
            // }
        },
        fetchReservations() {
            axios
                .get(`api/users/${this.user.id}/reservations`)
                .then(response => {
                    this.reservations = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
