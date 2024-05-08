import { ref } from 'vue'
import type { Articulo } from "@/VUE/models/Articulo";
import ArticuloApi from "@/VUE/api/ArticuloApi";
import { useRouter } from 'vue-router'


export const useArticulos = () => {

    //variables
    const router = useRouter();
    const articulos = ref([] as Articulo[]);
    const articulo = ref({} as Articulo);
    const selector = ref('');


    const cargarArticulos = async () => {
        try {
            articulos.value = await ArticuloApi.getArticulos();
        } catch (e) {
            console.log('Error en la carga de los articulos ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            router.push('/articulos/informacion/' + id);
            articulo.value = await ArticuloApi.getArticulo(id);
            articulo.value.articulo_en_uso = (Boolean)(articulo.value.articulo_en_uso)
        } catch (error) {
            console.log('Error en la carga del detalle del Articulo' + error);
        }
    }

    //FUNCTIONS
    const cambiarPestania = (nombre: string) => {
        switch (nombre) {
            case 'detalle':
                selector.value = 'detalle';
                break;
            case 'ultimaCompra':
                selector.value = 'ultimaCompra';
                break;
            case 'notas':
                selector.value = 'notas';
                break;
            case 'imagen':
                selector.value = 'imagen';
                break;
            //TODO AÑADIR MAS
            case 'inventario':
                selector.value = 'inventario';
                break;
            case 'masDatos':
                selector.value = 'masDatos';
                break;
            case 'web':
                selector.value = 'web';
                break;


            default:
                break;
        }
    }

    const nuevoArticulo = () => {
        articulo.value.articulo_en_uso = true
        router.push('/articulo/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id: number) => {
        try {
            await ArticuloApi.eliminar(id).then((respuesta) =>{
                if(respuesta == 200){
                    router.push('/articulos');
                    window.location.reload();
                    alert('El articulo se ha eliminado correctamente')
                }
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de error a la API ERROR: " + error);
        }
    }

    const modificar = async (nuevoArticulo: Articulo) => {
        nuevoArticulo.id_familia = nuevoArticulo.familia.id;
        nuevoArticulo.id_proveedor = nuevoArticulo.proveedor.id;
        try {
            await ArticuloApi.actualizar(nuevoArticulo).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/articulos');
                }
                console.log(respuesta);
            });
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        }
    }

    const crear = async (nuevoArticulo: Articulo) => {
        nuevoArticulo.id_familia = nuevoArticulo.familia.id;
        nuevoArticulo.id_proveedor = nuevoArticulo.proveedor.id;
        try {
            await ArticuloApi.crear(nuevoArticulo).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/articulos');
                }
                console.log(respuesta);
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de creacion a la API ERROR: " + error);
        }
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { articulo, articulos, selector, cambiarPestania, cargarArticulos, detalle, eliminar, nuevoArticulo, modificar, crear }
}