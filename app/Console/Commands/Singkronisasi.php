<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Singkronisasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:singkronisasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'http://donasi.test:8080/sinkronisasi';

        // Melakukan request ke URL
        $response = Http::get($url);

        // Memeriksa apakah request berhasil
        if ($response->successful()) {
            // Lakukan sesuatu dengan data yang diterima
            $data = $response->json();
            // Misalnya, simpan data ke database atau proses data
            // $this->info('Data fetched successfully. ' . $data);
            print_r($data);
        } else {
            $this->error('Failed to fetch data from the URL.');
        }
    }
}
