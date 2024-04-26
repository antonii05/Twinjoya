import type { Familia } from '@/VUE/models/Familia';
import  axios, { type AxiosResponse }  from "axios";

export default {
    name: 'FamiliaApi',
    async getFamilias(): Promise<Familia[]>{
        return axios.get('/familias/getFamilias').then((response:AxiosResponse)=>{
            return response.data
        });
    },
    async getFamilia(idFamilia:number): Promise<Familia>{
        return axios.get('/familias/getFamilia/'+idFamilia).then((res:AxiosResponse)=>{
            return res.data;
        });
    }
}