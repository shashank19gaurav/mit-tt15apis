<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblcategories', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('cat_name');
            $table->string('details');
//            $table->string('cat_type');
//            $table->string('cat_id');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblcategories', function (Blueprint $table) {
            //
        });
    }
}
