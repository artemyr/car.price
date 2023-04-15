<template>
    <div class="admin-list">
        <router-link class="admin-list__create" :to="{ name: 'admin.review.create' }">Создать новый</router-link><br>

        <div class="admin-list__body">
            <div class="admin-list__form-control">
                <div class="admin-list__form-control-item">№</div>
                <div class="admin-list__form-control-item">Название</div>
                <div class="admin-list__form-control-item">Ссылка</div>
                <div class="admin-list__form-control-item"></div>
            </div>

            <div class="admin-list__form-control" v-for="(review, index) in reviews">
                <div class="admin-list__form-control-item">{{ index + 1 }}</div>
                <div class="admin-list__form-control-item">
                    <router-link class="admin-list__link" :to="{ name: 'admin.review.edit', params: {id: review.id} }">{{ review.title }}</router-link>
                </div>
                <div class="admin-list__form-control-item">
                    {{ review.link }}
                </div>
                <div class="admin-list__form-control-item">
                    <input @click.prevent="deleteReview(review.id)" class="admin-list__remove" type="submit" value="x">
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
            reviews: null,
        }
    },
    props: [],
    mounted() {
        this.get()
    },
    methods: {
        async get () {
            await axios.get('/api/admin/reviews')
            .then(response => {
                this.reviews = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        deleteReview(id) {
            axios.delete(`/api/admin/reviews/${id}`)
                .then(res => {
                    this.get();
                })
        }
    }
}
</script>
