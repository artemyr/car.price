<template>
    <div class="admin-edit">

        <EditTextComponent :vars="{name:'Название',id:'title'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link'}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город статьи',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content'}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Подпись', id:'tag',}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Текст анонса',id:'preview_text'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date'}"></EditTextComponent>

        <UploadFilesComponent :vars="{name: 'Картинка',id: 'downloads'}" :multiply="false"></UploadFilesComponent>

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
                preview_text: null,
                city_id: null,
                cr_date: null,
                tag: null,
                downloads: []
            }
        }
    },
    methods: {
        store() {
            axios.post('/api/admin/articles', {
                title: this.entity.title, 
                link: this.entity.link,
                content: this.entity.content,
                preview_text: this.entity.preview_text,
                city_id: this.entity.city_id,
                cr_date: this.entity.cr_date,
                tag: this.entity.tag,
                downloads: this.entity.downloads
            })
                .then(res => {
                    this.$router.push({ name: 'admin.article.index' })
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
