import axios, { type AxiosResponse } from "axios";
import type{ Task } from "@/VUE/models/Task";
import type { User } from "@/VUE/models/User";

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
