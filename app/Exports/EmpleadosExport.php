<?php

namespace App\Exports;

use App\Models\Empleado;
// use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class EmpleadosExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public function view(): View{
        $empleados = Empleado::all();
        return view('empleados.export',[
            'empleados'=>$empleados
        ]);
    }
}
