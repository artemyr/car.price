<template>
    <div class="admin-list">
        <router-link class="admin-list__create" :to="{ name: 'admin.city.create' }">Создать новый</router-link><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(city, index) in cities">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.city.edit', params: {id: city.id} }">{{ city.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ city.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deleteCity(city.id)" class="admin-list__remove" type="submit" value="x">
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
            cities: null,
        }
    },
    props: [],
    mounted() {
        this.getCities()
    },
    methods: {
        async getCities () {
            await axios.get('/api/admin/cities')
            .then(response => {
                this.cities = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteCity(id) {
            axios.delete(`/api/admin/cities/${id}`)
                .then(res => {
                    this.getCities();
                })
        }
    }
}
</script>
