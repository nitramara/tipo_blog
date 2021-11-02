<?php

namespace App\Imports;

use App\Models\Registro;
use Maatwebsite\Excel\Concerns\ToModel;

class RegistrosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Registro([
            //'fechaCreacionFichero'  => $row['0'],
            'tipo_id_receptor'      => $row['1'],
            'num_id_receptor'       => $row['2'],
            'forma_de_pago'         => $row['3'],
            'codigo_banc_receptor'  => $row['4'],
            'oficina_cta_recepbbva' => $row['5'],
            'Numero_cta_repbbva'    => $row['6'],
            'cta_recp_nachan'       => $row['7'],
            'Num_cuenta_nachan'     => $row['8'],
            'valor_ope_part_entera' => $row['9'],
            'valor_ope_decimal'     => $row['10'],
            'fecha_proceso'         => $row['11'],
            'fecha_lim_pago'        => $row['12'],
            'fecha_cobro'           => $row['13'],
            'cod_ofc_pagadora'      => $row['14'],
            'hora_cobro'            => $row['15'],
            'nombre_receptor'       => $row['16'],
            'detalle_devol'         => $row['17'],
            'Concepto1'             => $row['18'],
            'Codigo_cajero'         => $row['19'],
            //'status'                => $row['0'],	
        ]);
    }
}
