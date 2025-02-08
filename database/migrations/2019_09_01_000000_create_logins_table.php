<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('auth_tracker.table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->morphs('authenticatable');
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->json('ip_data')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->string('browser')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('session_id')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('oauth_access_token_id')->nullable();
            $table->unsignedBigInteger('personal_access_token_id')->nullable();

            $table->expirable('expires_at');
            $table->softDeletes();
            
            $table->bigInteger('device_id')->unsigned()->index()->nullable();
            
            $table->string('login_by')->nullable();
            $table->string('login_from')->nullable();
            $table->timestamp('logout_at')->nullable();
            $table->boolean('cleared_by_user')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('auth_tracker.table_name'));
    }
}
