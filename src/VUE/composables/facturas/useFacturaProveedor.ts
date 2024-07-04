import { ref } from "vue";
import { useRouter } from "vue-router";
import FacturasProveedorApi from "../../api/FacturasProveedorApi";
import type { FacturasProveedor } from "../../models/FacturasProveedor";
import { useEmpresa } from "../useEmpresa";
import { useProveedor } from "../useProveedor";
import type { LineaProveedor } from "VUE/models/LineaProveedor";
import type { Articulo } from "VUE/models/Articulo";
import { useArticulos } from "../useArticulo";

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
    const facturaInicial: FacturasProveedor = {
        numero_factura: 0,
        id_empresa: 0,
        fecha_recepcion: '',
        id_proveedor: 0,
        lineas: [],
    };


    //Fucntions
    const buscar = async (inputId: string) => {
        let cadena = document.getElementById(inputId) as HTMLInputElement;
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
            alert(error)
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
        facturaProveedor.value = facturaInicial;
        //Se cañade la primera linea 
        cargarEmpresas();
        cargarProveedores();
    }

    const aniadirLinea = (factura: FacturasProveedor) => {
        factura.lineas.push({} as LineaProveedor);
    }

    const eliminarFila = (lineas: LineaProveedor[], indice: number) => {
        if (indice > -1 && indice < lineas.length) {
            lineas.splice(indice, 1);
        }
    }

    const nuevoArticulo = (lineaProveedor: LineaProveedor) => {
        lineaProveedor.articulo = {} as Articulo
        lineaProveedor.articulo.articulo_en_uso = true
    }

    //--------------------------------ACCIONES CRUD--------------------------------

    const crear = async (factura: FacturasProveedor) => {
        try {
            const data = await FacturasProveedorApi.crear(factura);
            alert('Creacion con exito');
            console.log(data);
        } catch (error) {
            console.log(error);
        }
    }

    const update = async (factura: FacturasProveedor) => {
        delete factura.empresa;
        delete factura.proveedor;
        try {
            facturasProveedor.value = await FacturasProveedorApi.update(factura);
            alert('Se ha actualizado la factura del proveedor');
        } catch (error) {
            console.log(error)
        }
    }

    const eliminar = async (numeroFactura: number) => {
        try {
            await FacturasProveedorApi.delete(numeroFactura);
            router.push('/facturas/proveedores');
            window.location.reload();
            alert('La factura se ha eliminado con exito');
        } catch (error) {
            console.log(error)
        }
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
        nuevoArticulo,
        // metodos
        cargarFacturas,
        buscar,
        informacion,
        nuevaFactura,
        cambiarPestania,
        aniadirLinea,
        eliminarFila,
        crear,
        eliminar,
        update,
    }
}