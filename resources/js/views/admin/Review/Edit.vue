<template>
    <div class="admin-edit" v-if="entity">

        <div class="error" v-for="(arError, index) in errors">
            <p class="error__label">{{ index }}</p>
            <ul v-for="error of arError">
                <li v-html="error"></li>
            </ul>
        </div>

        <EditNameLinkComponent></EditNameLinkComponent>

        <EditSelectComponent :vars="{name:'Город',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content'}"></EditTextAreaComponent>

        <EditTextComponent :vars="{name:'Автор',id:'author'}"></EditTextComponent>

        <EditDate :vars="{name:'Дата создания',id:'cr_date'}"></EditDate>

        <EditTextComponent :vars="{name:'Оценка',id:'rate'}"></EditTextComponent>

        <UploadFilesComponent :vars="{name: 'Картинка',id: 'downloads'}" :multiply="false"></UploadFilesComponent>

        <EditTextComponent :vars="{name:'Аватарка',id:'author_ava'}"></EditTextComponent>

        <div>
            <input :disabled="!isDisabled" @click.prevent="update(true)" class="admin-edit__save" type="submit" value="Сохранить">
            <input :disabled="!isDisabled" @click.prevent="update(false)" class="admin-edit__save" type="submit" value="Применить">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import EditTextComponent from '../../../components/admin/form/EditTextComponent.vue'
import EditTextAreaComponent from '../../../components/admin/form/EditTextAreaComponent.vue'
import EditSelectComponent from '../../../components/admin/form/EditSelectComponent.vue'
import UploadFilesComponent from '../../../components/admin/UploadFilesComponent.vue'
import EditNameLinkComponent from "../../../components/admin/form/EditNameLinkComponent.vue";
import EditDate from "../../../components/admin/form/EditDateComponent.vue";

export default {
    name: 'Edit',
    components: {
        EditDate,
        EditNameLinkComponent,
        EditTextComponent,
        EditTextAreaComponent,
        EditSelectComponent,
        UploadFilesComponent
    },
    data () {
        return {
            entity: null,
            errors: null
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
        update(toIndex) {
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
                    if (toIndex){
                        this.$router.push({name: 'admin.review.index'})
                    } else {
                        // this.$router.push({name:'admin.review.edit', params: {id: this.$route.params.id}})
                        this.errors = {"Статус": ["Сохранено"]}
                        document.querySelector('body').scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors
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
