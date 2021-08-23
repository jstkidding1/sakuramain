<template>
    <div>
        <div class="container">
            <h5>{{ user.fname }}</h5>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: []
        };
    },
    beforeMount() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios
                .get(`/api/users/${this.$route.params.id}`)
                .then(response => {
                    this.user = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
