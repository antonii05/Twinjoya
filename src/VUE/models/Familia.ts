export interface Familia {
    id: number;
    codigo: string;
    descripcion_familia: string | null;
    id_seccion: number;
    unidad_medida: string | null;
    texto_etiqueta: string | null;
    contador: number | null;
    descuento: string | null;
    imprimir_ventas: number | null;
    compras_unidad_medida: number;
    compras_has_metal: number;
    compras_subcuenta_asociada: string | null;
    ventas_unidad_medida: number;
    ventas_subcuenta_asociada: string | null;
    created_at: string | null;
    updated_at: string | null;
}