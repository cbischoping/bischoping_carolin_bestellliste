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
        Schema::create('bestelllistes', function (Blueprint $table) {
            $table->increments('id'); // geändert
            $table->string('artikel', 255); // Title der Tabelle steht, mit Titlelänge
            $table->mediumText('beschriebung')->nullable(); // Beschreibung die nicht eingefügt werden muss
            $table->boolean('bestellt')->default(false); // Nachfrage ob Bestellung getätigt wurde
            $table->unsignedInteger('user_id'); //Benutzername des Users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bestelllistes');
    }
};
