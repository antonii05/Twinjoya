
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
    }
}