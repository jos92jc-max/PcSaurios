<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function edit()
    {
        return view('admin.empresa.edit', [
            'empresa' => Empresa::firstOrFail(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'descripcion' => ['nullable', 'string'],
            'correo' => ['nullable', 'email', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:40'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:255'],
        ]);

        Empresa::firstOrFail()->update($validated);

        return redirect()->route('admin.empresa.edit')->with('status', 'Datos generales actualizados.');
    }
}
