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
}