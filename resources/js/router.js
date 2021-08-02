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
        path: '/galleries',
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
    }
];
