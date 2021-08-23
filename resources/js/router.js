import Notfound from './components/Notfound.vue';
import Loading from './components/Loading.vue';
import Home from './guest/Home.vue';
import Register from './authentication/Register.vue';
import Login from './authentication/Login.vue';
import CustomerDashboard from './customer/CustomerDashboard.vue';
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
import EditAppointment from './admin/appointments/EditAppointment.vue';
import CreateAdmin from './admin/users/CreateAdmin.vue';
import CreateSecretary from './admin/users/CreateSecretary.vue';
import CreateManager from './admin/users/CreateManager.vue';
import Calendar from './guest/Calendar.vue';
import Contact from './guest/Contact.vue';
import ViewUser from './admin/users/ViewUser.vue';
import EditUser from './admin/users/EditUser.vue';

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
        path: '/dashboard',
        name: 'customer-dashboard',
        component: CustomerDashboard,
        meta: {
            requiresAuth: true,
            Customer: true
        }
    },
    {
        path: '/aboutus',
        name: 'about-us',
        component: AboutUs
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
        path: '/editappointment/:id',
        name: 'edit-appointment',
        component: EditAppointment,
        meta: {
            requiresAuth: true,
            Admin: true
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
    }
];
