import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Cliente } from "@/VUE/models/Cliente";

export default {
    name: 'ClientesApi',
    async getClientes(): Promise<Cliente[]> {
        return axios.get('/clientes/getClientes').then((response: AxiosResponse) => {
            return response.data;
        })
    },
    async detalleCliente(id: number):Promise<Cliente>{
        return axios.get('/clientes/recursos/' + ""+id).then((response :AxiosResponse) =>{
            return response.data 
        })
    }
}