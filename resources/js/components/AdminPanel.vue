<template>
    <div>
        <h2>Admin Panel</h2>
        <button @click="showProductForm = !showProductForm">Add Product</button>
        <button @click="showNewsForm = !showNewsForm">Add News</button>
        
        <div v-if="showProductForm">
         
            <form @submit.prevent="addProduct">
                <input v-model="product.name" placeholder="Product Name">
                <input v-model="product.price" placeholder="Product Price">
                <button type="submit">Add Product</button>
            </form>
        </div>
        
        <div v-if="showNewsForm">
            
            <form @submit.prevent="addNews">
                <input v-model="news.title" placeholder="News Title">
                <textarea v-model="news.content" placeholder="News Content"></textarea>
                <button type="submit">Add News</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showProductForm: false,
            showNewsForm: false,
            product: {
                name: '',
                price: ''
            },
            news: {
                title: '',
                content: ''
            }
        };
    },
    methods: {
        addProduct() {
            
        },
        addNews() {
           
        }
    }
}
</script>
