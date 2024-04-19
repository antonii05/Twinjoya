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

    //-----------------------------------------ACCIONES CRUD---------------------------------------------

    
    
    //-----------------------------------------ACCIONES CRUD---------------------------------------------


    return { cliente, clientes, selector, cambiarPestania, cargarClientes, detalle }
}