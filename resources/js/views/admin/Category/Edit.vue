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

        <EditSelectComponent
            :vars="{name:'Иконка',id:'icon',
                values: [
                    {title:'Машинка с восклицательным знаком', id: 'menu-icon-1'},
                    {title:'Машинка с ключем', id: 'menu-icon-2'},
                    {title:'Машинка', id: 'menu-icon-3'},
                    {title:'Руль', id: 'menu-icon-4'}
                ]}">
        </EditSelectComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update(true)" class="admin-edit__save" type="submit" value="Сохранить">
            <input :disabled="!isDisabled" @click.prevent="update(false)" class="admin-edit__save" type="submit" value="Применить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'
import EditNameLinkComponent from "../../../components/admin/form/EditNameLinkComponent.vue";
import EditSelectComponent from "../../../components/admin/form/EditSelectComponent.vue";

export default {
    name: 'Edit',
    components: {
        EditSelectComponent,
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
        update(toIndex) {
            axios.patch(`/api/admin/categories/${this.$route.params.id}`, {
                title: this.entity.title,
                link: this.entity.link,
                subtitle: this.entity.subtitle,
                icon: this.entity.icon,
            })
                .then(res => {
                    if (toIndex){
                        this.$router.push({name:'admin.category.index'})
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
