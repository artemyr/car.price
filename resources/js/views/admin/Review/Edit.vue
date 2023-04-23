<template>
    <div class="admin-edit" v-if="entity">                    

        <EditTextComponent :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id',value:entity.city_id, entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content',value:entity.content}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Автор',id:'author',value:entity.author}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date',value:entity.cr_date}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Оценка',id:'rate',value:entity.rate}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Картинка',id:'image_path',value:entity.image_path}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Аватарка',id:'author_ava',value:entity.author_ava}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'
import EditTextAreaComponent from '../../../components/admin/form/EditTextAreaComponent.vue'
import EditSelectComponent from '../../../components/admin/form/EditSelectComponent.vue'

export default {
    name: 'Edit',
    components: {
        EditTextComponent,
        EditTextAreaComponent,
        EditSelectComponent
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
            axios.get(`/api/admin/reviews/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update() {
            axios.patch(`/api/admin/reviews/${this.$route.params.id}`, {
                title: this.entity.title, 
                link: this.entity.link,
                content: this.entity.content,
                author: this.entity.author,
                cr_date: this.entity.cr_date,
                rate: this.entity.rate,
                image_path: this.entity.image_path,
                author_ava: this.entity.author_ava,
                city_id: this.entity.city_id
            })
                .then(res => {
                    this.$router.push({name:'admin.review.show', params: {id: this.$route.params.id}})
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
