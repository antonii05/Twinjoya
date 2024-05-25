import { ref } from "vue";
import { useRouter } from "vue-router";
import FacturasProveedorApi from "../../api/FacturasProveedorApi"; 
import type { FacturasProveedor } from "../../models/FacturasProveedor";

export const useFacturaProveedor = () => {

    //constantes
    const router = useRouter();

    //constantes retornables
    const facturaProveedor = ref({} as FacturasProveedor);
    const facturasProveedor = ref([] as FacturasProveedor[]);   


    //Fucntions
    const buscar = async (campo: string) => {
        let cadena = document.getElementById(campo) as HTMLInputElement;
        try {
            facturasProveedor.value = await FacturasProveedorApi.buscarFactura(cadena.value);
        } catch (error) {
            console.log(error);
        }
    }


    

    //Se intentara que no haga falta pasarle el id sino que al buscar el numero de la factura se autorrellene o en caso de no encontrar se creara una nuevo
    const informacion = () => {
    }

    return {

        //Propiedades
        facturaProveedor,
        facturasProveedor,
        // metodos
        buscar
    }
}