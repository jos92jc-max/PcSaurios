<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateSeededPasswords extends Command
{
    protected $signature = 'pcsaurios:update-passwords';

    protected $description = 'Actualiza la contraseña de los usuarios sembrados desde SEED_PASSWORD';

    public function handle(): int
    {
        $password = env('SEED_PASSWORD');

        if (in_array($password, [null, '', 'password', 'change-me'], true)) {
            $this->error('Define SEED_PASSWORD en .env con un valor seguro.');

            return self::FAILURE;
        }

        $validator = Validator::make(['password' => $password], [
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first('password'));

            return self::FAILURE;
        }

        $updated = User::whereIn('email', [
            'admin@pcsaurios.test',
            'editor@pcsaurios.test',
            'cliente@pcsaurios.test',
        ])->update([
            'password' => Hash::make($password),
        ]);

        $this->info("Usuarios actualizados: {$updated}");

        return self::SUCCESS;
    }
}
