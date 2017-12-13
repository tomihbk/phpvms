<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Fare
 *
 * @package App\Models
 */
class Fare extends Model
{
    public $table = 'fares';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'code',
        'name',
        'price',
        'cost',
        'capacity',
        'notes',
        'active',
    ];

    protected $casts = [
        'code'      => 'string',
        'name'      => 'string',
        'price'     => 'float',
        'cost'      => 'float',
        'capacity'  => 'integer',
        'active'    => 'boolean',
    ];

    public static $rules = [
        'code' => 'required',
        'name' => 'required',
    ];

    /**
     * any foreign keys
     */

    public function subfleets() {
        return $this->belongsToMany(
            'App\Models\Subfleet',
            'subfleet_fare'
        )->withPivot('price', 'cost', 'capacity');
    }

}
