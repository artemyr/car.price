<template>
    <div class="admin-edit">

        <div class="admin-edit__form-control">
            <label for="title">Название города</label>
            <input v-model="title" id="title" type="text">
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Ссылка ведущая на город</label>
            <input v-model="link" id="link" type="text">
        </div>

        <div class="admin-edit__form-control">
            <label for="name_predloshniy_padesh">Город в предложном падеже</label>
            <input v-model="name_predloshniy_padesh" id="name_predloshniy_padesh" type="text">
        </div>

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
            title: null,
            link: null,
            name_predloshniy_padesh: null
        }
    },
    props: [],
    mounted() {
        this.get();
    },
    methods: {
        get() {
            axios.get(`/api/admin/categories/${this.$route.params.id}`)
                .then(res => {
                    this.title = res.data.data.title
                    this.link = res.data.data.link
                    this.name_predloshniy_padesh = res.data.data.name_predloshniy_padesh
                })
        },
        update() {
            axios.patch(`/api/admin/categories/${this.$route.params.id}`, {title: this.title, link: this.link, name_predloshniy_padesh: this.name_predloshniy_padesh})
                .then(res => {
                    this.$router.push({name:'admin.category.show', params: {id: this.$route.params.id}})
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
