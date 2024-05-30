import { ref } from "vue";
import { useRouter } from "vue-router";
import FacturasProveedorApi from "../../api/FacturasProveedorApi";
import type { FacturasProveedor } from "../../models/FacturasProveedor";
import { useEmpresa } from "../useEmpresa";
import { useProveedor } from "../useProveedor";

export const useFacturaProveedor = () => {

    //composables
    const { empresas, cargarEmpresas } = useEmpresa();
    const { proveedores, cargarProveedores } = useProveedor();

    //constantes
    const router = useRouter();

    //constantes retornables
    const selector = ref('');
    const isNew = ref(false);
    const facturaProveedor = ref({} as FacturasProveedor);
    const facturasProveedor = ref([] as FacturasProveedor[]);


    //Fucntions
    const buscar = async (campo: string) => {
        let cadena = document.getElementById(campo) as HTMLInputElement;
        try {
            facturasProveedor.value = await FacturasProveedorApi.buscarFactura(cadena.value);
        } catch (error: any) {
            console.log(error);
            alert(error.response.data);
        }
    }

    const cargarFacturas = async () => {
        try {
            facturasProveedor.value = await FacturasProveedorApi.getFacturasProveedor();
        } catch (error) {
            console.log(error);
        }
    }

    //Se intentara que no haga falta pasarle el id sino que al buscar el numero de la factura se autorrellene o en caso de no encontrar se creara una nuevaFactura
    const informacion = async (id: number) => {
        try {
            facturaProveedor.value = await FacturasProveedorApi.getFacturaProveedor(id);
        } catch (error) {
            console.log(error);
        }
    }

    const cambiarPestania = (puntero: string) => {
        switch (puntero) {
            case 'cabecera':
                selector.value = 'cabecera';
                break;
            case 'otrosCostes':
                selector.value = 'otrosCostes';
                break;
            case 'lineas':
                selector.value = 'lineas';
                break;
            case 'pie':
                selector.value = 'pie';
                break;
            case 'vencimientos':
                selector.value = 'vencimientos';
                break;
            case 'notas':
                selector.value = 'notas';
                break;
            case 'reparaciones':
                selector.value = 'reparaciones';
                break;

            default:
                selector.value = 'cabecera';
                break;
        }
    }

    const nuevaFactura = () => {
        isNew.value = true;
        facturaProveedor.value = {} as FacturasProveedor;
        cargarEmpresas();
        cargarProveedores();
    }

    //--------------------------------ACCIONES CRUD--------------------------------

    const crear = async (factura: FacturasProveedor) => {

    }

    const eliminar = async (numeroFactura: number) => {

    }

    const update = async (factura: FacturasProveedor) => {

    }

    //--------------------------------ACCIONES CRUD--------------------------------

    return {

        //Propiedades
        facturaProveedor,
        facturasProveedor,
        selector,
        isNew,
        empresas,
        proveedores,
        // metodos
        cargarFacturas,
        buscar,
        informacion,
        nuevaFactura,
        cambiarPestania,
        crear,
        eliminar,
        update,

    }
}