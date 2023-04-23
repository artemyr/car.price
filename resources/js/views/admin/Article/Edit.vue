<template>
    <div class="admin-edit" v-if="entity">

        <EditTextComponent :vars="{name:'Название',id:'title'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link'}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город статьи',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content'}"></EditTextAreaComponent>
        
        <EditTextComponent :vars="{name:'Подпись', id:'tag',}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Текст анонса',id:'preview_text'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Картинка',id:'image_path'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date'}"></EditTextComponent>

        <UploadFilesComponent :vars="{name: 'Файлы',id: 'downloads'}"></UploadFilesComponent>
    
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
    props: [],
    mounted() {
        this.get();
    },
    methods: {
        get() {
            axios.get(`/api/admin/articles/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update() {
            axios.patch(`/api/admin/articles/${this.$route.params.id}`, {
                title: this.entity.title, 
                link: this.entity.link,
                content: this.entity.content,
                preview_text: this.entity.preview_text,
                image_path: this.entity.image_path,
                city_id: this.entity.city_id,
                cr_date: this.entity.cr_date,
                tag: this.entity.tag,
                downloads: this.entity.downloads
            })
                .then(res => {
                    this.$router.push({name:'admin.article.show', params: {id: this.$route.params.id}})
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
