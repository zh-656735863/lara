<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    //Run the migrations.
    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::create('article', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('uid')->default(0)->comment('用户ID');
                $table->string('title', 200)->default('')->comment('标题');
                $table->string('desn', 500)->default('')->comment('描述');
                $table->text('cnt')->comment('文章内容');
                $table->timestamps();
                $table->softDeletes();
                $table->char('ip',15)->default('')->comment('ip地址');
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
        Schema::dropIfExists('article');
    }
}
