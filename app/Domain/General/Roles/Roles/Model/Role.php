<?php

namespace App\Domain\General\Roles\Roles\Model;

use App\Domain\General\Users\Users\Model\User;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

        protected $guarded = [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $hidden = [
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by_user_id',
            'updated_by_user_id',
            'deleted_by_user_id',
        ];
}
