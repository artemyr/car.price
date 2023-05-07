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
            <label for="link">Контент</label>
            <p id="link">{{ entity.content }}</p>
        </div>

        <router-link :to="{ name: 'admin.post.edit', params: {id: entity.id}}">Edit</router-link>
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
            axios.get(`/api/admin/posts/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        }
    }
}
</script>
