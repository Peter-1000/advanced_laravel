<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create($this->_adminData());
    }

    private function _adminData()
    {
        return [
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('123'),
            'email_verified_at' => now()
        ];
    }

}
