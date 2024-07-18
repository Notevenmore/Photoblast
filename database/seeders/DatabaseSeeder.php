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
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/1.png',
            'x' => 61,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/2.png',
            'x' => 56,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/3.png',
            'x' => 57,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/4.png',
            'x' => 57,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/5.png',
            'x' => 61,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/6.png',
            'x' => 58,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/7.png',
            'x' => 55,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/8.png',
            'x' => 55,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Tempcollage::create([
            'src' => 'storage/template/9.png',
            'x' => 58,
            'y' => 197,
            'width' => 490,
            'height' => 314,
            'margin' => 119
        ]);
        \App\Models\Code::create([
            'code' => 'dfafsda',
            'status' => 'ready',
            'transaction_id' => 1
        ]);
        \App\Models\Code::create([
            'code' => 'dfafsad',
            'status' => 'ready',
            'transaction_id' => 2
        ]);
        \App\Models\Code::create([
            'code' => 'dffasaa',
            'status' => 'ready',
            'transaction_id' => 3
        ]);
        \App\Models\Transaction::create([
            'invoice_number' => 432423423,
            'amount' => 100000,
            'status' => 'settlement',
            'method' => 'qris',
            'email' => 'abdamadhafiz13@gmail.com'
        ]);
        \App\Models\Transaction::create([
            'invoice_number' => 432422423,
            'amount' => 100000,
            'status' => 'settlement',
            'method' => 'qris',
            'email' => 'abdamadhafiz13@gmail.com'
        ]);
        \App\Models\Transaction::create([
            'invoice_number' => 432422323,
            'amount' => 100000,
            'status' => 'settlement',
            'method' => 'qris',
            'email' => 'abdamadhafiz13@gmail.com'
        ]);
    }
}
