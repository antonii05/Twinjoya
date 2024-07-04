import axios from "axios";
import type { AxiosError, AxiosResponse } from "axios";
import type { FacturasProveedor } from "@/VUE/models/FacturasProveedor";

export default {
    name: 'FacturasProveedorApi',

    async getFacturasProveedor(): Promise<FacturasProveedor[]> {
        return axios.get('/facturasProveedor/getAll').then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error;
        });
    },
    async getFacturaProveedor(id: number): Promise<FacturasProveedor> {
        return axios.get('/facturasProveedor/get/' + id).then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error;
        });
    },
    async buscarFactura(cadena: string) {
        return axios.get('/facturasProveedor/buscar/?cadena=' + cadena).then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error;
        })
    },
    async crear(facturaProveedor: FacturasProveedor) {
        return axios.post('/facturasProveedor/crear', facturaProveedor).then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error.response?.data;
        })
    },
    async update(facturaProveedor: FacturasProveedor) {
        return axios.put('/facturasProveedor/update', facturaProveedor).then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error.response?.data;
        })
    },
    //No testeado
    async delete(numero_factura: number) {
        return axios.delete('/facturasProveedor/delete/'+numero_factura).then((response: AxiosResponse) => {
            return response.data;
        }).catch((error: AxiosError) => {
            throw error.response?.data;
        })
    },

}