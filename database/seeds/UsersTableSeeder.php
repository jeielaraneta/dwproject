<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use dwproject\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users  = [
            [
                'name' => 'Jeiel Araneta',
                'email' => 'jeielaraneta@gmail.com',
                'password' => bcrypt('secret')
            ]
        ];
        foreach ($users as $user) {
            $u = new User;
            $u->name = $user['name'];
            $u->email = $user['email'];
            $u->password = $user['password'];
            $u->save();
        }
    }
}
