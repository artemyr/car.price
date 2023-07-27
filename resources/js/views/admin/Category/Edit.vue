<template>
    <div class="admin-edit" v-if="entity">

        <div class="error" v-for="(arError, index) in errors">
            <p class="error__label">{{ index }}</p>
            <ul v-for="error of arError">
                <li v-html="error"></li>
            </ul>
        </div>

        <EditNameLinkComponent></EditNameLinkComponent>

        <EditTextComponent :vars="{name:'Подзаголовок',id:'subtitle'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Иконка',id:'icon'}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'
import EditNameLinkComponent from "../../../components/admin/form/EditNameLinkComponent.vue";

export default {
    name: 'Edit',
    components: {
        EditNameLinkComponent,
        EditTextComponent,
    },
    data () {
        return {
            entity: null,
            errors: null
        }
    },
    props: [],
    mounted() {
        this.get();
    },
    methods: {
        get() {
            axios.get(`/api/admin/categories/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update() {
            axios.patch(`/api/admin/categories/${this.$route.params.id}`, {
                title: this.entity.title,
                link: this.entity.link,
                subtitle: this.entity.subtitle,
                icon: this.entity.icon,
            })
                .then(res => {
                    this.$router.push({name:'admin.category.index'})
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
