<?php

namespace App\Domain\General\ActivityTypes\ActivityTypes\Model;

use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use App\Domain\General\Languages\Model\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
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
            return $this->belongsToMany(Language::class,'activity_type_translation')
                        ->using(ActivityTypeTranslation::class)
                        ->wherePivot('deleted_at',null);
        }
}
