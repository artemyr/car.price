<template>
    <div class="admin-edit">

        <EditTextComponent ref="input" :vars="{name:'Название',id:'title',value:entity.title}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Ссылка',id:'link',value:entity.link}"></EditTextComponent>

        <EditTextComponent :vars="{name:'Город в предложном падеже',id:'name_predloshniy_padesh',value:entity.name_predloshniy_padesh}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="store" class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue';

export default {
    name: 'Create',
    components: {
        EditTextComponent
    },
    data () {
        return {
            entity: {
                title: null,
                link: null,
                name_predloshniy_padesh: null,
            }
        }
    },
    props: [],
    mounted() {
        
    },
    methods: {
        store() {
            axios.post('/api/admin/cities', {
                title: this.entity.title, 
                link: this.entity.link, 
                name_predloshniy_padesh: this.entity.name_predloshniy_padesh
            })
                .then(res => {
                    this.$router.push({ name: 'admin.city.index' })
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
