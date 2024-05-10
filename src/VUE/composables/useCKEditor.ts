import { ref } from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


export default function useCKEditor() {
  const editor = ref(ClassicEditor);
  const editorData = ref('');

  return {
    editor,
    editorData,
    CKEditorComponent: CKEditor.component
  };
}
