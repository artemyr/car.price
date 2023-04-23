<template>
    <div class="admin-edit" v-if="entity">

        <EditTextComponent ref="input" :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Город в предложном падеже',id:'name_predloshniy_padesh',value:entity.name_predloshniy_padesh}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue';

export default {
    name: 'Edit',
    components: {
        EditTextComponent
    },
    data () {
        return {
            entity: null
        }
    },
    props: [],
    mounted() {
        // console.log(this.$refs.input); // udefined
        this.get();
    },
    methods: {
        get() {
            axios.get(`/api/admin/cities/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update() {
            axios.patch(`/api/admin/cities/${this.$route.params.id}`, {
                title: this.entity.title, 
                link: this.entity.link, 
                name_predloshniy_padesh: this.entity.name_predloshniy_padesh
            })
                .then(res => {
                    this.$router.push({name:'admin.city.show', params: {id: this.$route.params.id}})
                })
        }
    },
    computed: {
        isDisabled() {
            return this.entity.title && this.entity.link;
        }
    }
}
</script>
