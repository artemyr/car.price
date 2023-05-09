<template>
    <div class="admin-edit" v-if="entity">                    

        <EditTextComponent :vars="{name:'Название',id:'title'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link'}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content'}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Автор',id:'author'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Оценка',id:'rate'}"></EditTextComponent>

        <UploadFilesComponent :vars="{name: 'Картинка',id: 'downloads'}" :multiply="false"></UploadFilesComponent>

        <EditTextComponent :vars="{name:'Аватарка',id:'author_ava'}"></EditTextComponent>

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
import UploadFilesComponent from '../../../components/admin/UploadFilesComponent.vue'

export default {
    name: 'Edit',
    components: {
        EditTextComponent,
        EditTextAreaComponent,
        EditSelectComponent,
        UploadFilesComponent
    },
    data () {
        return {
            entity: null
        }
    },
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
                author_ava: this.entity.author_ava,
                city_id: this.entity.city_id,
                downloads: this.entity.downloads
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
