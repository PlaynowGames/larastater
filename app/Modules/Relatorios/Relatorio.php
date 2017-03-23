<?php

namespace App\Modules\Relatorios;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'relatorios';

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
    protected $fillable = ['nome', 'valor'];
}
