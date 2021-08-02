<template>
    <div v-show="visibleSlide === index" class="carousel-slide"></div>
</template>

<script>
export default {
    props: ['visibleSlide', 'index'],
    data() {
        return {};
    }
};
</script>

<style></style>
