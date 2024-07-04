import type { Articulo } from "./Articulo";

export interface LineaProveedor {
    id?: number;
    nombre_articulo: string;
    ref_proveedor: string;
    descripcion: string;
    unidades: number;
    peso: number;
    precio_unitario: number;
    total_linea: number;
    margen: number;
    precio_coste: number;
    id_proveedor: number;
    id_empresa: number;
    articulo: Articulo
    created_at?: string;
    updated_at?: string;
  }
  