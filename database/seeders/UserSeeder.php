<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'nama_user' => "Adminsatu",
                "email" => "adminsatu@gmail.com",
                "username" => "Admin1"
            ],
            [
                'nama_user' => "Admindua",
                "email" => "admindua@gmail.com",
                "username" => "Admin2"
            ],
            [
                'nama_user' => "Admintiga",
                "email" => "admintiga@gmail.com",
                "username" => "Admin3"
            ]
        ];
        foreach($data as $hasil){
            User::insert([
                "role_id" => 1,
                'nama_user' => $hasil["nama_user"],
                "email" =>  $hasil["email"],
                "username" =>  $hasil["username"],
                "password" => "$2y$10$/e2qQSQS822Jaba6h9MvFu17TsyqCi6pyFfVTQjo2cklkVdnWbWBK" ,// rahasia 1234
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}
