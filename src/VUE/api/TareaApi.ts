import axios, { type AxiosResponse } from "axios";
import { Task } from "../models/Task";
import { User } from "../models/User";

export default {
    name: "TareaApi",
    async listar(): Promise<Task[]> {
        return axios.get("/tareas/recursos").then((response: AxiosResponse) => {
            return response.data;
        });
    },
    async getTareas(): Promise<Task[]> {
        return axios
            .get("/tareas/listarTareas")
            .then((respuesta: AxiosResponse) => {
                return respuesta.data;
            });
    },
    async detalleTarea(id: number): Promise<Task> {
        return axios
            .get("tareas/tarea/" + id)
            .then((respuesta: AxiosResponse) => {
                return respuesta.data;
            });
    },
};
