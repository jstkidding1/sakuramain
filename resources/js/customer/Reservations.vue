<template>
    <div class="container">
        <h5 class="text-lg text-gray-800 font-bold">My Reservations</h5>
        <table class="w-full mt-4 table-hover">
            <thead class="bg-white">
                <tr
                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                >
                    <!-- <th class="px-4 py-3">#</th> -->
                    <th class="px-4 py-3">Vehicles</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Contact #</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody
                v-if="reservations && reservations.length > 0"
                class="bg-white"
            >
                <tr
                    v-for="(reservation, index) in reservations"
                    :key="index"
                    class="text-gray-700"
                >
                    <!-- <td class="px-4 py-3 border">
                                        <div class="flex items-center text-md">
                                            <p class="font-semibold text-black">
                                                {{ index + 1 }}
                                            </p>
                                        </div>
                                    </td> -->
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                            <div
                                class="relative w-8 h-8 mr-3 rounded-full md:block"
                            >
                                <img
                                    class="object-cover w-full h-full rounded-full"
                                    :src="
                                        `/images/${reservation.vehicle.thumbnail}`
                                    "
                                    alt=""
                                    loading="lazy"
                                />
                                <div
                                    class="absolute inset-0 rounded-full shadow-inner"
                                    aria-hidden="true"
                                ></div>
                            </div>
                            <div>
                                <p class="font-semibold text-black">
                                    {{ reservation.vehicle.brand_name }}
                                </p>
                                <p class="text-xs text-gray-600">
                                    {{ reservation.vehicle.year_model }}
                                    {{ reservation.vehicle.model_type }}
                                    {{ reservation.vehicle.body_type }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <!-- <td
                                        class="px-4 py-3 text-ms font-semibold border"
                                    >
                                        {{ reservation.vehicle.year_model }}
                                        {{ reservation.vehicle.brand_name }}
                                        {{ reservation.vehicle.engine }}
                                        {{ reservation.vehicle.transmission }}
                                    </td> -->
                    <td class="px-4 py-3 text-ms font-semibold border">
                        ₱
                        {{ reservation.vehicle.price.toLocaleString() }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ reservation.address }}
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">
                        {{ reservation.contact_num }}
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="reservation.status == 'Declined'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"
                        >
                            Declined
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="reservation.status == 'Pending'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"
                        >
                            Pending
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="reservation.status == 'Sold'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-sm"
                        >
                            Sold
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-xs border"
                        v-if="reservation.status == 'Reserved'"
                    >
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"
                        >
                            Reserved
                        </span>
                    </td>
                    <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="reservation.status == 'Pending'"
                    >
                        <div class="flex justify-center">
                            <button
                                class="hover:text-red-700"
                                @click="cancelReservation(reservation.id)"
                            >
                                Cancel
                            </button>
                        </div>
                    </td>
                    <td
                        class="px-4 py-3 text-ms font-semibold border"
                        v-if="
                            (reservation.status == 'Sold') |
                                (reservation.status == 'Declined') |
                                (reservation.status == 'Reserved')
                        "
                    ></td>
                </tr>
            </tbody>
            <tbody v-else class="bg-white">
                <tr>
                    <td
                        colspan="6"
                        align="center"
                        class="text-gray-800 font-bold text-2xl mt-2"
                    >
                        No Reservations Found.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            avatar: '/images/Avatar.png',
            shoppingCart: '/images/ShoppingCartIcon.png',
            carIcon: '/images/CarIcon.png',
            scheduleIcon: '/images/Schedule.png',
            reservations: []
        };
    },
    beforeMount() {
        this.fetchUser();
        this.fetchReservations();
    },
    methods: {
        fetchUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            this.fname = this.user.fname;
            this.mname = this.user.mname;
            this.lname = this.user.lname;
            this.email = this.user.email;
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        fetchReservations() {
            axios
                .get(`/api/users/${this.user.id}/reservations`)
                .then(response => {
                    this.reservations = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        cancelReservation(id) {
            this.$swal({
                title: 'Are you sure you want to cancel your reservation?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`/api/reservations/${id}`).then(response => {
                        this.fetchReservations();
                        console.log('Deleted');
                    });
                    this.$swal(
                        'Cancelled!',
                        'Reservation has been cancelled.',
                        'success'
                    );
                }
            });
        }
    }
};
</script>

<style></style>
