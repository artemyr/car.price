<template>
    <div class="container">
        <div class="" v-if="fileProgress">
            <div class="progress-bar" :style="{ width: fileProgress + '%' }">{{ fileCurrent }}%</div>
        </div>
        <div class="" v-for="(download, index) in downloads">
            <input type="hidden" name="downloads[]" v-model="download.id">
            <div class="form-group">
                <input type="text" placeholder="Подпись для файла" v-model="download.title">
            </div>
            <div class="input-group">

                <template class="" v-if="download.is_new">
                    <input type="file" id="customFile" @change="fileInputChange(download)">
                    <label for="customFile">Выберите файл</label>
                    <button type="button" @click="uploadFile(download)">Загрузить</button>
                </template>

                <button type="button" @click="deleteFile(index)">Удалить</button>
            </div>
        </div>
        <button type="button" @click="addFile">Добавить</button>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    data () {
        return {
            downloads: [],
            fileProgress:0,
            fileCurrent:'',
        }
    },
    mounted() {
        console.log("mount");
    },
    methods: {
        addFile() {
            this.downloads.push({id: 0, title: '', file: [], is_new: true});
        },
        deleteFile(index) {

            if (this.downloads[index].is_new){
                this.downloads.splice(index, 1);
                return;
            }

            axios.delete('/admin/download/' + this.downloads[index].id)
            .then(response => {
                if (response.data.result) {
                    this.downloads.splice(index, 1);
                }
            })
        },
        fileInputChange (download) {
            download.file = event.target.files[0];
        },
        async uploadFile (download) {
            let form = new FormData();
            form.append('file', download.file);
            form.append('title', download.title);

            await axios.post('/admin/download', form, {
                onUploadProgress: (itemUpload) => {
                    this.fileProgress = Math.round( (itemUpload.loaded / itemUpload.total) *100 );
                    this.fileCurrent = download.name + ' ' + this.fileProgress;
                }
            })
            .then(response => {
                download.id = response.data;
                download.is_new = false;
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