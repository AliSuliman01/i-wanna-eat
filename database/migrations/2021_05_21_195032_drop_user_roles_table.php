<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('user_roles');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try {
            Schema::create('user_roles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('role_id')->constrained()->cascadeOnDelete();
                $table->foreignId('created_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('deleted_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        } catch (\Exception $e) {
            $this->up();
            throw $e;
        }
    }
}
