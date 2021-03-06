<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{


    protected $table = 'mall_quotes';

    /**
     * Run the migrations.
     * SPU table
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->default(0);
            $table->ipAddress('ip')->nullable()->comment('IP Address');
            $table->string('username')->comment('Customer name');
            $table->string('email')->comment('Customer email');
            $table->string('mobile')->comment('Customer mobile');
            $table->text('remark')->nullable()->comment('Customer remark');
            $table->tinyInteger('flag')->unsigned()->default(0)->comment('1:processing|2:converted|3:failed');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
