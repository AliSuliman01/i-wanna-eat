<?php

namespace App\Domain\General\Regions\Regions\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\General\Regions\RegionTranslations\Model\RegionTranslation;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['translations'];

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

    public function translations()
    {
        return $this->belongsToMany(Language::class, 'region_translations')
                    ->using(RegionTranslation::class)
                    ->withPivot(['name'])
                    ->wherePivot('deleted_at',null);
    }
}
