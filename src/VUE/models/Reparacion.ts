import type { Proveedor } from "./Proveedor";
import type { Empresa } from "./Empresa";
import type { Cliente } from "./Cliente";
import type { Taller } from "./Taller";

export interface Reparacion {
  id: number;
  numero_reparacion: number;
  id_empresa: number;
  fecha_recogida: string;
  id_cliente: number;
  id_proveedor: number;
  id_taller: number;
  fecha_prevista: string;
  unidades: number;
  importe: string;
  descripcion: string;
  numero_serie: string;
  presupuesto_taller: string;
  id_usuario: number;
  created_at: string;
  updated_at: string;
  empresa: Empresa;
  cliente: Cliente;
  proveedor: Proveedor;
  taller: Taller;
}
