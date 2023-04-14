<template>
    <div class="admin-list">
        <a class="admin-list__create" href="admin.city.create">Создать новый</a><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(city, index) in cities">
                <div class="admin-list__form-control-item">{{ index }}</div>
                <div class="admin-list__form-control-item">
                    <a class="admin-list__link" :href="city.link">{{ $city.title }}</a>
                </div>
                <div class="admin-list__form-control-item">
                    {{ city.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input class="admin-list__remove" type="submit" value="x">
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    data () {
        return {
            cities: [],
        }
    },
    props: [],
    mounted() {
        this.getCities()
    },
    methods: {
        async getCities () {
            await axios.get('/api/admin/cities', {})
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
