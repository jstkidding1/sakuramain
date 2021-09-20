<template>
    <div class="container mt-10 h-full">
        <!-- <div class="flex justify-center w-full h-96">
            <OrderChart />
        </div> -->
        <!-- <h1>{{ total }}</h1> -->
        <div class="flex justify-center space-x-56">
            <div id="printSales" class="w-1/3 h-96">
                <div class="flex items-center justify-between mb-10">
                    <h1 class="text-xl text-gray-700 font-bold">Users</h1>
                    <!-- <button
                        @click="printChart"
                        class="flex items-center bg-gray-900 px-3 py-1 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300 mt-2"
                    >
                        <span>Print</span>
                    </button> -->
                </div>
                <SalesReport />
            </div>
            <div class="w-1/3 h-96">
                <h1 class="text-xl text-gray-700 font-bold mb-10">
                    Car Reservations
                </h1>
                <ReservationReport />
            </div>
        </div>
        <div class="flex justify-center space-x-56 mt-56">
            <div class="w-1/3 h-96">
                <h1 class="text-xl text-gray-700 font-bold mb-10">
                    Service Appointments
                </h1>
                <AppointmentReport />
            </div>
            <div class="w-1/3 h-96">
                <h1 class="text-xl text-gray-700 font-bold mb-10">
                    Car Inquiries
                </h1>
                <InquiryReport />
            </div>
        </div>
        <div class="flex justify-center space-x-56 mt-56">
            <div class="w-1/3 h-96">
                <h1 class="text-xl text-gray-700 font-bold mb-10">
                    Car Request A Test Drive
                </h1>
                <RequestReport />
            </div>
            <div class="w-1/3 h-96">
                <h1 class="text-xl text-gray-700 font-bold mb-10">
                    Car Quotations
                </h1>
                <QuotationChart />
            </div>
        </div>
        <div class="flex">
            <!-- <CountChart /> -->
        </div>
    </div>
</template>

<script>
import SalesReport from '../salesreport/SalesReport.vue';
import ReservationReport from '../salesreport/ReservationReport.vue';
import AppointmentReport from '../salesreport/AppointmentReport.vue';
import InquiryReport from '../salesreport/InquiryReport.vue';
import RequestReport from '../salesreport/RequestReport.vue';
import QuotationChart from '../salesreport/QuotationChart.vue';
import OrderChart from '../salesreport/OrderChart.vue';

export default {
    components: {
        SalesReport,
        ReservationReport,
        AppointmentReport,
        InquiryReport,
        RequestReport,
        QuotationChart,
        OrderChart
    },
    data() {
        return {
            output: null,
            total: []
        };
    },
    methods: {
        print() {
            // window.print('printSales');
            this.$htmlToPaper('printSales');
        },
        printChart() {
            var canvasEle = document.getElementById('printSales');
            var win = window.open('', 'Print', 'height=600,width=800');
            win.document.write(
                "<br><img src='" + canvasEle.toDataURL() + "' />"
            );
            setTimeout(function() {
                //giving it 200 milliseconds time to load
                win.document.close();
                win.focus();
                win.print();
                win.location.reload();
            }, 200);
        },
        getTotalUsers() {
            axios.get('api/graph').then(response => {
                this.total = response.data.total;
                console.log(response.data.total);
                // response.data.total;
            });
        }
    }
};
</script>

<style scoped>
@media print {
    @page {
        size: landscape;
    }
}
</style>
