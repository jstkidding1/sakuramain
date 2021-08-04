<template>
    <div>
        <div
            class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto"
        >
            <h2>
                <span class="title"><strong>Thank You!</strong></span
                ><br />
                <span class="medium-text"
                    >Your Appointment has been placed.</span
                ><br />
                <router-link
                    :to="{ name: 'customer-dashboard' }"
                    class="small-link"
                    >See your appointments</router-link
                >
            </h2>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style scoped>
.medium-text {
    font-size: 36px;
}
.small-link {
    font-size: 24px;
    text-decoration: underline;
    color: #777;
}
.product-box {
    border: 1px solid #cccccc;
    padding: 10px 15px;
}
.hero-section {
    height: 80vh;
    align-items: center;
    margin-bottom: 20px;
    margin-top: -20px;
}
.title {
    font-size: 60px;
}
</style>
