import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Reparacion } from "@/VUE/models/Reparacion";

export default {
    name: 'ReparacionesApi',
    async getReparaciones(): Promise<Reparacion[]> {
        return axios.get('/reparaciones/getReparaciones').then((response: AxiosResponse) => {
            return response.data;
        })
    },
    async getReparacion(id: number): Promise<Reparacion> {
        return axios.get('/reparaciones/getReparacion/' + id).then((response: AxiosResponse) => {
            return response.data
        })
    },
    async crear(newReparacion: Reparacion) {
        return axios.post('/reparaciones/crear', newReparacion).then((response: AxiosResponse) => {
            console.log(response.data);
            return response
        })
    },
    async actualizar(newReparacion: Reparacion) {
        return axios.put('/reparaciones/actualizar', newReparacion).then((response: AxiosResponse) => {
            console.log(response);
            return response
        })
    },
    async eliminar(id: number) {
        return (await axios.delete('/reparaciones/eliminar/' + id)).status;
    }

}