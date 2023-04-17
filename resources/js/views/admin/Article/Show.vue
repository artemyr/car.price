<template>
    <div class="admin-edit" v-if="entity">

        <div class="admin-edit__form-control">
            <label for="title">Название</label>
            <p id="title">{{ entity.title }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Ссылка</label>
            <p id="link">{{ entity.link }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Город статьи</label>
            <p id="link">{{ entity.city_id }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Контент</label>
            <p id="link">{{ entity.content }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Tag</label>
            <p id="link">{{ entity.tag }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Текст анонса</label>
            <p id="link">{{ entity.preview_text }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Картинка</label>
            <p id="link">{{ entity.image_path }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Дата создания</label>
            <p id="link">{{ entity.cr_date }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Файлы</label>
            <p id="link">{{ entity.file }}</p>
        </div>        
       
        <router-link :to="{ name: 'admin.article.edit', params: {id: entity.id}}">Edit</router-link>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Edit',
    data () {
        return {
            entity: null
        }
    },
    props: [],
    mounted() {
        this.get();
    },
    methods: {
        get() {
            axios.get(`/api/admin/articles/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        }
    }
}
</script>
