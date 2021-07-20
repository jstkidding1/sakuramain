<template>
    <div>
        <h5>Checkout</h5>
        <div class="flex">
            <div class="w-1/2">
                <div class="bg-white rounded p-4">
                    <img :src="product.image" :alt="product.product_name" />
                    <h2 class="text-center" v-html="product.product_name"></h2>
                    <div class="flex">
                        <div class="space-y-4">
                            <div
                                class="text-gray-800 font-sans font-bold text-md"
                            >
                                ₱ {{ product.price }}
                            </div>
                            <div
                                class="text-gray-800 font-sans font-bold text-md"
                            >
                                Available Units: {{ product.units }}
                            </div>
                            <div
                                class="text-gray-800 font-sans font-bold text-md"
                            >
                                Quantity:
                                <input
                                    type="number"
                                    name="units"
                                    min="1"
                                    :max="product.units"
                                    class="w-full"
                                    v-model="quantity"
                                    @change="checkUnits"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isLogged" class="w-1/2">
                <div class="flex">
                    <label>Delivery Address</label>
                    <div class="flex">
                        <input
                            type="text"
                            id="address"
                            class="form-control"
                            v-model="address"
                            required
                        />
                    </div>
                    <label>Contact Number</label>
                    <div class="flex">
                        <input
                            type="number"
                            id="contact_num"
                            class="form-control"
                            v-model="contact_num"
                            required
                        />
                    </div>
                </div>
                <div class="flex">
                    <button
                        class="btn btn-success"
                        v-if="isLogged"
                        @click="placeOrder"
                    >
                        Continue
                    </button>
                </div>
                <div>Name {{ user.fname }}</div>
            </div>
        </div>
        <div v-if="!isLogged">
            <h2>You need to login to continue</h2>
            <button class="col-md-4 btn btn-primary float-left" @click="login">
                Login
            </button>
            <button
                class="col-md-4 btn btn-danger float-right"
                @click="register"
            >
                Create an account
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['pid'],
    data() {
        return {
            user: null,
            address: '',
            contact_num: '',
            quantity: 1,
            isLogged: null,
            product: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    beforeMount() {
        axios
            .get(`/api/products/${this.pid}`)
            .then(response => {
                this.product = response.data;
            })
            .catch(error => {
                console.error(error);
            });

        // if (localStorage.getItem('jwt') != null) {
        //     this.user = JSON.parse(localStorage.getItem('user'));
        //     axios.defaults.headers.common['Content-Type'] = 'application/json';
        //     axios.defaults.headers.common['Authorization'] =
        //         'Bearer' + localStorage.getItem('jwt');
        // }
        if (localStorage.getItem('jwt') != null) {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        }
    },
    methods: {
        login() {
            this.$router.push({
                name: 'login',
                params: { nextUrl: this.$router.fullPath }
            });
        },
        register() {
            this.$router.push({
                name: 'register',
                params: { nextUrl: this.$route.fullPath }
            });
        },
        placeOrder(e) {
            e.preventDefault();

            axios
                .post('api/orders/', {
                    address: this.address,
                    contact_num: this.contact_num,
                    quantity: this.quantity,
                    product: this.product.id
                })
                .then(response => {
                    this.$router.push({ name: 'confirmation' });
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        checkUnits(e) {
            if (this.quantity > this.product.units) {
                this.quantity = this.product.units;
            }
        }
    }
};
</script>

<style></style>
