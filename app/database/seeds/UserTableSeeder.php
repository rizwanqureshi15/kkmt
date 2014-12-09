<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = array(
        	'first_name' => 'Rizwan',
        	'last_name' => 'Qureshi',
        	'username' => 'rizwanqureshi',
        	'password' => Hash::make('rizwan@123'),
        	'email' => 'rizwanqureshi15@gmail',
        	'role' => 'admin'
        );

        User::create($user);
    }

}
