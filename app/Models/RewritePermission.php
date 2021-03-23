<?php

namespace App\Models;

use App\Util\Arr;
use App\Traits\Timestamp;
use Spatie\Permission\Models\Permission;

class RewritePermission extends Permission
{
    use Timestamp;

    protected $table="permissions";

    /**
     * 树形结构
     *
     *
     * @return array
     */
    public static function tree(): array
    {
        $permissions = Permission::orderByDesc('sort')
            ->get();

        return Arr::getTree($permissions->toArray());
    }
}
