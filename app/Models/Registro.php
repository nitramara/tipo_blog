<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\User;


class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
    'fechaCreacionFichero',
    'tipo_id_receptor',
    'num_id_receptor',
    'forma_de_pago',
    'codigo_banc_receptor',
    'oficina_cta_recepbbva',
    'Numero_cta_repbbva',
    'cta_recp_nachan',
    'Num_cuenta_nachan',
    'valor_ope_part_entera',
    'valor_ope_decimal',
    'fecha_proceso',
    'fecha_lim_pago',
    'fecha_cobro',
    'cod_ofc_pagadora',
    'hora_cobro',
    'nombre_receptor',
    'detalle_devol',
    'Concepto1',
    'Codigo_cajero',
    'status'	
    ];   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
