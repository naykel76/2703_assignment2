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
            $table->unsignedInteger('id');
            $table->timestamps();
            $table->boolean('is_approved');
            $table->string('image')->nullable();
            $table->unsignedInteger('user_id');
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
