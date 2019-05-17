<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->nullable()->after('id');
            $table->string('photographer')->nullable()->after('name');
            $table->string('phone')->nullable()->after('photographer');
            $table->string('congregation')->nullable()->after('phone');

            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('event_id');
            $table->dropColumn(['event_id', 'photographer', 'phone', 'congregation']);
        });
    }
}
