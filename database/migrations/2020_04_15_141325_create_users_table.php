<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->comment('主键');
                $table->unsignedInteger('role_id')->default(0)->comment('角色ID');
                $table->string('username',50)->default('')->comment('用户名');
                $table->string('password',255)->default('')->comment('密码');
                $table->string('email',255)->default('')->comment('邮箱');
                $table->string('openid',255)->default('')->comment('openid');
                $table->timestamps();
                $table->softDeletes();
            });
            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            $this->down();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
