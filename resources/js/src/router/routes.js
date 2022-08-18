// import Login from "@/views/auth/Login";
// import ParkingIndex from "@/views/parking/Index";
// import Login from "../views/auth/Login";


import ParkingList from "../views/parking/Index";
import middleware from './middleware';
import Login from "../views/auth/Login";



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
        component: ParkingList,
        beforeEnter: middleware.user
    },
];
