<?php

namespace App\Domain\Main\Services\Services\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,SoftDeletes;

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
        return $this->belongsToMany(Language::class,'service_translation')
            ->using(ServiceTranslation::class)
            ->wherePivot('deleted_at',null);
    }
}
