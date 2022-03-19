<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('quantity');
            
            $table->timestamps();
            
            $table->engine = 'InnoDB';
            
            $table->index(['company_id'], 'fk_company');
            $table->index(['client_id'], 'fk_client');
            $table->index(['product_id'], 'fk_product');
            $table->index(['employee_id'], 'fk_employee');
            
            $table->foreign('company_id', 'fk_company')
                ->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('client_id', 'fk_client')
                ->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('product_id', 'fk_product')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('employee_id', 'fk_employee')
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
        Schema::dropIfExists('transaction_clients');
    }
}
