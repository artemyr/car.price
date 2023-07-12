<template>
    <div v-if="vars" class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <input v-model="$parent.entity[vars.id]" :id="vars.id" type="text">
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditText',
    props: ['vars'],
}
</script>
