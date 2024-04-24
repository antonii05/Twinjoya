import axios from "axios";
import type { AxiosAdapter, AxiosResponse } from "axios";
import type { Proveedor } from "@/VUE/models/Proveedor";

export default {
    name: 'ProveedorApi',
    async getProveedores(): Promise<Proveedor[]> {
        return axios.get('/proveedores/getProveedores').then((response: AxiosResponse) => {
            return response.data;
        })
    },
    async detalleProveedor(id_Proveedor: number) {
        return axios.get('/proveedores/getProveedor/' + id_Proveedor).then((response: AxiosResponse) => {
            return response
        });
    },
    async eliminar(id_Proveedor: number) {
        return (await axios.delete('/proveedores/eliminar/' + id_Proveedor)).status;
    },
    async crear(proveedor: Proveedor){
        return axios.post('/proveedores/crear',proveedor).then((response:AxiosResponse)=>{
            return response;
        });
    },
    async update(nuevoProveedor: Proveedor) {
        return axios.put('/proveedores/actualizar',nuevoProveedor).then((response:AxiosResponse)=>{
            console.log(response);
            return response;
        })
    }
}