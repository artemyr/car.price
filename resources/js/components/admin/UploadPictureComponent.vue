<template>
    <div class="admin-edit__files">
        <div v-if="fileProgress">
            <div class="progress-bar" :style="{ width: fileProgress + '%' }">{{ fileCurrent }}%</div>
        </div>
        <div class="admin-edit__file">
            <div class="picture">
                <input type="hidden" name="" v-model="picture.id">
                <div class="form-group">
                    <input type="text" placeholder="Подпись для файла" v-model="picture.title">
                </div>
                <div class="admin-edit__input-group">
                    <div>
                        <template v-if="picture.id == 0">
                            <input type="file" @change="fileInputChange(picture)">
                            <button type="button" @click="uploadFile(picture)">Загрузить</button>
                        </template>
                    </div>
                    <div>
                        <button type="button" @click="deleteFile()">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    data () {
        return {
            picture: {},
            fileProgress:0,
            fileCurrent:'',
        }
    },
    props: {
        file: Object,
        fieldcode: String
    },
    mounted() {
        this.picture = this.file;
        console.log(fieldcode);
    },
    methods: {
        deleteFile(picture) {
            if (this.picture.id == 0){
                this.picture = {}
                return;
            }

            axios.delete('/admin/picture/' + this.picture.id)
            .then(response => {
                if (response.data.result) {
                    this.picture = {}
                }
            })
        },
        fileInputChange (picture) {
            picture.file = event.target.files[0];
        },
        async uploadFile (picture) {
            let form = new FormData();
            form.append('file', picture.file);
            form.append('title', picture.title);

            await axios.post('/admin/picture', form, {
                onUploadProgress: (itemUpload) => {
                    this.fileProgress = Math.round( (itemUpload.loaded / itemUpload.total) *100 );
                    this.fileCurrent = picture.title + ' ' + this.fileProgress;
                }
            })
            .then(response => {
                picture.id = response.data;
            })
            .catch(error => {
                console.log(error);
            })

            this.fileProgress = 0;
            this.fileCurrent = '';
        }
    }
}
</script>
