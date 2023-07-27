<template>
    <div class="admin-edit" v-if="entity">

        <div class="error" v-for="(arError, index) in errors">
            <p class="error__label">{{ index }}</p>
            <ul v-for="error of arError">
                <li v-html="error"></li>
            </ul>
        </div>

        <EditNameLinkComponent></EditNameLinkComponent>

        <EditSelectComponent :vars="{name:'Город статьи',id:'city_id', entity:'cities'}"></EditSelectComponent>

        <EditTextAreaComponent :vars="{name:'Контент',id:'content'}"></EditTextAreaComponent>

        <EditSelectMulti :vars="{name:'Теги', id:'tags', entity: 'tags'}"></EditSelectMulti>

        <EditTextComponent :vars="{name:'Текст анонса',id:'preview_text'}"></EditTextComponent>

        <EditDate :vars="{name:'Дата создания',id:'cr_date'}"></EditDate>

        <UploadFilesComponent :vars="{name: 'Картинка',id: 'downloads'}" :multiply="false"></UploadFilesComponent>

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
import EditSelectMulti from "../../../components/admin/form/EditSelectMultiComponent.vue";
import EditDate from "../../../components/admin/form/EditDateComponent.vue";

export default {
    name: 'Edit',
    components: {
        EditDate,
        EditSelectMulti,
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
            axios.get(`/api/admin/articles/${this.$route.params.id}`)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update(toIndex) {
            axios.patch(`/api/admin/articles/${this.$route.params.id}`, {
                title: this.entity.title,
                link: this.entity.link,
                content: this.entity.content,
                preview_text: this.entity.preview_text,
                city_id: this.entity.city_id,
                cr_date: this.entity.cr_date,
                tags: this.entity.tags,
                downloads: this.entity.downloads
            })
                .then(res => {
                    if (toIndex){
                        this.$router.push({name:'admin.article.index'})
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
