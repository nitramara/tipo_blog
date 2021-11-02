<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registro;
Use Livewire\WithPagination;

class Registros extends Component
{
    use WithPagination;

    public $active;
    public $q;
    public $sortBy = 'id';
    public $sortAsc = true;

    public $registro;

    public $confirmingRegistroDeletion =false;
    public $confirmingRegistroAdd =false;

    protected $queryString =[
        'active' => ['except' => false],
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc'  => ['except' => true],
    ];

    protected $rules =[
        'registro.fechaCreacionFichero' => 'required',
        'registro.tipo_id_receptor' => 'required',
        'registro.num_id_receptor' => 'required',
        'registro.forma_de_pago' => 'required',
        'registro.codigo_banc_receptor' => 'required',
        'registro.oficina_cta_recepbbva' => 'required',
        'registro.Numero_cta_repbbva' => 'required', 
        'registro.cta_recp_nachan' => 'required',
        'registro.Num_cuenta_nachan' => 'numeric',
        'registro.valor_ope_part_entera' => 'required',
        'registro.valor_ope_decimal' => 'required',
        'registro.fecha_proceso' => 'required',
        'registro.fecha_lim_pago' => 'required',
        'registro.fecha_cobro' => 'required',
        'registro.cod_ofc_pagadora' => 'required',
        'registro.hora_cobro' => 'required',
        'registro.nombre_receptor' => 'required',
        'registro.detalle_devol' => 'required',
        'registro.Concepto1' => 'required',
        'registro.Codigo_cajero' => 'required',
        'registro.status' => 'boolean',
    ];
    
    public function render()
    {
        $registros = Registro::where('user_id', auth()->user()->id)
            ->when($this->q, function( $query) {
                return $query->where(function($query){
                    $query->where('nombre_receptor', 'like', '%'.$this->q . '%')
                        ->orwhere('num_id_receptor', 'like', '%'.$this->q . '%')
                        ->orwhere('detalle_devol', 'like', '%'.$this->q . '%');
                });
            })
            ->when($this->active, function( $query) {
                return $query->active();
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC':'DESC');
          
            $registros = $registros->paginate(5);

        return view('livewire.registros', [
            'registros' => $registros,
            
        ]);
    }
    public function updatingActive()
    {
        $this->resetPage();
    }
    public function updatingq()
    {
        $this->resetPage();
    }
    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this -> sortAsc;
        }
        $this->sortBy=$field;
    }
    public function confirmRegistroDeletion($id) {
        $this->confirmingRegistroDeletion = $id;
    }
    public function deleteRegistro(Registro $registro) 
    {
        $registro->delete();
        $this->confirmingRegistroDeletion = false;
    }
    public function confirmRegistroAdd() 
    {
        $this->reset(['registro']);
        $this->confirmingRegistroAdd = true;
    }
    public function saveRegistro() 
    {
        $this->validate();
        if(isset($this->registro->id)){
            $this->registro->save();
        }else{
        auth()->user()->registros()->create([
            'fechaCreacionFichero' => $this->registro['fechaCreacionFichero'],
            'tipo_id_receptor' => $this->registro['tipo_id_receptor'],
            'num_id_receptor' => $this->registro['num_id_receptor'],
            'forma_de_pago' => $this->registro['forma_de_pago'],
            'codigo_banc_receptor' => $this->registro['codigo_banc_receptor'],
            'oficina_cta_recepbbva' => $this->registro['oficina_cta_recepbbva'],
            'Numero_cta_repbbva' => $this->registro['Numero_cta_repbbva'],
            'cta_recp_nachan' => $this->registro['cta_recp_nachan'],
            'Num_cuenta_nachan' => $this->registro['Num_cuenta_nachan'],
            'valor_ope_part_entera' => $this->registro['valor_ope_part_entera'],
            'valor_ope_decimal' => $this->registro['valor_ope_decimal'],
            'fecha_proceso' => $this->registro['fecha_proceso'],
            'fecha_lim_pago' => $this->registro['fecha_lim_pago'],
            'fecha_cobro' => $this->registro['fecha_cobro'],
            'cod_ofc_pagadora' => $this->registro['cod_ofc_pagadora'],
            'hora_cobro' => $this->registro['hora_cobro'],
            'nombre_receptor' => $this->registro['nombre_receptor'],
            'detalle_devol' => $this->registro['detalle_devol'],
            'Concepto1' => $this->registro['Concepto1'],
            'Codigo_cajero' => $this->registro['Codigo_cajero'],
            'status' => $this->registro['status']?? 0     
        ]);
        }
        $this->confirmingRegistroAdd = false;
    }
    public function confirmRegistroEdit(Registro $registro)
    {
        $this->registro = $registro;
        $this->confirmRegistroAdd = true;
    }
    

}
