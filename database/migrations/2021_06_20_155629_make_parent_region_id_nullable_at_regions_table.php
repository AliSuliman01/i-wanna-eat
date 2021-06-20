<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeParentRegionIdNullableAtRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::table('regions',function (Blueprint $table){
                $table->unsignedBigInteger('parent_region_id')->nullable()->change();
            });
        }catch (\Exception $e){
             $this->down();
             throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
