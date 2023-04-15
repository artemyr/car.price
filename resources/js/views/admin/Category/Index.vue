<template>
    <div class="admin-list">
        <router-link class="admin-list__create" :to="{ name: 'admin.category.create' }">Создать новый</router-link><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(category, index) in categories">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.category.edit', params: {id: category.id} }">{{ category.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ category.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deleteCategory(category.id)" class="admin-list__remove" type="submit" value="x">
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
            categories: null,
        }
    },
    props: [],
    mounted() {
        this.get()
    },
    methods: {
        async get () {
            await axios.get('/api/admin/categories')
            .then(response => {
                this.categories = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteCategory(id) {
            axios.delete(`/api/admin/categories/${id}`)
                .then(res => {
                    this.get();
                })
        }
    }
}
</script>
