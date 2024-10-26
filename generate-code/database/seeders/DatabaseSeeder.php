<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Jurusan::create([
            'name' => 'Ilmu Komputer'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Kimia'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Ekonomi'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Komunikasi'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Kimia'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Mesin'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Perminyakan'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Logistik'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Elektro'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Sipil'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Lingkungan'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Hubungan Internasional'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Geofisika'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Teknik Geologi'
        ]);
        \App\Models\Jurusan::create([
            'name' => 'Manajemen'
        ]);
    }
}
