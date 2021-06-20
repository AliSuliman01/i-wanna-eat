<?php

namespace App\Domain\General\Regions\RegionTypes\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionType extends Model
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


    public function translations(){
        return $this->belongsToMany(Language::class,'region_type_translations')
            ->using(RegionTypeTranslation::class)
            ->withPivot(['name'])
            ->wherePivot('deleted_at',null);
    }
}
