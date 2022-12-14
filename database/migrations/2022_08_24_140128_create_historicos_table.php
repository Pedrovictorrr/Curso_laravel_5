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
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->enum("type",["I","O","T"]);
            $table->double('amount', 15, 2);
            $table->double('total_before', 15, 2);
            $table->double('total_after', 15, 2);
            $table->integer('user_id_transaction')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('historicos');
    }
};
