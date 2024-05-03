import axios from "axios";
import type { AxiosResponse } from "axios";
import type { Empresa } from "@/VUE/models/Empresa";

export default {
    name: 'EmpresaApi',
    async getEmpresas(): Promise<Empresa[]> {
        return axios.get('/empresas/getEmpresas').then((response: AxiosResponse) => {
            return response.data;
        });
    },
}