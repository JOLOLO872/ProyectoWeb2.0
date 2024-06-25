<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToPerfilesTable extends Migration
{
    public function up()
    {
        Schema::table('perfiles', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('perfiles', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}


