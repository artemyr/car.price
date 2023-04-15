<template>
    <div class="admin-edit" v-if="city">

        <div class="admin-edit__form-control">
            <label for="title">Название города</label>
            <p id="title">{{ city.title }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Ссылка ведущая на город</label>
            <p id="link">{{ city.link }}</p>
        </div>

        <div class="admin-edit__form-control">
            <label for="name_predloshniy_padesh">Город в предложном падеже</label>
            <p id="name_predloshniy_padesh">{{ city.name_predloshniy_padesh }}</p>
        </div>

        <router-link :to="{ name: 'admin.city.edit', params: {id: city.id}}">Edit</router-link>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Edit',
    data () {
        return {
            city: null
        }
    },
    props: [],
    mounted() {
        this.getCity();
    },
    methods: {
        getCity() {
            axios.get(`/api/admin/cities/${this.$route.params.id}`)
                .then(res => {
                    this.city = res.data.data
                })
        }
    }
}
</script>
