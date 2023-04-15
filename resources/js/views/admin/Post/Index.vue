<template>
    <div class="admin-list">
        <router-link class="admin-list__create" :to="{ name: 'admin.post.create' }">Создать новый</router-link><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(post, index) in posts">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.post.edit', params: {id: post.id} }">{{ post.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ post.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deletePost(post.id)" class="admin-list__remove" type="submit" value="x">
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
            posts: null,
        }
    },
    props: [],
    mounted() {
        this.get()
    },
    methods: {
        async get () {
            await axios.get('/api/admin/posts')
            .then(response => {
                this.posts = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        deletePost(id) {
            axios.delete(`/api/admin/posts/${id}`)
                .then(res => {
                    this.get();
                })
        }
    }
}
</script>
