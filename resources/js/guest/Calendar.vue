<template>
    <div class="container">
        <div class="flex justify-center mt-12">
            <div class="w-1/2">
                <!-- <Fullcalendar :options="calendarPlugins" :events="events" /> -->
                <label for="Status">Status</label>
            </div>
        </div>
    </div>
</template>

<script>
import Fullcalendar from '@fullcalendar/vue';
import dayGridPlugin from '@fullcalendar/daygrid';
import InteractionPlugin from '@fullcalendar/interaction';

export default {
    components: {
        Fullcalendar
    },
    data() {
        return {
            calendarPlugins: {
                plugins: [dayGridPlugin, InteractionPlugin],
                initialView: 'dayGridMonth'
            },
            events: 'hello'
        };
    }
};
</script>

<style></style>
