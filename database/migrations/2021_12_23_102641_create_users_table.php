<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name")->nullable();
            $table->string("surname")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
