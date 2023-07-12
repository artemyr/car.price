<template>
    <div>
        <div class="admin-edit__form-control">
            <label for="title">Название</label>
            <input v-model="$parent.entity.title" @input="transliterate" id="title" type="text">
        </div>
        <div class="admin-edit__form-control">
            <label for="link">Ссылка</label>
            <input v-model="$parent.entity.link" id="link" type="text">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditNameLink',
    methods: {
        transliterate () {
            this.$parent.entity.link = this.$parent.entity.title;
        }
    }
}
</script>
