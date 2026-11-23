<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Usuario;

class UsuariosExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        $usuarios = Usuario::all();

        return view('usuarios.export', [
            'usuarios' => $usuarios,
        ]);

    }
}
