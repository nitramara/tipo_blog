<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->integer ('user_id')->index();	//fechaCreacionFichero	
            $table->Date ('fechaCreacionFichero');	//fechaCreacionFichero	
            $table->text ('tipo_id_receptor');		//tipoIdBeneficiario
            $table->bigInteger('num_id_receptor');		//numeroIdBeneficiario
            $table->text ('forma_de_pago');		//formaPago
            $table->text ('codigo_banc_receptor');	//nombreBancoReceptor
            $table->string('oficina_cta_recepbbva');	//oficinaReceptor
            $table->string ('Numero_cta_repbbva');	//numeroCuenta
            $table->string('cta_recp_nachan');		//new camp no estaba definido
            $table->string('Num_cuenta_nachan');	//numeroCuentaNacha
            $table->integer('valor_ope_part_entera');	//valor1
            $table->integer ('valor_ope_decimal'); 	//valor2 //los habian unido entero y decinal
            $table->Date ('fecha_proceso');		//No estaba definida
            $table->Date ('fecha_lim_pago');		//FechaLimitePago
            $table->Date ('fecha_cobro');		//No estaba definida
            $table->string ('cod_ofc_pagadora');        // No estaba definida
            $table->time ('hora_cobro');           	// No estaba definida
            $table->String ('nombre_receptor');		//nombreBeneficiario
            $table->String ('detalle_devol');		//descripcionDevolucion
            $table->String ('Concepto1');		//concepto1
            $table->string ('Codigo_cajero');	        //no estaba definida	
            $table->boolean ('status');	        //no estaba definida	
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
        Schema::dropIfExists('registros');
    }
}
