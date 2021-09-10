import Notfound from './components/Notfound.vue';
import Loading from './components/Loading.vue';
import Home from './guest/Home.vue';
import Register from './authentication/Register.vue';
import Login from './authentication/Login.vue';
import AdminDashboard from './admin/AdminDashboard.vue';
import ManagerDashboard from './manager/ManagerDashboard.vue';
import SecretaryDashboard from './secretary/SecretaryDashboard.vue';
import UserManagement from './admin/users/UserManagement.vue';
import ProductManagement from './admin/products/ProductManagement.vue';
import VehicleManagement from './admin/vehicles/VehicleManagement.vue';
import OrderManagement from './admin/orders/OrderManagement.vue';
import CreateVehicle from './admin/vehicles/CreateVehicle.vue';
import Vehicles from './guest/Vehicles.vue';
import GetCar from './guest/GetCar.vue';
import MakeReservation from './customer/MakeReservation.vue';
import CreateUser from './admin/users/CreateUser.vue';
import EditVehicle from './admin/vehicles/EditVehicle.vue';
import Products from './guest/Products.vue';
import SingleProduct from './customer/SingleProduct.vue';
import Checkout from './customer/Checkout.vue';
import Confirmation from './customer/Confirmation.vue';
import CreateProduct from './admin/products/CreateProduct.vue';
import EditProduct from './admin/products/EditProduct.vue';
import AboutUs from './guest/AboutUs.vue';
import ReservationManagement from './admin/reservation/ReservationManagement.vue';
import ReservationConfirmation from './customer/ReservationConfirmation.vue';
import AppointmentManagement from './admin/appointments/AppointmentManagement.vue';
import GalleryManagement from './admin/galleries/GalleryManagement.vue';
import SalesReport from './admin/salesreport/SalesReport.vue';
import ViewProduct from './admin/products/ViewProduct.vue';
import ViewVehicle from './admin/vehicles/ViewVehicle.vue';
import ViewOrder from './admin/orders/ViewOrder.vue';
import ServicesManagement from './admin/services/ServicesManagement.vue';
import CreateService from './admin/services/CreateService.vue';
import EditServices from './admin/services/EditServices.vue';
import ViewServices from './admin/services/ViewServices.vue';
import Services from './guest/Services.vue';
import MakeAppointment from './customer/MakeAppointment.vue';
import AppointmentConfirmation from './customer/AppointmentConfirmation.vue';
import ViewAppointment from './admin/appointments/ViewAppointment.vue';
import ViewReservation from './admin/reservation/ViewReservation.vue';
import ViewGallery from './admin/galleries/ViewGallery.vue';
import EditGallery from './admin/galleries/EditGallery.vue';
import Galleries from './guest/Galleries.vue';
import CreateGallery from './admin/galleries/CreateGallery.vue';
import CustomerProfile from './customer/CustomerProfile.vue';
import CreateAdmin from './admin/users/CreateAdmin.vue';
import CreateSecretary from './admin/users/CreateSecretary.vue';
import CreateManager from './admin/users/CreateManager.vue';
import Calendar from './guest/Calendar.vue';
import Contact from './guest/Contact.vue';
import ViewUser from './admin/users/ViewUser.vue';
import EditUser from './admin/users/EditUser.vue';
import ReserveOnline from './components/ReserveOnline.vue';
import MakeInquiry from './customer/MakeInquiry.vue';
import RequestTestDrive from './customer/RequestTestDrive.vue';
import MakeQuote from './customer/MakeQuote.vue';
import InquiryManagement from './admin/inquiries/InquiryManagement.vue';
import ViewInquiry from './admin/inquiries/ViewInquiry.vue';
import RequestManagement from './admin/requests/RequestManagement.vue';
import ViewRequest from './admin/requests/ViewRequest.vue';
import QuotationManagement from './admin/quotations/QuotationManagement.vue';
import ViewQuotation from './admin/quotations/ViewQuotation.vue';
import Terms from './components/Terms.vue';
import AppointmentGuide from './components/AppointmentGuide.vue';
import Dashboard from './customer/Dashboard.vue';
import Main from './customer/Main.vue';
import InquiryConfirmation from './customer/InquiryConfirmation.vue';
import QuotationConfirmation from './customer/QuotationConfirmation.vue';
import RequestsConfirmation from './customer/RequestsConfirmation.vue';
import PrivacyPolicy from './components/PrivacyPolicy.vue';
import Create_Product from './manager/manager_products/Create_Product.vue';
import Product_List from './manager/manager_products/Product_List.vue';
import View_Product from './manager/manager_products/View_Product.vue';
import Edit_Product from './manager/manager_products/Edit_Product.vue';
import Vehicle_List from './manager/manager_vehicle/Vehicle_List.vue';
import Create_Vehicle from './manager/manager_vehicle/Create_Vehicle.vue';
import View_Vehicle from './manager/manager_vehicle/View_Vehicle.vue';
import Edit_Vehicle from './manager/manager_vehicle/Edit_Vehicle.vue';
import Secretary_Gallery_Manage from './secretary/secretary_gallery/Secretary_Gallery_Manage.vue';
import Secretary_CreateGallery from './secretary/secretary_gallery/Secretary_CreateGallery.vue';
import Secretary_ViewGallery from './secretary/secretary_gallery/Secretary_ViewGallery.vue';
import Secretary_EditGallery from './secretary/secretary_gallery/Secretary_EditGallery.vue';
import Secretary_Order from './secretary/secretary_order/Secretary_Order.vue';
import Secretary_ViewOrder from './secretary/secretary_order/Secretary_ViewOrder.vue';
import Secretary_Reserve from './secretary/secretary_reservations/Secretary_Reserve.vue';
import Secretary_View_Reserve from './secretary/secretary_reservations/Secretary_View_Reserve';
import Secretary_Appointment from './secretary/secretary_appointment/Secretary_Appointment.vue';
import Secretary_View_Appointment from './secretary/secretary_appointment/Secretary_View_Appointment.vue';
import Secretary_View_Inquiry from './secretary/secretary_inquiry/Secretary_View_Inquiry.vue';
import Secretary_View_Request from './secretary/secretary_request/Secretary_View_Request.vue';
import Secretary_View_Quotes from './secretary/secretary_quotation/Secretary_View_Quotes.vue';
import Secretary_Inquiry from './secretary/secretary_inquiry/Secretary_Inquiry.vue';
import Secretary_Request from './secretary/secretary_request/Secretary_Request.vue';
import Secretary_Quotation from './secretary/secretary_quotation/Secretary_Quotation.vue';
import Secretary_Report from './secretary/secretary_report/Secretary_Report.vue';
import Secretary_Create_Service from './secretary/secretary_service/Secretary_Create_Service.vue';
import Secretary_Edit_Service from './secretary/secretary_service/Secretary_Edit_Service.vue';
import Secretary_Service from './secretary/secretary_service/Secretary_Service.vue';
import Secretary_View_Service from './secretary/secretary_service/Secretary_View_Service.vue';

export const routes = [
    {
        path: '*',
        name: 'notfound',
        component: Notfound
    },
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/loading',
        name: 'loading',
        component: Loading
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/aboutus',
        name: 'about-us',
        component: AboutUs
    },
    {
        path: '/privacyPolicy',
        name: 'privacy-policy',
        component: PrivacyPolicy
    },
    {
        path: '/admin/dashboard',
        name: 'admin-dashboard',
        component: AdminDashboard,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/manager/dashboard',
        name: 'manager-dashboard',
        component: ManagerDashboard,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/secretary/dashboard',
        name: 'secretary-dashboard',
        component: SecretaryDashboard,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/users',
        name: 'user-management',
        component: UserManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/product',
        name: 'product-management',
        component: ProductManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/product/create',
        name: 'create-product',
        component: CreateProduct,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/product/edit/:id',
        name: 'edit-product',
        component: EditProduct,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/vehicles',
        name: 'vehicle-management',
        component: VehicleManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/orders',
        name: 'order-management',
        component: OrderManagement,
        meta: {
            requiresAuth: true,
            Admin: true
            // Secretary: true
        }
    },
    {
        path: '/vehicles/create',
        name: 'create-vehicle',
        component: CreateVehicle,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/cars',
        name: 'view-cars',
        component: Vehicles
    },
    {
        path: '/cars/:id',
        name: 'get-car',
        component: GetCar
    },
    {
        path: '/reservation',
        name: 'reservation',
        component: MakeReservation,
        props: route => ({ vid: route.query.vid })
    },
    {
        path: '/create/user',
        name: 'create-user',
        component: CreateUser
    },
    {
        path: '/edit/vehicle/:id',
        name: 'edit-vehicle',
        component: EditVehicle,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/auto-parts',
        name: 'auto-parts',
        component: Products
    },
    {
        path: '/auto-parts/:id',
        name: 'single-product',
        component: SingleProduct
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: Checkout,
        props: route => ({ pid: route.query.pid })
    },
    {
        path: '/confirmation',
        name: 'confirmation',
        component: Confirmation
    },
    {
        path: '/reservation-confirmation',
        name: 'reservation-confirmation',
        component: ReservationConfirmation
    },
    {
        path: '/appointment-confirmation',
        name: 'appointment-confirmation',
        component: AppointmentConfirmation
    },
    {
        path: '/reservations',
        name: 'reservation-management',
        component: ReservationManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/appointments',
        name: 'appointment-management',
        component: AppointmentManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/gallery/management',
        name: 'gallery-management',
        component: GalleryManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/salesreport',
        name: 'sales-report',
        component: SalesReport,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/viewproduct/:id',
        name: 'view-product',
        component: ViewProduct,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/viewvehicle/:id',
        name: 'view-vehicle',
        component: ViewVehicle,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/vieworder/:id',
        name: 'view-order',
        component: ViewOrder,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/services',
        name: 'services-management',
        component: ServicesManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/create/service',
        name: 'create-service',
        component: CreateService,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/viewservice/:id',
        name: 'view-service',
        component: ViewServices,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/editservice/:id',
        name: 'edit-service',
        component: EditServices,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/all/services',
        name: 'services',
        component: Services
    },
    {
        path: '/make/appointment',
        name: 'make-appointment',
        component: MakeAppointment,
        props: route => ({ aid: route.query.aid })
    },
    {
        path: '/view/appointment/:id',
        name: 'view-appointment',
        component: ViewAppointment,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/viewreservation/:id',
        name: 'view-reservation',
        component: ViewReservation,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/viewgallery/:id',
        name: 'view-gallery',
        component: ViewGallery,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/editgallery/:id',
        name: 'edit-gallery',
        component: EditGallery,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/gallery',
        name: 'gallery',
        component: Galleries
    },
    {
        path: '/create/gallery',
        name: 'create-gallery',
        component: CreateGallery,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/customer/profile/:id',
        name: 'customer-profile',
        component: CustomerProfile,
        meta: {
            requiresAuth: true,
            Customer: true
        }
    },
    {
        path: '/create/admin',
        name: 'create-admin',
        component: CreateAdmin,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/create/secretary',
        name: 'create-secretary',
        component: CreateSecretary,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/create/manager',
        name: 'create-manager',
        component: CreateManager,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/calendar',
        name: 'calendar',
        component: Calendar
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/viewuser/:id',
        name: 'view-user',
        component: ViewUser,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/user/edit/:id',
        name: 'edit-user',
        component: EditUser,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/reserve/online',
        name: 'reserve-online',
        component: ReserveOnline
    },
    {
        path: '/make/inquiry',
        name: 'make-inquiry',
        component: MakeInquiry,
        props: route => ({ viq: route.query.viq })
    },
    {
        path: '/request/test/drive',
        name: 'request-test-drive',
        component: RequestTestDrive,
        props: route => ({ rid: route.query.rid })
    },
    {
        path: '/request/quote',
        name: 'request-quote',
        component: MakeQuote,
        props: route => ({ qid: route.query.qid })
    },
    {
        path: '/inquiries',
        name: 'inquiry-management',
        component: InquiryManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/quotations',
        name: 'quotation-management',
        component: QuotationManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/requests',
        name: 'request-management',
        component: RequestManagement,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/view/inquiry/:id',
        name: 'view-inquiries',
        component: ViewInquiry,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/view/quotation/:id',
        name: 'view-quotation',
        component: ViewQuotation,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/view/request/:id',
        name: 'view-request',
        component: ViewRequest,
        meta: {
            requiresAuth: true,
            Admin: true
        }
    },
    {
        path: '/terms',
        name: 'terms',
        component: Terms
    },
    {
        path: '/appointment/guide',
        name: 'appointment-guide',
        component: AppointmentGuide
    },
    {
        path: '/dashboard',
        name: 'customer',
        component: Dashboard,
        meta: {
            requiresAuth: true,
            Customer: true
        }
    },
    {
        path: '/dashboard/:page',
        name: 'customer-pages',
        component: Dashboard,
        meta: {
            requiresAuth: true,
            Customer: true
        }
    },
    {
        path: '/main/dashboard',
        name: 'main',
        component: Main,
        meta: {
            requiresAuth: true,
            Customer: true
        }
    },
    {
        path: '/inquiry/confirmation',
        name: 'inquiry-confirmation',
        component: InquiryConfirmation
    },
    {
        path: '/quotation/confirmation',
        name: 'quotation-confirmation',
        component: QuotationConfirmation
    },
    {
        path: '/request/confirmation',
        name: 'request-confirmation',
        component: RequestsConfirmation
    },
    {
        path: '/manager/productList',
        name: 'manager-product-list',
        component: Product_List,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/createProduct',
        name: 'manager-create-product',
        component: Create_Product,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/viewProduct/:id',
        name: 'manager-view-product',
        component: View_Product,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/editProduct/:id',
        name: 'manager-edit-product',
        component: Edit_Product,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/vehicleList',
        name: 'manager-list-vehicle',
        component: Vehicle_List,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/createVehicle',
        name: 'manager-create-vehicle',
        component: Create_Vehicle,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/viewVehicle/:id',
        name: 'manager-view-vehicle',
        component: View_Vehicle,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/manager/editVehicle/:id',
        name: 'manager-edit-vehicle',
        component: Edit_Vehicle,
        meta: {
            requiresAuth: true,
            Manager: true
        }
    },
    {
        path: '/secretary/gallery',
        name: 'secretary_gallery',
        component: Secretary_Gallery_Manage,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/createGallery',
        name: 'secretary_create_gallery',
        component: Secretary_CreateGallery,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/editGallery/:id',
        name: 'secretary_edit_gallery',
        component: Secretary_EditGallery,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/viewGallery/:id',
        name: 'secretary_view_gallery',
        component: Secretary_ViewGallery,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/view/inquiry/:id',
        name: 'secretary_view_inquiry',
        component: Secretary_View_Inquiry,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/view/quotes/:id',
        name: 'secretary_view_quotes',
        component: Secretary_View_Quotes,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/view/request/:id',
        name: 'secretary_view_request',
        component: Secretary_View_Request,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/order',
        name: 'secretary_order',
        component: Secretary_Order,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/reservations',
        name: 'secretary_reservations',
        component: Secretary_Reserve,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/appointments',
        name: 'secretary_appointments',
        component: Secretary_Appointment,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/viewAppointments/:id',
        name: 'secretary_view_appointments',
        component: Secretary_View_Appointment,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/viewOrder/:id',
        name: 'secretary_view_order',
        component: Secretary_ViewOrder,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/inquiry',
        name: 'secretary_inquiry',
        component: Secretary_Inquiry,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/request',
        name: 'secretary_request',
        component: Secretary_Request,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/quotation',
        name: 'secretary_quotation',
        component: Secretary_Quotation,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/report',
        name: 'secretary_report',
        component: Secretary_Report,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/view/reservation/:id',
        name: 'secretary-view-reservation',
        component: Secretary_View_Reserve,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/services',
        name: 'secretary-services',
        component: Secretary_Service,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/create/service',
        name: 'secretary-create-service',
        component: Secretary_Create_Service,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/edit/service/:id',
        name: 'secretary-edit-service',
        component: Secretary_Edit_Service,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    },
    {
        path: '/secretary/view/service/:id',
        name: 'secretary-view-service',
        component: Secretary_View_Service,
        meta: {
            requiresAuth: true,
            Secretary: true
        }
    }
];
