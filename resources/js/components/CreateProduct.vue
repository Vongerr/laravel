<template>
    <div>
        <h1>Добавление пункта</h1>
        <form @submit.prevent="createProduct">
            <label>Дата:</label>
            <input v-model="finance.date" type="date" required />

            <label>Категория бюджета:</label>
            <textarea v-model="finance.budget_category"></textarea>

            <label>Категория:</label>
            <input v-model="finance.category" type="number" step="0.01" required />

            <label>Время:</label>
            <input v-model="finance.time" type="time" step="0.01" required />

            <button type="submit" class="create-btn">Create</button>
            <router-link to="/" class="cancel-btn">Cancel</router-link>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            finance: {
                date: '',
                budget_category: '',
                category: 0,
                time: 0,
                username: 0,
                money: 0,
                bank: 0,
                comment: 0,
                exclusion: 0,
            },
        };
    },
    methods: {
        async createProduct() {
            await axios.post('/api/finance', this.finance);
            this.$router.push('/');
        },
    },
};
</script>

<style scoped>
form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
input, textarea {
    width: 100%;
    padding: 8px;
}
button {
    margin-top: 10px;
    padding: 8px 12px;
    cursor: pointer;
}
.create-btn {
    background-color: green;
    color: white;
}
.cancel-btn {
    background-color: gray;
    color: white;
    text-decoration: none;
    display: inline-block;
    padding: 8px 12px;
    text-align: center;
}
</style>
