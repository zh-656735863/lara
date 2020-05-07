<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateList2Table extends Migration
{

    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::create('list2', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 200)->default('')->comment('内容');
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
        Schema::dropIfExists('list2');
    }
}
