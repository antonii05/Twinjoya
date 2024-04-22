export interface Proveedor {
  id: number;
  nombre_fiscal: string ;
  direccion: string | null;
  cod_postal: number | null;
  provincia: string | null;
  pais: string | null;
  telefono1: string | null;    
  telefono2: string | null;
  cif: string | null;
  email: string | null;
  activo: number | boolean;
  id_empresa: number;
  id_usuario: number;
  fecha_alta: string | null;
  fecha_modificacion: string | null;
  created_at: string;
  updated_at: string;
}