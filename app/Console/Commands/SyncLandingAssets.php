<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class SyncLandingAssets extends Command
{
    protected $signature = 'pcsaurios:sync-landing';

    protected $description = 'Publica la portada estática y sus recursos en public/';

    public function handle(Filesystem $files): int
    {
        $archivos = [
            base_path('index.html') => public_path('index.html'),
            base_path('css/styles.css') => public_path('css/styles.css'),
            base_path('js/main.js') => public_path('js/main.js'),
        ];

        foreach ($archivos as $origen => $destino) {
            if (! $files->exists($origen)) {
                $this->error("No encontrado: {$origen}");

                return self::FAILURE;
            }

            $files->ensureDirectoryExists(dirname($destino));
            $files->copy($origen, $destino, true);
        }

        $origenImagenes = base_path('img');
        $destinoImagenes = public_path('img');

        if (! $files->isDirectory($origenImagenes)) {
            $this->error("No encontrado: {$origenImagenes}");

            return self::FAILURE;
        }

        $files->ensureDirectoryExists($destinoImagenes);
        $files->copyDirectory($origenImagenes, $destinoImagenes);

        $this->info('Portada sincronizada en public/.');

        return self::SUCCESS;
    }
}
