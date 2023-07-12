<template>
    <div>
        <div class="admin-edit__form-control">
            <label for="title">Название</label>
            <input v-model="$parent.entity.title" @input="transliterate" id="title" type="text" :class="{'error': !errorName}">

            <label>Транслитерация <input v-model="transliteration" type="checkbox"></label>

            <label for="link">Ссылка</label>
            <input v-model="$parent.entity.link" id="link" type="text" :class="{'error': !errorLink}">
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import { transliterate as tr } from 'transliteration';

export default {
    name: 'EditNameLink',
    methods: {
        transliterate () {
            if (!this.transliteration) return
            this.$parent.entity.link = tr(this.$parent.entity.title).toLowerCase().replaceAll(/ /g, '-');
        }
    },
    data () {
        return {
            transliteration: true
        }
    },
    computed: {
        errorName () {
            return this.$parent.entity.title
        },
        errorLink () {
            return this.$parent.entity.link
        }
    }
}
</script>
