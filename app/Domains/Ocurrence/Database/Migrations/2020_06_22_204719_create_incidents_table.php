<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('incidents', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('company_id')->unsigned();
            $table->uuid('incident_id');
            $table->string('title');
            $table->string('description');
            $table->decimal('value');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
}
