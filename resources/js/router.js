import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: 'home',
        component: () => import("./pages/Home.vue"),
    },
    {
        path: "/auth/login",
        name: 'login',
        component: () => import("./pages/auth/Login.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});