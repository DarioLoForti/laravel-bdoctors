<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_sponsorship', function (Blueprint $table) {

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            // Non sto mettendo cascadeOnDelete() così se anche un medico o una spoonsor venisse cancellata, in questa tabella rimarrebbe il collegamento, non so se possa servire per mantenere i dati del pagamento per esempio
            
            $table->unsignedBigInteger('sponsorship_id');
            $table->foreign('sponsorship_id')->references('id')->on('sponsorships');

            $table->dateTime('start_timestamp')->nullable();
            $table->dateTime('end_timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_sponsorship');
    }
};
