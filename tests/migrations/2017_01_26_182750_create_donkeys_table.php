<?php

use Illuminate\Database\Migrations\Migration;

class CreateDonkeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donkeys', function ($table) {
            $table->increments('id');
            $table->string('foo')->nullable();
            $table->string('bar')->nullable();
            $table->timestamps();
        });

        DB::table('donkeys')->insert([
            'id' => 1,
            'foo' => 'bar',
            'bar' => 'foo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donkeys');
    }
}
