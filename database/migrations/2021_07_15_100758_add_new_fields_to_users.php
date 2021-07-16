<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->unique();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->text('description')->nullable();
            $table->integer('vip')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('job_title');
            $table->dropColumn('company_name');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('description');
            $table->dropColumn('vip');
        });
    }
}
