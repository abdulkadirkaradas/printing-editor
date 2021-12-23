<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToPrintingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('printings_details', function (Blueprint $table) {
            $table->uuid('printing_id')->nullable();
            $table->foreign('printing_id', 'users_id_fk_47895624')->references('id')->on('printings');
        });
    }
}
