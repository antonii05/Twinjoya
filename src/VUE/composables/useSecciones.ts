import { ref } from 'vue';
import { useRoute, useRouter } from "vue-router";
import type { Seccion } from "@/VUE/models/Seccion";
import FamiliasApi from "@/VUE/api/FamiliasApi";



export function useSeccion() {

    //variables
    const router = useRouter();
    const route = useRoute();
    const secciones = ref([] as Seccion[]);


    //Functions

    //----------------------------------------------CRUD-----------------------------------------

    const modificar = async (newSecciones: Seccion[]) => {
        try {
            await FamiliasApi.actualizarSecciones(newSecciones).then((respuesta)=>{
                if(respuesta.status == 200){
                    window.location.reload();
                }
            })
        } catch (error) {
            console.error('Error en la llamada de la API ERROR: ' + error);
        }
    }

    const eliminar = async (idSeccion: number,index:number) => {
        secciones.value.splice(index,1);
        try {
            await FamiliasApi.eliminarSeccion(idSeccion).then((respuesta) => {
                if (respuesta == 200) {
                    window.location.reload();
                }
            })
        } catch (error) {
            console.error('Error en la llamada de la API ERROR: ' + error);
        }
    }

    //----------------------------------------------CRUD-----------------------------------------

    const cargarSecciones = async () => {
        secciones.value = await FamiliasApi.getSecciones();
    }

    const agregarSeccion = () => {
        let nuevaSecccion = ref({} as Seccion);
        secciones.value.push(nuevaSecccion.value);
    }


    return { secciones, cargarSecciones, modificar, eliminar, agregarSeccion }
}