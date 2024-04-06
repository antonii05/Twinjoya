export interface Task{
    id: number;
    nombre: string;
    descripcion: string | null;
    datos_adjuntos: string | null;
    fecha_limite: Date | null;
    archivado: boolean | null;
    id_categoria: number;
    id_grupo: number;
    id_usuario : number;
}