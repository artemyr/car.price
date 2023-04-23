<template>
    <div class="admin-edit">

        <EditTextComponent :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>
        
        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Категория',id:'category_id',value:entity.category_id, entity:'categories'}"></EditSelectComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id',value:entity.city_id, entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content',value:entity.content}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Картинка поста',id:'image',value:entity.image}"></EditTextComponent>

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
                image: null,
                category_id: null,
                city_id: null,
            }
        }
    },
    props: [],
    mounted() {
        
    },
    methods: {
        store() {
            axios.post('/api/admin/posts', {
                title: this.entity.title, 
                link: this.entity.link, 
                content: this.entity.content,
                image: this.entity.image,
                city_id: this.entity.city_id,
                category_id: this.entity.category_id
            })
                .then(res => {
                    this.$router.push({ name: 'admin.post.index' })
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
