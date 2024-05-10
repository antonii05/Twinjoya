<template>
    <div>
        <Editor apiKey="uhnx3zu27goizecfc0onpn4m68vwd85ud25pyir8vnloou29" :init="editorInit" v-model="texto">
        </Editor>
    </div>
</template>

<script setup lang="ts">
import { ref, watch,onMounted} from "vue";
import Editor from "@tinymce/tinymce-vue";


const props = defineProps({
    data: {
        type: String,
        required: true,
    },
});

const texto = ref(props.data);

onMounted(async () => {
    texto.value = props.data
});


const editorInit = {
    language: 'es',
    statusbar: false
};

const emit = defineEmits<{  
    (e: 'guardar', texto: string): void
}>();

watch(texto, (newValue) => {
    emit('guardar', newValue);
});

</script>
