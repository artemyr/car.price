<template>
    <div class="admin-edit" v-if="entity">

        <EditTextComponent :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Подзаголовок',id:'subtitle',value:entity.subtitle}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Иконка',id:'icon',value:entity.icon}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'

export default {
    name: 'Edit',
    components: {
        EditTextComponent,
    },
    data () {
        return {
            entity: null
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
                title: this.title, 
                link: this.link, 
                subtitle: this.subtitle,
                icon: this.icon,
            })
                .then(res => {
                    this.$router.push({name:'admin.category.show', params: {id: this.$route.params.id}})
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
