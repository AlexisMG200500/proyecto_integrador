<?php

namespace App\Exports;

use App\Models\Cliente;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class ClientesExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public function view(): View{
        $clientes = Cliente::all();
        return view('clientes.export',[
            'clientes'=>$clientes
        ]);
    }
}
