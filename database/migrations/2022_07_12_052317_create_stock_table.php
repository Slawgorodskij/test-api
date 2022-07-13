<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id');
            $table->foreignId('salon_id');
            $table->foreignId('color_id')
                ->default(0);
            $table->integer('year')
                ->default(0);
            $table->integer('price')
                ->default(0)
                ->comment('Цена');
            $table->double('power', 4, 1)
                ->default(null);
            $table->boolean('reserved')
                ->default(false);
            $table->text('desc')
                ->default(null);
            $table->timestamps()
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
