import axios, { type AxiosResponse } from 'axios';
import type { Paginador } from '@/models/Paginador';
import type { Actividad } from '@/models/Actividad';
import { useListSortFilter } from '@/stores/useListSortFilter';

export default {
    name: 'ActividadApi',    
    async list(page:number,perpage=10): Promise<Paginador<Actividad[]>> {
        const sort = useListSortFilter();
        return axios.get('/v1/actividades/'+page+'/'+sort.getItemsPerPage+'?sortby='+sort.getSortBy+'&desc='+sort.getSortDesc).then((response: AxiosResponse) => {
            return response.data;
        });
    },
    async get(id:number): Promise<Actividad> {
        return axios.get('/v1/actividad/'+id).then((response: AxiosResponse) => {
            return response.data;
        });
    },
    async nuevaActividad(actividad:Actividad): Promise<String[]>{
        return axios.post('/v1/actividad_nuevo',actividad).then((response: AxiosResponse) => {
            return response.data;
        });
    },
    async actualizarActividad(actividad:Actividad): Promise<Actividad>{
        return axios.post('/v1/actividad_actualizar/'+actividad.id,actividad).then((response: AxiosResponse) => {
            return response.data;
        });
    },
    async eliminarActividad(id:number): Promise<String[]>{
        return axios.delete('/v1/actividad_eliminar/'+id).then((response: AxiosResponse) => {
            return response.data;
        });
    }
}