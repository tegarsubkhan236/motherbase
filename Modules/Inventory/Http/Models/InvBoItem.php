<?php

/**
 * Created by Reliese Model.
 */

namespace Modules\Inventory\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvBoItem
 * 
 * @property int $bo_id
 * @property int $item_id
 * @property int $quantity
 * @property float $price
 * @property string|null $unit
 * @property float $total
 * 
 * @property InvBo $inv_bo
 * @property InvItem $inv_item
 *
 * @package Modules\Inventory\Http\Models
 */
class InvBoItem extends Model
{
	protected $table = 'inv_bo_items';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'bo_id' => 'int',
		'item_id' => 'int',
		'quantity' => 'int',
		'price' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'bo_id',
		'item_id',
		'quantity',
		'price',
		'unit',
		'total'
	];

	public function inv_bo()
	{
		return $this->belongsTo(InvBo::class, 'bo_id');
	}

	public function inv_item()
	{
		return $this->belongsTo(InvItem::class, 'item_id');
	}
}
