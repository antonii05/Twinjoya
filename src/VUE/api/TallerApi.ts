import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Taller } from "@/VUE/models/Taller";

export default {
    name: 'TallerApi',
    async getTalleres(): Promise<Taller[]> {
        return axios.get('/talleres/getTalleres').then((response: AxiosResponse) => {
            return response.data;
        })
    },
}