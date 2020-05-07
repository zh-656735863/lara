<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateList3Table extends Migration
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
            Schema::create('list3', function (Blueprint $table) {
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
        Schema::dropIfExists('list3');
    }
}
