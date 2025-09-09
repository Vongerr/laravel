import { createRouter, createWebHistory } from 'vue-router';
import ProductList from '../components/ProductList.vue';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';

const routes = [
    {
        path: '/',
        component: ProductList,
    },
    {
        path: '/finance/create',
        component: CreateProduct,
    },
    {
        path: '/finance/:id/edit',
        component: EditProduct,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
