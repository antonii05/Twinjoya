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
 * @property string|null $tipo_medida
 * @property int $id_familia
 * @property int $id_proveedor
 * @property string|null $tipo_compra
 * @property string|null $barcode
 * @property int|null $id_marcas
 * @property float $precio_venta
 * @property string|null $observaciones
 * @property bool|null $articulo_en_uso
 * @property int $id_empresa
 * @property int $id_usuario
 * @property int|null $id_lineaFacturaProveedor
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
		'id_marcas' => 'int',
		'precio_venta' => 'float',
		'articulo_en_uso' => 'bool',
		'id_empresa' => 'int',
		'id_usuario' => 'int',
		'id_lineaFacturaProveedor' => 'int'
	];
}
