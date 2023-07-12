<template>
    <div class="admin-edit" v-if="entity">

        <div class="error" v-for="(arError, index) in errors">
            <p class="error__label">{{ index }}</p>
            <ul v-for="error of arError">
                <li v-html="error"></li>
            </ul>
        </div>

        <EditNameLinkComponent></EditNameLinkComponent>

        <EditTextComponent :vars="{name:'Город в предложном падеже',id:'name_predloshniy_padesh'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Координаты',id:'coords'}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue';
import EditNameLinkComponent from '../../../components/admin/form/EditNameLinkComponent.vue';

export default {
    name: 'Edit',
    components: {
        EditTextComponent,
        EditNameLinkComponent
    },
    data () {
        return {
            entity: null,
            errors: null
        }
    },
    mounted() {
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
                coords: this.entity.coords,
                name_predloshniy_padesh: this.entity.name_predloshniy_padesh
            })
                .then(res => {
                    // this.$router.push({name:'admin.city.show', params: {id: this.$route.params.id}})
                    this.$router.push({name:'admin.city.index', params: {id: this.$route.params.id}})
                })
                .catch(error => {
                    this.errors = error.response.data.errors
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
