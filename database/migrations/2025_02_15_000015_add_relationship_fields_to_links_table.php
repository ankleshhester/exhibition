<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLinksTable extends Migration
{
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->unsignedBigInteger('link_category_id')->nullable();
            $table->foreign('link_category_id', 'link_category_fk_10446118')->references('id')->on('link_categories');
        });
    }
}
