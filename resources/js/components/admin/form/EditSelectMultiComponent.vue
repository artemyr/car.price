<template>
    <div v-if="vars" class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <select v-model="$parent.entity[vars.id]" :id="vars.id" multiple>
            <option v-for="city in cities" :value="city.id">{{ city.title }}</option>
        </select>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditSelectMulti',
    data () {
        return {
            cities: []
        }
    },
    props: ['vars'],
    mounted() {
        this.get();
        // console.log(this.$parent);
    },
    methods: {
        async get () {
            await axios.get('/api/admin/tags')
            .then(response => {
                this.cities = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
    }
}
</script>
