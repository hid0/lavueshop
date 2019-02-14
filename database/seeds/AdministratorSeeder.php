<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->username = "admin";
        $admin->name = "Administrator";
        $admin->email = "admin@lavue.shop";
        $admin->roles = json_encode(['ADMIN']);
        $admin->password = \Hash::make('orakreti');
        $admin->address = "Jepara, Central Java, ID";
        $admin->phone = "089671891052";
        $admin->avatar = "tamvan.jpg";
        $admin->status = "ACTIVE";

        $admin->save();

        $this->command->info('User Admin Berhasil Ditambahkan');
    }
}
