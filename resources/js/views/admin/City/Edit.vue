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
            <input :disabled="!isDisabled" @click.prevent="update(true)" class="admin-edit__save" type="submit" value="Сохранить">
            <input :disabled="!isDisabled" @click.prevent="update(false)" class="admin-edit__save" type="submit" value="Применить">
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
        update(toIndex) {
            axios.patch(`/api/admin/cities/${this.$route.params.id}`, {
                title: this.entity.title,
                link: this.entity.link,
                coords: this.entity.coords,
                name_predloshniy_padesh: this.entity.name_predloshniy_padesh
            })
                .then(res => {
                    if (toIndex){
                        // this.$router.push({name:'admin.city.show', params: {id: this.$route.params.id}})
                        this.$router.push({name:'admin.city.index'})
                    } else {
                        // this.$router.push({name:'admin.review.edit', params: {id: this.$route.params.id}})
                        this.errors = {"Статус": ["Сохранено"]}
                        document.querySelector('body').scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                    }
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
