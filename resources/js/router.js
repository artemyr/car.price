import Vue from 'vue'
import VueRouter from "vue-router"
import AdminHomeComponent from "./components/admin/AdminHomeComponent"

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin', 
            component: AdminHomeComponent,
            name: 'admin.index'
        },
        {
            path: '/admin/cities', 
            component: () => import('./views/admin/City/Index'),
            name: 'cities.index'
        },
        {
            path: '/admin/categories', 
            component: AdminHomeComponent
        },
        {
            path: '/admin/posts', 
            component: AdminHomeComponent
        },
        {
            path: '/admin/articles', 
            component: AdminHomeComponent
        },
        {
            path: '/admin/reviews', 
            component: AdminHomeComponent
        },
    ]
})