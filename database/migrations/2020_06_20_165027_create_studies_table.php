<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->date('date_init');
            $table->date('date_finish');
            $table->enum('status', ['Finalizado', 'Atrasado', 'Andamento']);
            $table->bigInteger('area_id')->unsigned();
            $table->foreign('area_id')
                ->references('id')
                ->on('areas');
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
        Schema::dropIfExists('studies');
    }
}
