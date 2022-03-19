<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('quantity');
            
            $table->timestamps();
            
            $table->engine = 'InnoDB';
            
            $table->index(['company_id'], 'fk_company_2');
            $table->index(['provider_id'], 'fk_provider');
            $table->index(['product_id'], 'fk_product_2');
            $table->index(['employee_id'], 'fk_employee_2');
            
            $table->foreign('company_id', 'fk_company_2')
                ->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('provider_id', 'fk_provider')
                ->references('id')->on('providers')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('product_id', 'fk_product_2')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('employee_id', 'fk_employee_2')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_providers');
    }
}
