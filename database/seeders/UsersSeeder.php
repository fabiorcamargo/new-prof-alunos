<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
            'username' => 'fabiotb',
            'name' => 'Fábio',
            'lastname' => 'Camargo',
            'email' => 'fabiorcamargo@gmail.com',
            'password' => bcrypt('Quem@ma764829'),
            'cellphone' => '42991622889',
            'city' => 'Telêmaco Borba',
            'uf' => 'PR',
            'payment' => 'CARTÃO',
            'role' => 7,
            'ouro' => true,
            'secretary' => 'TB',
            'document' => '05348908908',
            'seller' => 'Fábio Divulgador',
            'courses' => '02 - BANCÁRIO + 10 CURSOS',
            'active' => true,
            'first' => true,
            'image' => 'avatar/fabiotb/Fábio.jpg',
            'contract_date' => '2024-01-26 10:29:35',
            'created_at' => '2024-01-26 10:29:35'
        ],[
            'username' => '61001',
            'name' => 'Fábio',
            'lastname' => 'Aluno',
            'email' => 'fabio.xina@gmail.com',
            'password' => bcrypt('277888'),
            'cellphone' => '42991622889',
            'city' => 'Telêmaco Borba',
            'uf' => 'PR',
            'payment' => 'CARTÃO',
            'role' => 1,
            'ouro' => true,
            'secretary' => 'TB',
            'document' => '05348908908',
            'seller' => 'Fábio Divulgador',
            'courses' => '02 - BANCÁRIO + 10 CURSOS',
            'active' => true,
            'first' => true,
            'image' => 'avatar/default.jpeg',
            'contract_date' => '2024-01-26 10:29:35',
            'created_at' => '2024-01-26 10:29:35'
        ],
        ]
    
    );
    }
}
