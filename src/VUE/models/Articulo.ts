import type { Proveedor } from "./Proveedor";
import type { Seccion } from "./Seccion";

export interface Articulo {
  id: number;
  codigo: string | null;
  descripcion: string | null;
  matricula: string | null;
  medida: string | null;
  id_familia: number;
  id_proveedor: number;
  tipo_compra: string | null;
  barcode: string | null;
  precio_venta: string;
  compras_unidad_medida: number;
  ventas_unidad_medida: number;
  articulo_obsoleto: number | null;
  created_at: string | null;
  updated_at: string | null;
  //RELACIONES
  familia: Seccion | null;
  proveedor: Proveedor | null;
}