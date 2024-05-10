<template>
        <CKEditorComponent :editor="editor" v-model="editorData"></CKEditorComponent>
</template>

<script setup lang="ts">
import useCKEditor from "../../composables/useCKEditor";

//Composable del Editor
const { editor, editorData, CKEditorComponent } = useCKEditor();

</script>