<template>
    <div>
        <h1>Финансы</h1>
        <ul>
            <li v-for="product in finance" :key="product.id">
                <strong>{{ product.name }}</strong> - {{ product.price }}₽
                <router-link :to="`/finance/${product.id}/edit`">Edit</router-link>
                <button @click="deleteProduct(product.id)" class="delete-btn">Delete</button>
            </li>
        </ul>
        <router-link to="/finance/create" class="create-btn">Добавить пункт</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            finance: [],
        };
    },
    async created() {
        const response = await axios.get('/api/finance');
        this.finance = response.data;
    },
    methods: {
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await axios.delete(`/api/finance/${id}`);
                this.finance = this.finance.filter(product => product.id !== id);
            }
        },
    },
};
</script>

<style scoped>
.create-btn, .delete-btn {
    margin-left: 10px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
}
.delete-btn {
    background-color: red;
    color: white;
}
.create-btn {
    display: block;
    margin-top: 20px;
    background-color: green;
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 8px 12px;
}
</style>
