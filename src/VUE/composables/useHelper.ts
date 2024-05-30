import { ref } from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

/* EXPORTA LA CONFIGURACION PARA EL EDITOR DE TEXTO */
export const useCKEditor = () => {
	const editor = ref(ClassicEditor);
	const editorData = ref('');

	return {
		editor,
		editorData,
		CKEditorComponent: CKEditor.component
	};
}

// EXPORTA EL HELPER
export const useHelper = () => {

}