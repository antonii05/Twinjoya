import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Proveedor } from "@/VUE/models/Proveedor";

export default {
    name: 'ProveedorApi',
    async getProveedores(): Promise<Proveedor[]> {
        return axios.get('/proveedores/getProveedores').then((response: AxiosResponse) => {
            return response.data;
        })
    }
}