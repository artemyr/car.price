<template>
    <div class="admin-edit">

        <EditTextComponent :vars="{name:'Название',id:'title'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link'}"></EditTextComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextComponent :vars="{name:'Подзаголовок',id:'subtitle'}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Иконка',id:'icon'}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="store" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'
import EditSelectComponent from '../../../components/admin/form/EditSelectComponent.vue'

export default {
    name: 'Create',
    components: {
        EditTextComponent,
        EditSelectComponent
    },
    data () {
        return {
            entity: {
                title: null,
                link: null,
                subtitle: null,
                icon: null,
                city_id: null
            }
        }
    },
    props: [],
    mounted() {
        
    },
    methods: {
        store() {
            axios.post('/api/admin/categories', {
                title: this.entity.title, 
                link: this.entity.link, 
                subtitle: this.entity.subtitle,
                subtitle: this.entity.icon,
                city_id: this.entity.city_id
            })
                .then(res => {
                    this.$router.push({ name: 'admin.category.index' })
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
