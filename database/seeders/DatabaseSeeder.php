<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'unitName' => 'Botol'
        ]);

        Unit::create([
            'unitName' => 'Bungkus'
        ]);

        Unit::create([
            'unitName' => 'Dus'
        ]);

        Unit::create([
            'unitName' => 'Karung'
        ]);

        Unit::create([
            'unitName' => 'Kaleng'
        ]);

        Unit::create([
            'unitName' => 'Kg'
        ]);

        Unit::create([
            'unitName' => 'Pcs'
        ]);

        Unit::create([
            'unitName' => 'Lembar'
        ]);

        Unit::create([
            'unitName' => 'Liter'
        ]);

        Unit::create([
            'unitName' => 'Pasang'
        ]);
    }
}
