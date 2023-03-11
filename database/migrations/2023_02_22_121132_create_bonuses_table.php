<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTable extends Migration
{
    
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('bonuses');
    }
}
