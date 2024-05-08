import { ref } from 'vue';
import type { Proveedor } from "@/VUE/models/Proveedor";
import FamiliasApi from "@/VUE/api/FamiliasApi";
import { useRoute, useRouter } from 'vue-router'
import type { Familia } from 'VUE/models/Familia';



export const useFamilias = () => {

    //variables
    const router = useRouter();
    const route = useRoute();
    const familias = ref([] as Familia[]);
    const familia = ref({} as Familia);

    const cargarFamilias = async () => {
        try {
            familias.value = await FamiliasApi.getFamilias();
        } catch (e) {
            console.log('Error en la carga del proveedor ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            await FamiliasApi.getFamilia(id)
                .then((respuesta) => {
                    router.push('/configuracion/familia/' + id);
                    familia.value = respuesta;
                }).catch((e) => {
                    console.log('ERROR AL OPERARAR CON LA API DE FAMILIAS (FRONTEND)');
                });
        } catch (error) {
            console.log('Error al intentar ver el detalle de la Familia ' + id + 'Error : ' + error);
        }
    }

    //FUNCTIONS
    
    const nuevaFamilia = () => {       
        //agregar codigo here
        router.push('/configuracion/familias/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id_proveedor: number) => {
        /* try {
            let status = await ProveedorApi.eliminar(id_proveedor);
            if (status == 200) {
                if (!route.params.id) {
                    window.location.reload();
                }
                router.push('/proveedores');
            } else {
                alert('no se ha podido eliminar el proveedor')
            }
        } catch (err) {
            console.log('Fallo al llamar a la API');
        } */
    }

    const modificar = async (nuevo: Familia) => {
        /* try {
            await ProveedorApi.update(nuevo).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/proveedores');
                }
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        } */
    }

    const crear = async (nuevo: Familia) => {

       /*  await ProveedorApi.crear(nuevo).then((respuesta) => {
            if (respuesta.status == 200) {
                router.push('/proveedores');
            }
            console.log(respuesta);
        }).catch((res) => {
            console.log(res)
        }) */
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { familia, familias, cargarFamilias, detalle, eliminar, nuevaFamilia, modificar, crear }
}