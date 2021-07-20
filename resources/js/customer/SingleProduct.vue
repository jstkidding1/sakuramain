<template>
    <div>
        <h5>My Order</h5>
        <div class="flex">
            <div class="bg-white rounded w-full">
                <img :src="product.image" :alt="product.product_name" />
                <h3
                    class="font-sans font-bold text-gray-800 text-lg"
                    v-html="product.product_name"
                ></h3>
                <div class="flex">
                    <div class="font-sans font-bold text-gray-800 text-md">
                        ₱ {{ product.price }}
                    </div>
                </div>
                <div class="flex">
                    <div class="font-sans font-bold text-gray-800 text-md">
                        Available Quantity: {{ product.units }}
                    </div>
                </div>
                <div class="flex">
                    <router-link
                        :to="{ path: '/checkout?pid=' + product.id }"
                        class="btn btn-success"
                        >Buy Now</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: []
        };
    },
    beforeMount() {
        this.getProduct();
    },
    methods: {
        getProduct() {
            axios
                .get(`/api/products/${this.$route.params.id}`)
                .then(response => {
                    this.product = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
