import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'categories.index',
        component: () => import('../components/CategoryIndex.vue')
    },
    {
        path: '/categories/create',
        name: 'categories.create',
        component: () => import('../components/CategoryCreate.vue')
    },
    {
        path: '/categories/:id/edit',
        name: 'categories.edit',
        component: () => import('../components/CategoryEdit.vue'),
        props: true
    },
    {
        path: '/categories/:id/show',
        name: 'categories.show',
        component: () => import('../components/CategoryShow.vue'),
        props: true
    },

    { path: "/:pathMatch(.*)", component: { template: "Not found"} }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
