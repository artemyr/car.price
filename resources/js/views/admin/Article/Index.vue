<template>
    <div class="admin-list">
        <router-link class="admin-list__create" :to="{ name: 'admin.article.create' }">Создать новый</router-link><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(article, index) in articles">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.article.edit', params: {id: article.id} }">{{ article.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ article.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deleteArticle(article.id)" class="admin-list__remove" type="submit" value="x">
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Index',
    data () {
        return {
            articles: null,
        }
    },
    props: [],
    mounted() {
        this.get()
    },
    methods: {
        async get () {
            await axios.get('/api/admin/articles')
            .then(response => {
                this.articles = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteArticle(id) {
            axios.delete(`/api/admin/articles/${id}`)
                .then(res => {
                    this.get();
                })
        }
    }
}
</script>
