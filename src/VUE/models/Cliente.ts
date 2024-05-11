import type { Empresa } from "./Empresa";
import type { Reparacion } from "./Reparacion";

export interface Cliente {
    id: number;
    nombre: string;
    apellidos: string | null;
    email: string | null;
    direccion: string | null;
    cod_postal: number | null,
    provincia: string | null,
    pais: string | null,
    telefono: string | null,
    telefonoFijo: string | null,
    nif: string | null,
    grupo_familiar: string | null,
    activo: boolean | number,
    tipo_cliente: number | null,
    fecha_alta: Date | string | null;
    id_usuario: number; //el id usuario es el empleado que le ha dado
    id_empresa: number;
    //others
    empresa: Empresa;
    reparaciones: Reparacion[];
}