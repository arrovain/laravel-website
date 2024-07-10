<template>
    <div>
        <h2>Haber Yönetimi</h2>
        <form @submit.prevent="saveNews">
            <div class="form-group">
                <label for="title">Başlık</label>
                <input type="text" class="form-control" id="title" v-model="news.title" required>
            </div>
            <div class="form-group">
                <label for="content">İçerik</label>
                <textarea class="form-control" id="content" v-model="news.content" required></textarea>
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
                <th>Başlık</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in newsItems" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.title }}</td>
                <td>
                    <button @click="editNews(item)" class="btn btn-sm btn-info">Düzenle</button>
                    <button @click="deleteNews(item.id)" class="btn btn-sm btn-danger">Sil</button>
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
            newsItems: [],
            news: {
                title: '',
                content: '',
                image: null
            }
        }
    },
    mounted() {
        this.getNews();
    },
    methods: {
        getNews() {
            axios.get('/api/news')
                .then(response => {
                    this.newsItems = response.data;
                })
                .catch(error => {
                    console.error('Haberler yüklenirken hata oluştu:', error);
                });
        },
        saveNews() {
            let formData = new FormData();
            formData.append('title', this.news.title);
            formData.append('content', this.news.content);
            if (this.news.image) {
                formData.append('image', this.news.image);
            }

            if (this.news.id) {
                axios.post('/api/news/' + this.news.id, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(() => {
                        this.resetForm();
                        this.getNews();
                    })
                    .catch(error => {
                        console.error('Haber güncellenirken hata oluştu:', error);
                    });
            } else {
                axios.post('/api/news', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(() => {
                        this.resetForm();
                        this.getNews();
                    })
                    .catch(error => {
                        console.error('Haber eklenirken hata oluştu:', error);
                    });
            }
        },
        editNews(news) {
            this.news = { ...news };
        },
        deleteNews(id) {
            if (confirm('Bu haberi silmek istediğinizden emin misiniz?')) {
                axios.delete('/api/news/' + id)
                    .then(() => {
                        this.getNews();
                    })
                    .catch(error => {
                        console.error('Haber silinirken hata oluştu:', error);
                    });
            }
        },
        handleImageUpload(event) {
            this.news.image = event.target.files[0];
        },
        resetForm() {
            this.news = {
                title: '',
                content: '',
                image: null
            };
        }
    }
}
</script>
