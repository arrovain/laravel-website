<template>
    <div>
        <h2>Ürün Yönetimi</h2>
        <form @submit.prevent="saveProduct">
            <div class="form-group">
                <label for="name">Ürün Adı</label>
                <input type="text" class="form-control" id="name" v-model="product.name" required>
            </div>
            <div class="form-group">
                <label for="description">Açıklama</label>
                <textarea class="form-control" id="description" v-model="product.description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Fiyat</label>
                <input type="number" class="form-control" id="price" v-model="product.price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="image">Resim</label>
                <input type="file" class="form-control-file" id="image" @change="handleImageUpload">
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>

        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ad</th>
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>
                    <button @click="editProduct(product)" class="btn btn-sm btn-info">Düzenle</button>
                    <button @click="deleteProduct(product.id)" class="btn btn-sm btn-danger">Sil</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            product: {
                name: '',
                description: '',
                price: '',
                image: null
            }
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    console.error('Ürünler yüklenirken hata oluştu:', error);
                });
        },
        saveProduct() {
            let formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('description', this.product.description);
            formData.append('price', this.product.price);
            if (this.product.image) {
                formData.append('image', this.product.image);
            }

            if (this.product.id) {
                axios.post('/api/products/' + this.product.id, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(() => {
                        this.resetForm();
                        this.getProducts();
                    })
                    .catch(error => {
                        console.error('Ürün güncellenirken hata oluştu:', error);
                    });
            } else {
                axios.post('/api/products', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(() => {
                        this.resetForm();
                        this.getProducts();
                    })
                    .catch(error => {
                        console.error('Ürün eklenirken hata oluştu:', error);
                    });
            }
        },
        editProduct(product) {
            this.product = { ...product };
        },
        deleteProduct(id) {
            if (confirm('Bu ürünü silmek istediğinizden emin misiniz?')) {
                axios.delete('/api/products/' + id)
                    .then(() => {
                        this.getProducts();
                    })
                    .catch(error => {
                        console.error('Ürün silinirken hata oluştu:', error);
                    });
            }
        },
        handleImageUpload(event) {
            this.product.image = event.target.files[0];
        },
        resetForm() {
            this.product = {
                name: '',
                description: '',
                price: '',
                image: null
            };
        }
    }
}
</script>
