import { ref } from 'vue'
import type { Reparacion } from "@/VUE/models/Reparacion";
import ReparacionesApi from "@/VUE/api/ReparacionesApi";
import { useRouter } from 'vue-router'
import { useCliente } from './useCliente';
import { useEmpresa } from './useEmpresa';
import { useTaller } from './useTaller';
import { useProveedor } from './useProveedor';
import { useUtils } from './useUtils';



export const useReparacion = () => {

    //variables
    const ruta = useRouter();
    const reparaciones = ref([] as Reparacion[]);
    const reparacion = ref({} as Reparacion);
    const selector = ref('');
    const isNew = ref(false);

    //COMPOSABLES
    const { clientes, cargarClientes } = useCliente();
    const { empresas, cargarEmpresas } = useEmpresa();
    const { talleres, cargarTalleres } = useTaller();
    const { proveedores, cargarProveedores } = useProveedor();


    //Funciones
    const cargarReparaciones = async () => {
        try {
            reparaciones.value = await ReparacionesApi.getReparaciones();
        } catch (e) {
            console.log('Error en la carga de los reparaciones ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            ruta.push('/reparacion/informacion/' + id);
            reparacion.value = await ReparacionesApi.getReparacion(id);
        } catch (error) {
            console.log('Error en la carga del detalle del reparacion' + error);
        }
    }

    //FUNCTIONS
    const cambiarPestania = (nombre: string) => {
        switch (nombre) {
            case 'datosCliente':
                selector.value = 'datosCliente';
                break;
            case 'reparacion':
                selector.value = 'reparacion';
                break;
            case 'historial':
                selector.value = 'historial';
                break;
            case 'imagen':
                selector.value = 'imagen';
                break;
            case 'g_Apartado':
                selector.value = 'g_Apartado';
                break;
            case 'masDatos':
                selector.value = 'masDatos';
                break;
            default:
                break;
        }
    }

    const nuevaReparacion = () => {
        //TODO ES POSIBLE TENER QUE CAMBIAR EL TERMINADO A  BOOLEANO
        isNew.value = true;
        reparacion.value = {} as Reparacion;
        reparacion.value.diasAprox = 15;
        reparacion.value.terminada = false;
        cargarClientes();
        cargarEmpresas();
        cargarTalleres();
        cargarProveedores();
        ruta.push('/reparaciones/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id_reparacion: number) => {
        try {
            await ReparacionesApi.eliminar(id_reparacion).then((respuesta) => {
                if (respuesta === 200) {
                    //cambiar ruta si hace Falta
                    ruta.push('/home');
                    alert('La reparacion se ha eliminado correctamente');
                }
            })
        } catch (error) {
            console.error('No se ha podido dar de baja la Reparacion ERROR: ' + error);
            alert('No se ha podido dar de baja la Reparacion');
        }
    }

    const modificar = async (nuevoreparacion: Reparacion) => {
        /*  try {
             await reparacionesApi.update(nuevoreparacion).then((respuesta) => {
                 if (respuesta.status == 200) {
                     ruta.push('/reparaciones');
                 }
                 console.log(respuesta);
             });
         } catch (error) {
             console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
         } */
    }

    const crear = async (newReparacion: Reparacion) => {
        try {
            await ReparacionesApi.crear(newReparacion).then((respuesta) => {
                if (respuesta.status == 200) {
                    ruta.push('/reparaciones');
                }
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de creacion a la API ERROR: " + error);
        }
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { reparacion, reparaciones, selector, empresas, talleres, proveedores, clientes, isNew, cambiarPestania, cargarReparaciones, detalle, eliminar, nuevaReparacion, modificar, crear, cargarClientes, cargarEmpresas, cargarTalleres, cargarProveedores }
}