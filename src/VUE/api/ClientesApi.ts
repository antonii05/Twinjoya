import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Cliente } from "@/VUE/models/Cliente";

//UTILIZAR PUT PARA MODIFICAR Y POST PARA CREAR

export default {
    name: 'ClientesApi',
    async getClientes(): Promise<Cliente[]> {
        return axios.get('/clientes/getClientes').then((response: AxiosResponse) => {
            return response.data;
        })
    },
    async detalleCliente(id: number): Promise<Cliente> {
        return axios.get('/clientes/recursos/' + "" + id).then((response: AxiosResponse) => {
            return response.data
        })
    },
    //Se puede cambiar
    async eliminarCliente(id_cliente: number) {
        return (await axios.delete('/clientes/eliminar/' + id_cliente)).status;
    },
    async crear(cliente: Cliente) {
        return axios.post('/clientes/crear', cliente).then((response: AxiosResponse) => {
            return response;
        })
    },
    async update(cliente: Cliente) {
        return axios.put('/clientes/actualizar', cliente).then((response: AxiosResponse) => {
            return response;
        })
    },
}