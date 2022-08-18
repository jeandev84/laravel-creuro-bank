// import Login from "@/views/auth/Login";
// import ParkingIndex from "@/views/parking/Index";
// import Login from "../views/auth/Login";


import ParkingList from "../views/parking/Index";
import middleware from './middleware';
import App from "../App";


export default [
    {
        path: '/',
        name: 'home',
        component: App,
        beforeEnter: middleware.guest,
    },
    {
        path: '/parkings',
        name: 'parkings',
        component: ParkingList,
        // beforeEnter: middleware.user
    },
];
