<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{

    public $incrementing = false;

    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable();
            $table->timestamps();
            $table->boolean('is_approved')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
