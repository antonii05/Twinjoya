
import type { Articulo } from 'VUE/models/Articulo';
import axios from "axios";
import type { AxiosResponse } from 'axios';

export default {
    name: 'ArticuloApi',
    async getArticulos(): Promise<Articulo[]> {
        return axios.get('/articulos/getArticulos').then((response: AxiosResponse) => {
            return response.data
        });
    },
    async getArticulo(idArticulo: number): Promise<Articulo> {
        return axios.get('/articulos/getArticulo/' + idArticulo).then((res: AxiosResponse) => {
            return res.data;
        });
    },
    async crear(newArticulo: Articulo) {
        return axios.post('/articulos/crear', newArticulo).then((res: AxiosResponse) => {
            return res;
        });
    },
    async actualizar(newArticulo: Articulo) {
        return axios.put('/articulos/actualizar', newArticulo).then((res: AxiosResponse) => {
            return res;
        });
    },
    async eliminar(idArticulo: number): Promise<Number> {
        return (((await axios.delete('/articulos/eliminar/' + idArticulo)).status));
    },
}