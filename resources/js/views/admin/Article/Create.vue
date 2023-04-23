<template>
    <div class="admin-edit">

        <EditTextComponent :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город статьи',id:'city_id',value:entity.city_id, entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content',value:entity.content}"></EditTextAreaComponent>


        <!-- <EditSelectMultiComponent :vars="{name:'Tag', id:'tag', value:entity.tag, entity:'tags'}"></EditSelectMultiComponent> -->
        <!-- <div class="admin-edit__form-control">
            <label for="tag">Tag</label>
            <textarea v-model="entity.tag" id="tag" type="text"></textarea>
        </div> -->



        <EditTextComponent :vars="{name:'Текст анонса',id:'preview_text',value:entity.preview_text}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Картинка',id:'image_path',value:entity.image_path}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Дата создания',id:'cr_date',value:entity.cr_date}"></EditTextComponent>

        <!-- <div class="admin-edit__form-control">
            <label for="file">Файлы</label>
            <input v-model="entity.file" id="file" type="text">
        </div> -->


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

export default {
    name: 'Create',
    components: {
        EditTextComponent,
        EditTextAreaComponent,
        EditSelectComponent
    },
    data () {
        return {
            entity: {
                title: null,
                link: null,
                content: null,
                preview_text: null,
                image_path: null,
                city_id: null,
                cr_date: null,
            }
        }
    },
    props: [],
    mounted() {
        
    },
    methods: {
        store() {
            axios.post('/api/admin/articles', {
                title: this.entity.title, 
                link: this.entity.link,
                content: this.entity.content,
                preview_text: this.entity.preview_text,
                image_path: this.entity.image_path,
                city_id: this.entity.city_id,
                cr_date: this.entity.cr_date,
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
