<template>
    <div class="admin-edit" v-if="article">

        <div class="admin-edit__form-control">
            <label for="title">Название</label>
            <input v-model="article.title" id="title" type="text">
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Ссылка</label>
            <input v-model="article.link" id="link" type="text">
        </div>

        <!-- <div class="admin-edit__form-control">
            <label for="city_id">Город статьи</label>
            <input v-model="article.city_id" id="city_id" type="text">
        </div> -->

        <div class="admin-edit__form-control">
            <label for="content">Контент</label>
            <textarea v-model="article.content" id="content" type="text"></textarea>
        </div>
        
        <!-- <div class="admin-edit__form-control">
            <label for="tag">Tag</label>
            <textarea v-model="article.tag" id="tag" type="text"></textarea>
        </div> -->


        <div class="admin-edit__form-control">
            <label for="preview_text">Текст анонса</label>
            <input v-model="article.preview_text" id="preview_text" type="text">
        </div>

        <div class="admin-edit__form-control">
            <label for="image_path">Картинка</label>
            <input v-model="article.image_path" id="image_path" type="text">
        </div>

        <div class="admin-edit__form-control">
            <label for="cr_date">Дата создания</label>
            <input v-model="article.cr_date" id="cr_date" type="text">
        </div>

        <!-- <div class="admin-edit__form-control">
            <label for="file">Файлы</label>
            <input v-model="article.file" id="file" type="text">
        </div> -->
    

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Edit',
    data () {
        return {
            article: null,
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
                    this.article = res.data.data
                })
        },
        update() {
            axios.patch(`/api/admin/articles/${this.$route.params.id}`, {title: this.title, link: this.link, name_predloshniy_padesh: this.name_predloshniy_padesh})
                .then(res => {
                    this.$router.push({name:'admin.article.show', params: {id: this.$route.params.id}})
                })
        }
    },
    computed: {
        isDisabled() {
            return this.title && this.link && this.name_predloshniy_padesh;
        }
    }
}
</script>
