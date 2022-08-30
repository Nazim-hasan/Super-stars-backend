<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'first_name'=>'Nazim',
            'last_name'=>'Hasan',
            'email'=>'nazim@gmail.com',
            'phone'=>'01777862911',
            'password'=>'Nazim12345',
        ]);
        DB::table('clients')->insert([
            'first_name'=>'Mr X',
            'last_name'=>'Y',
            'email'=>'mrx@gmail.com',
            'phone'=>'01777862911',
            'password'=>'mx12345',
        ]);
        DB::table('clients')->insert([
            'first_name'=>'Mr Y',
            'last_name'=>'Z',
            'email'=>'mrxyz@gmail.com',
            'phone'=>'01777862911',
            'password'=>'xyz1234',
        ]);
    }
}
