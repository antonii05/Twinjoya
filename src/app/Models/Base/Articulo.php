<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 * 
 * @property int $id
 * @property string|null $codigo
 * @property string|null $descripcion
 * @property string|null $matricula
 * @property float|null $medida
 * @property int $id_familia
 * @property int $id_proveedor
 * @property string|null $tipo_compra
 * @property string|null $barcode
 * @property float $precio_venta
 * @property bool $compras_unidad_medida
 * @property bool $ventas_unidad_medida
 * @property bool|null $articulo_en_uso
 * @property int $id_empresa
 * @property int $id_usuario
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Articulo extends Model
{
	protected $table = 'articulos';

	protected $casts = [
		'medida' => 'float',
		'id_familia' => 'int',
		'id_proveedor' => 'int',
		'precio_venta' => 'float',
		'compras_unidad_medida' => 'bool',
		'ventas_unidad_medida' => 'bool',
		'articulo_en_uso' => 'bool',
		'id_empresa' => 'int',
		'id_usuario' => 'int'
	];
}
