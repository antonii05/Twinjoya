import type { Empresa } from "./Empresa";
import type { Proveedor } from "./Proveedor";

export interface FacturasProveedor {
  numero_factura: number;
  id_empresa: number;
  numero_recepcion: number;
  fecha_recepcion: string;
  id_proveedor: number;
  fecha_factura: string;
  created_at: string;
  updated_at: string;
  empresa: Empresa;
  proveedor: Proveedor;
}