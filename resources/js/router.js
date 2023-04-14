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
            name: 'admin.city.index'
        },
        {
            path: '/admin/cities/create', 
            component: () => import('./views/admin/City/Create'),
            name: 'admin.city.create'
        },
        {
            path: '/admin/cities/:id/edit', 
            component: () => import('./views/admin/City/Edit'),
            name: 'admin.city.edit'
        },
        {
            path: '/admin/cities/:id', 
            component: () => import('./views/admin/City/Show'),
            name: 'admin.city.show'
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