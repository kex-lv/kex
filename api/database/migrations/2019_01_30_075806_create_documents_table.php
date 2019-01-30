<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 40);
            $table->string('nr', 50);
            $table->string('name');
            $table->string('attachment');
            $table->text('notes');
            $table->double('amount');
            $table->string('currency', 3);
            $table->timestamp('date');
            $table->double('amount_base_curr');
            $table->integer('partner_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
