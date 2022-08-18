// import Login from "@/views/auth/Login";
// import ParkingIndex from "@/views/parking/Index";
// import Login from "../views/auth/Login";


import middleware from './middleware';
import Login from "../views/auth/Login";
import ParkingIndex from "../views/parking/ParkingIndex";
import ParkingCreate from "../views/parking/ParkingCreate";
import ParkingEdit from "../views/parking/ParkingEdit";



export default [
    {
        path: '/login',
        name: 'login',
        component: Login,
        beforeEnter: middleware.guest,
    },
    {
        path: '/parkings',
        name: 'parkings',
        component: ParkingIndex,
        beforeEnter: middleware.user
    },
    {
        path: '/parking/create',
        name: 'parkingCreate',
        component: ParkingCreate,
        beforeEnter: middleware.user
    },
    {
        path: '/parking/:id/edit',
        name: 'parkingEdit',
        component: ParkingEdit,
        beforeEnter: middleware.user
    },
];
