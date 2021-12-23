<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToUsersImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_images', function (Blueprint $table) {
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id', 'users_id_fk_4757257')->references('id')->on('users');
        });
    }
}
