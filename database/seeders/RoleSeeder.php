<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        role::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            "admin",
            "supplier"
        ];
        foreach ($data as $hasil) {
            role::insert([
                "nama_role" => $hasil
            ]);
        }
    }
}
