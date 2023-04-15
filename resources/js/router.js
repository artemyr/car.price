import Vue from 'vue'
import VueRouter from "vue-router"
import AdminHomeComponent from "./components/admin/AdminHomeComponent"

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
// index
        {
            path: '/admin', 
            component: AdminHomeComponent,
            name: 'admin.index'
        },
// city
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
// category
        {
            path: '/admin/categories', 
            component: () => import('./views/admin/Category/Index'),
            name: 'admin.category.index'
        },
        {
            path: '/admin/categories/create', 
            component: () => import('./views/admin/Category/Create'),
            name: 'admin.category.create'
        },
        {
            path: '/admin/categories/:id/edit', 
            component: () => import('./views/admin/Category/Edit'),
            name: 'admin.category.edit'
        },
        {
            path: '/admin/categories/:id', 
            component: () => import('./views/admin/Category/Show'),
            name: 'admin.category.show'
        },
// post
        {
            path: '/admin/posts', 
            component: () => import('./views/admin/Post/Index'),
            name: 'admin.post.index'
        },
        {
            path: '/admin/posts/create', 
            component: () => import('./views/admin/Post/Create'),
            name: 'admin.post.create'
        },
        {
            path: '/admin/posts/:id/edit', 
            component: () => import('./views/admin/Post/Edit'),
            name: 'admin.post.edit'
        },
        {
            path: '/admin/posts/:id', 
            component: () => import('./views/admin/Post/Show'),
            name: 'admin.post.show'
        },
// article
        {
            path: '/admin/articles', 
            component: () => import('./views/admin/Article/Index'),
            name: 'admin.article.index'
        },
        {
            path: '/admin/articles/create', 
            component: () => import('./views/admin/Article/Create'),
            name: 'admin.article.create'
        },
        {
            path: '/admin/articles/:id/edit', 
            component: () => import('./views/admin/Article/Edit'),
            name: 'admin.article.edit'
        },
        {
            path: '/admin/articles/:id', 
            component: () => import('./views/admin/Article/Show'),
            name: 'admin.article.show'
        },
// review
        {
            path: '/admin/reviews', 
            component: () => import('./views/admin/Review/Index'),
            name: 'admin.review.index'
        },
        {
            path: '/admin/reviews/create', 
            component: () => import('./views/admin/Review/Create'),
            name: 'admin.review.create'
        },
        {
            path: '/admin/reviews/:id/edit', 
            component: () => import('./views/admin/Review/Edit'),
            name: 'admin.review.edit'
        },
        {
            path: '/admin/reviews/:id', 
            component: () => import('./views/admin/Review/Show'),
            name: 'admin.review.show'
        },
    ]
})