import { ref } from 'vue'
import type { Articulo } from "@/VUE/models/Articulo";
import ArticuloApi from "@/VUE/api/ArticuloApi";
import { useRouter } from 'vue-router'


export function useArticulos() {

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
        //! CAMBIAR EL USUARIO AL EMPLEADO AL QUE LE HAYA DADO DE ALTA (SERA EL QUE ESTE LOGEADO)
        router.push('/articulo/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id: number) => {
        /* try {
            await ClientesApi.eliminarCliente(id_cliente).then((status) => {
                if (status == 200) {
                    console.log('El Cliente se ha eliminado correctamente');
                    router.push('/clientes');
                    window.location.reload(); // cambiar mas adelante
                } else {
                    console.log('El Cliente no se ha podido eliminar');
                }
            });
        } catch (error) {

        } */
    }

    const modificar = async (nuevoArticulo: Articulo) => {
        /* try {
            await ClientesApi.update(nuevoCliente).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/clientes');
                }
                console.log(respuesta);
            });
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        } */
    }

    const crear = async (nuevoArticulo: Articulo) => {
        /* try {
            await ClientesApi.crear(nuevoCliente).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/clientes');
                }
                console.log(respuesta);
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de creacion a la API ERROR: " + error);
        } */
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { articulo, articulos, selector, cambiarPestania, cargarArticulos, detalle, eliminar, nuevoArticulo, modificar, crear }
}