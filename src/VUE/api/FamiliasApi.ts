import type { Familia } from '@/VUE/models/Familia';
import type { Seccion } from '@/VUE/models/Seccion';
import  axios, { type AxiosPromise, type AxiosResponse }  from "axios";

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
    },


    //Secciones
    async getSecciones():Promise<Seccion[]> {
        return axios.get('/secciones/getSecciones').then((response:AxiosResponse)=>{
            return response.data;
        })
    },
    async eliminarSeccion(idSeccion: number) {
        return (await axios.delete('/secciones/eliminar/'+idSeccion)).status
    },
    async actualizarSecciones(secciones:Seccion[]) {
        return axios.put('/secciones/actualizar',secciones).then((response:AxiosResponse)=>{
            console.log(response.data);
            return response;
        })
    } 
}