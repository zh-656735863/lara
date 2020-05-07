<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CareatFamilyTable extends Migration
{
    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::create('family', function (Blueprint $table) {
                $table->increments('id')->comment('主键');
                $table->char('name',255)->comment('姓名');
                $table->char('birthday', 255)->nullable()->comment('生日');
                $table->char('age',10)->nullable()->comment('年龄');
                $table->char('note', 255)->nullable()->comment('备注');
                $table->char('sex')->nullable()->comment('性别');
                $table->binary('image')->nullable();
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
        Schema::dropIfExists('family');
    }
}
