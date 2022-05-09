<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_kh');
            $table->string('name_en')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('part_of')->nullable();
            $table->string('member')->nullable();
            $table->string('photo')->nullable();
            $table->string('other')->nullable();
            $table->integer('created_by');
            $table->rememberToken();
            $table->tinyInteger('active')->default(1)->comment("1=active; 0=deleted");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
