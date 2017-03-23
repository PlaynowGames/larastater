<?php

namespace App\Modules\Lancamentos;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lancamentos';

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
