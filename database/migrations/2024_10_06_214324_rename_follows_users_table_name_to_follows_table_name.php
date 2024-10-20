<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFollowsUsersTableNameToFollowsTableName extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('follows_users', 'follows');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::rename('follows', 'follows_users');
    }
};
