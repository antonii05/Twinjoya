import { ref } from 'vue'
import type { Proveedor } from "@/VUE/models/Proveedor";
import ProveedorApi from "@/VUE/api/ProveedorApi";
import { useRoute, useRouter } from 'vue-router'



export function useProveedor() {

    //variables
    const router = useRouter();
    const route = useRoute();

    const proveedores = ref([] as Proveedor[]);
    const proveedor = ref({} as Proveedor);
    const selector = ref('');


    const cargarProveedores = async () => {
        try {
            proveedores.value = await ProveedorApi.getProveedores();
        } catch (e) {
            console.log('Error en la carga del proveedor ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            await ProveedorApi.detalleProveedor(id)
                .then((respuesta) => {
                    router.push('/proveedor/informacion/' + id);
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
        proveedor.value.id_empresa = 1;
        router.push('/proveedor/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id_proveedor: number) => {
        try {
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
        }
    }

    const modificar = async (nuevo: Proveedor) => {
        try {
            await ProveedorApi.update(nuevo).then((respuesta) => {
                if (respuesta.status == 200) {
                    router.push('/proveedores');
                }
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        }
    }

    const crear = async (nuevo: Proveedor) => {

        await ProveedorApi.crear(nuevo).then((respuesta) => {
            if (respuesta.status == 200) {
                router.push('/proveedores');
            }
            console.log(respuesta);
        }).catch((res) => {
            console.log(res)
        })
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { proveedor, proveedores, selector, cambiarPestania, cargarProveedores, detalle, eliminar, nuevoProveedor, modificar, crear }
}