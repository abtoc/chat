<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('sex', 1)->default('M')->after('remember_token');
            $table->date('birthday')->nullable()->after('sex');
            $table->integer('age')->nullable()->after('birthday');
            $table->char('perf', 2)->default('01')->after('age');
            $table->text('comment')->nullable()->after('perf');
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
            $table->dropColumn('comment');
            $table->dropColumn('perf');
            $table->dropColumn('age');
            $table->dropColumn('birthday');
            $table->dropColumn('sex');
        });
    }
}
