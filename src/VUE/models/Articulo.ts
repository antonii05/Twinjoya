import type { Empresa } from "./Empresa";
import type { Proveedor } from "./Proveedor";
import type { Seccion } from "./Seccion";

export interface Articulo {
  id: number;
  codigo: string | null;
  descripcion: string | null;
  matricula: string | null;
  medida: string | null;
  tipo_medida: string | null;
  id_familia: number;
  id_proveedor: number;
  tipo_compra: string | null;
  barcode: string | null;
  precio_venta: string;
  observaciones: string | null; 
  articulo_en_uso: number | boolean | null;
  id_lineaFacturaProveedor: number | null;
  created_at: string | null;
  updated_at: string | null;
  //RELACIONES
  familia: Seccion;
  proveedor: Proveedor;
  empresa: Empresa;
}