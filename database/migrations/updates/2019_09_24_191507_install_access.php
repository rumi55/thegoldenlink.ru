<?php

use Illuminate\Database\Migrations\Migration;

class InstallAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->permissions();

        \App\Models\Role::create([
            'name'         => 'student',
            'display_name' => [
                'ru' => 'Ученик',
                'en' => 'Student',
            ],
        ]);

        \App\Models\Role::create([
            'name'         => 'admin',
            'display_name' => [
                'ru' => 'Голова',
                'en' => 'Admin',
            ],
        ]);
    }

    private function permissions()
    {
        $this->permission('cabinet.auth', [
            'ru' => 'Входить в личный кабинет',
            'en' => 'Login in personal cabinet',
        ]);

        $this->crud('user', ['ru' => 'пользователей', 'en' => 'users']);
        $this->crud('role', ['ru' => 'роли', 'en' => 'roles']);
    }

    protected function permission($name, $displayName)
    {
        \App\Models\Permission::create([
            'name' => $name,
            'display_name' => $displayName,
        ]);
    }

    private function crud($prefix, $labels)
    {
        $perms = [
            'create' => ['ru' => 'Создавать ' . $labels['ru'], 'en' => 'Create ' . $labels['en']],
            'update' => ['ru' => 'Изменять ' . $labels['ru'], 'en' => 'Update ' . $labels['en']],
            'delete' => ['ru' => 'Удалять ' . $labels['ru'], 'en' => 'Delete ' . $labels['en']],
            'view'   => ['ru' => 'Просматривать ' . $labels['ru'], 'en' => 'View ' . $labels['en']],
        ];

        foreach ($perms as $slug => $labels) {
            $this->permission("{$prefix}.{$slug}", $labels);
        }
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
