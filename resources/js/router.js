import Notfound from './components/Notfound.vue';
import Loading from './components/Loading.vue';
import Home from './guest/Home.vue';
import Register from './authentication/Register.vue';
import Login from './authentication/Login.vue';
import CustomerDashboard from './customer/CustomerDashboard.vue';
import AdminDashboard from './admin/AdminDashboard.vue';
import ManagerDashboard from './manager/ManagerDashboard.vue';
import SecretaryDashboard from './secretary/SecretaryDashboard.vue';
import UserManagement from './admin/UserManagement.vue';
import ProductManagement from './admin/ProductManagement.vue';
import VehicleManagement from './admin/VehicleManagement.vue';
import OrderManagement from './admin/OrderManagement.vue';
import CreateVehicle from './admin/CreateVehicle.vue';
import Vehicles from './guest/Vehicles.vue';
import GetCar from './guest/GetCar.vue';
import MakeReservation from './customer/MakeReservation.vue';
import CreateUser from './admin/CreateUser.vue';

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
        path: '/products',
        name: 'product-management',
        component: ProductManagement,
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
    }
];
