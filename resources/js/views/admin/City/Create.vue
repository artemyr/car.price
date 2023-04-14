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
            <input :disabled="!isDisabled" @click.prevent="store" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'Create',
    data () {
        return {
            title: null,
            link: null,
            name_predloshniy_padesh: null
        }
    },
    props: [],
    mounted() {
        
    },
    methods: {
        store() {
            axios.post('/api/admin/cities', {title: this.title, link: this.link, name_predloshniy_padesh: this.name_predloshniy_padesh})
                .then(res => {
                    this.$router.push({ name: 'admin.city.index' })
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
