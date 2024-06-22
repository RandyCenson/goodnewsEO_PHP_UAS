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
    Schema::create('forms', function (Blueprint $table) {
        $table->id('id');
        $table->string('name');
        $table->string('email');
        $table->string('phone'); // Ubah ke string jika diperlukan, atau sesuaikan dengan kebutuhan
        $table->string('address'); // Perbaiki penulisan kolom address
        $table->string('party_type');
        $table->string('daerah_party');
        $table->timestamps();
    });
}
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
