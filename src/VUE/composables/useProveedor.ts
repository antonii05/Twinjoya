import { ref, resolveComponent } from 'vue'
import type { Proveedor } from "@/VUE/models/Proveedor";
import ProveedorApi from "@/VUE/api/ProveedorApt";
import { useRouter } from 'vue-router'



export function useProveedor() {

    //variables
    const ruta = useRouter();
    const proveedores = ref([] as Proveedor[]);
    const proveedor = ref({} as Proveedor);
    const selector = ref('');


    const cargarProveedores = async () => {
        try {
            proveedores.value = await ProveedorApi.getProveedores();
        } catch (e) {
            console.log('Error en la carga de los clientes ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            await ProveedorApi.detalleProveedor(id)
                .then((respuesta) => {
                    ruta.push('/proveedor/informacion/' + id);
                    proveedor.value = respuesta.data;
                    proveedor.value.activo = (Boolean)(proveedor.value.activo);
                }).catch((e) => {
                    console.log('ERROR AL OPERARAR CON LA API DE PROVEEDORES (FRONTEND)');
                });
        } catch (error) {
            console.log('Error al intentar ver el detalle del Proveedor ' + id + 'Error : ' + error);
        }
    }

    //FUNCTIONS
    const cambiarPestania = (nombre: string) => {
        switch (nombre) {
            case 'detalle':
                selector.value = 'detalle';
                break;
            case 'facturacion':
                selector.value = 'facturacion';
                break;
            case 'datosTaller':
                selector.value = 'datosTaller';
                break;
            case 'representante':
                selector.value = 'representante';
                break;
            case 'notas':
                selector.value = 'notas';
                break;
        }
    }

    const nuevoProveedor = () => {
        //! CAMBIAR EL USUARIO AL EMPLEADO AL QUE LE HAYA DADO DE ALTA (SERA EL QUE ESTE LOGEADO)
        proveedor.value = {} as Proveedor;
        proveedor.value.activo = true;
        proveedor.value.id_usuario = 1;
        ruta.push('/proveedor/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id_cliente: number) => {
        /* try {
            await ClientesApi.eliminarCliente(id_cliente).then((status) => {
                if (status == 200) {
                    console.log('El Cliente se ha eliminado correctamente');
                    ruta.push('/clientes');
                    window.location.reload(); // cambiar mas adelante
                } else {
                    console.log('El Cliente no se ha podido eliminar');
                }
            });
        } catch (error) {
            console.log(error);
        } */
    }

    const modificar = async (nuevoCliente: Proveedor) => {
        /* try {
            await ClientesApi.update(nuevoCliente).then((respuesta) => {
                if (respuesta.status == 200) {
                    ruta.push('/clientes');
                }
                console.log(respuesta);
            });
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        } */
    }

    const crear = async (nuevoCliente: Proveedor) => {
        /* try {
            await ClientesApi.crear(nuevoCliente).then((respuesta) => {
                if (respuesta.status == 200) {
                    ruta.push('/clientes');
                }
                console.log(respuesta);
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de creacion a la API ERROR: " + error);
        } */
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { proveedor, proveedores, selector, cambiarPestania, cargarProveedores, detalle, eliminar, nuevoProveedor, modificar, crear }
}