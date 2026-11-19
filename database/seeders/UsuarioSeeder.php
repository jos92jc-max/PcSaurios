<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make(env('SEED_PASSWORD', 'password'));

        $usuarios = [
            ['admin@pcsaurios.test', 'Administrador PcSaurios', 'Administrador'],
            ['editor@pcsaurios.test', 'Editor PcSaurios', 'Editor'],
            ['cliente@pcsaurios.test', 'Cliente PcSaurios', 'Cliente'],
        ];

        foreach ($usuarios as [$email, $nombre, $rol]) {
            $usuario = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $nombre,
                    'password' => $password,
                    'email_verified_at' => now(),
                ]
            );

            $usuario->roles()->syncWithoutDetaching([
                Rol::where('nombre', $rol)->firstOrFail()->id,
            ]);
        }
    }
}
