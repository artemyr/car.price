<template>
    <div class="admin-edit">

        <EditTextComponent :vars="{name:'Название',id:'title',}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content',}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Автор',id:'author',}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date',}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Оценка',id:'rate',}"></EditTextComponent>

        <UploadFilesComponent :vars="{name: 'Картинка',id: 'downloads'}" :multiply="false"></UploadFilesComponent>

        <EditTextComponent :vars="{name:'Аватарка',id:'author_ava',}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="store" class="admin-edit__save" type="submit" value="Сохранить">
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
    name: 'Create',
    components: {
        EditTextComponent,
        EditTextAreaComponent,
        EditSelectComponent,
        UploadFilesComponent
    },
    data () {
        return {
            entity: {
                title: null,
                link: null,
                content: null,
                author: null,
                cr_date: null,
                rate: null,
                author_ava: null,
                city_id: null,
                downloads: []
            }
        }
    },
    methods: {
        store() {
            axios.post('/api/admin/reviews', {
                title: this.entity.title, 
                link: this.entity.link, 
                content: this.entity.content,
                author: this.entity.author,
                cr_date: this.entity.cr_date,
                rate: this.entity.rate,
                author_ava: this.entity.author_ava,
                city_id: this.entity.city_id,
                downloads: this.entity.downloads,

            })
                .then(res => {
                    this.$router.push({ name: 'admin.review.index' })
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
