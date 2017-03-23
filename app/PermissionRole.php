<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class PermissionRole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_role';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'permission_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['permission_id', 'role_id'];
}
