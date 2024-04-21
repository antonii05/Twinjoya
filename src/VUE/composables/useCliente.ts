import { ref, onMounted, onUnmounted } from 'vue'
import type { Cliente } from "@/VUE/models/Cliente";
import ClientesApi from "@/VUE/api/ClientesApi";
import { useRouter } from 'vue-router'



export function useCliente() {

    //variables
    const ruta = useRouter();
    const clientes = ref([] as Cliente[]);
    const cliente = ref({} as Cliente);
    const selector = ref('');


    const cargarClientes = async () => {
        try {
            clientes.value = await ClientesApi.getClientes();
        } catch (e) {
            console.log('Error en la carga de los clientes ERROR: ' + e);
        }
    }

    const detalle = async (id: number) => {
        try {
            ruta.push('/cliente/detalle/' + id);
            cliente.value = await ClientesApi.detalleCliente(id);
            cliente.value.activo = !!cliente.value.activo;
        } catch (error) {
            console.log('Error en la carga del detalle del Cliente' + error);
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
            case 'fechaSenialada':
                selector.value = 'fechaSenialada';
                break;
            //TODO AÑADIR MAS
            case '':
                break;

            default:
                break;
        }
    }

    const nuevoCliente = () => {
        //! CAMBIAR EL USUARIO AL EMPLEADO AL QUE LE HAYA DADO DE ALTA (SERA EL QUE ESTE LOGEADO)
        cliente.value = {} as Cliente;
        cliente.value.activo = true;
        cliente.value.tipo_cliente = -1;
        cliente.value.id_usuario = 1
        ruta.push('/cliente/nuevo');
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    const eliminar = async (id_cliente: number) => {
        try {
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

        }
    }

    const modificar = async (nuevoCliente: Cliente) => {
        try {
            await ClientesApi.update(nuevoCliente).then((respuesta) => {
                console.log(respuesta);
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de update a la API ERROR: " + error);
        }
    }

    const crear = async (nuevoCliente: Cliente) => {
        try {
            await ClientesApi.crear(nuevoCliente).then((respuesta) => {
                console.log(respuesta);
            })
        } catch (error) {
            console.log("Ocurrio un error al hacer la peticion de creacion a la API ERROR: " + error);
        }
    }

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    return { cliente, clientes, selector, cambiarPestania, cargarClientes, detalle, eliminar, nuevoCliente, modificar, crear }
}