<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVisitorsTable extends Migration
{
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_10446151')->references('id')->on('countries');
            $table->unsignedBigInteger('exhibition_id')->nullable();
            $table->foreign('exhibition_id', 'exhibition_fk_10446152')->references('id')->on('exhibitions');
        });
    }
}
