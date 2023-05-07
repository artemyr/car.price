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

            <div class="admin-list__form-control" v-for="(element, index) in elements">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.category.edit', params: {id: element.id} }">{{ element.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ element.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deleteCategory(element.id)" class="admin-list__remove" type="submit" value="x">
                </div>
            </div>

        </div>

        <div class="admin-list__pagen" v-if="pagen">
            <a @click.prevent="get(pagen.first)" :href="pagen.first">Первая</a>
            <a @click.prevent="get(pagen.prev)" :href="pagen.prev">Предидущая</a>
            <a @click.prevent="get(pagen.next)" :href="pagen.next">Следующая</a>
            <a @click.prevent="get(pagen.last)" :href="pagen.last">Последняя</a>
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Index',
    data () {
        return {
            elements: null,
            pagen: null,
            defaultLink: '/api/admin/categories',
            curLink: null
        }
    },
    props: [],
    mounted() {
        this.curLink = this.defaultLink;
        this.get(this.curLink);
    },
    methods: {
        async get (link) {
            if (!link) return;
            this.curLink = link;
            await axios.get(link)
            .then(response => {
                this.elements = response.data.data;
                if (response.data.meta.last_page > 1) this.pagen = response.data.links
                    else this.pagen = null
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteCategory(id) {
            axios.delete(`/api/admin/categories/${id}`)
                .then(res => {
                    return this.get(this.curLink);
                })
                .then(res => {
                    if (this.elements.length == 0) {
                        this.get(this.defaultLink);
                    }
                })
        }
    }
}
</script>
