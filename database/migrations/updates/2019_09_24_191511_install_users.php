<?php

use Illuminate\Database\Migrations\Migration;

class InstallUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var \App\Models\User $user */
        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
        ]);

        $user->assignRole(
            \App\Models\Role::where('name', 'admin')->first()
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
