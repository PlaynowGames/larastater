<?php

namespace App\Modules\Financas;

use Illuminate\Database\Eloquent\Model;

class Financa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'financas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'data', 'valor'];
}
