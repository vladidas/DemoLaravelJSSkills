<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubDistrictTranslationsTable
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class CreateSubDistrictTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_district_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sub_district_id');
            $table->foreign('sub_district_id')
                ->references('id')
                ->on('sub_districts')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('mayor_name');
            $table->string('address');
            $table->string('locale')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_district_translations');
    }
}
