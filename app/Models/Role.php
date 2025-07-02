<?php

namespace App\Models;
use \App\Traits\ColorsTrait;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use ColorsTrait;
    protected $fillable = ['name', 'guard_name', 'color'];

}
