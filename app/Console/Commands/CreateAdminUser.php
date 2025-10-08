<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user 
                            {--name= : Nombre del usuario}
                            {--email= : Email del usuario}
                            {--password= : Contraseña del usuario}
                            {--role=admin : Rol del usuario (admin|editor)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un nuevo usuario administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Creando usuario administrador...');
        $this->newLine();

        // Obtener datos del usuario
        $name = $this->option('name') ?: $this->ask('Nombre completo');
        $email = $this->option('email') ?: $this->ask('Email');
        $role = $this->option('role') ?: $this->choice('Rol', ['admin', 'editor'], 'admin');

        // Validar email
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|unique:users,email'
        ]);

        if ($validator->fails()) {
            $this->error('❌ Error: ' . $validator->errors()->first());
            return 1;
        }

        // Obtener contraseña
        if ($this->option('password')) {
            $password = $this->option('password');
        } else {
            $password = $this->secret('Contraseña (mínimo 8 caracteres)');
            $confirmPassword = $this->secret('Confirmar contraseña');

            if ($password !== $confirmPassword) {
                $this->error('❌ Las contraseñas no coinciden');
                return 1;
            }
        }

        // Validar contraseña
        if (strlen($password) < 8) {
            $this->error('❌ La contraseña debe tener al menos 8 caracteres');
            return 1;
        }

        try {
            // Crear usuario
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => $role,
                'active' => true,
                'email_verified_at' => now(),
            ]);

            $this->newLine();
            $this->info('✅ Usuario creado exitosamente!');
            $this->newLine();

            // Mostrar información del usuario
            $this->table(
                ['Campo', 'Valor'],
                [
                    ['ID', $user->id],
                    ['Nombre', $user->name],
                    ['Email', $user->email],
                    ['Rol', ucfirst($user->role)],
                    ['Estado', $user->active ? 'Activo' : 'Inactivo'],
                    ['Creado', $user->created_at->format('d/m/Y H:i:s')],
                ]
            );

            $this->newLine();
            $this->info('🔗 Puedes acceder al panel admin en: ' . url('/admin'));
            $this->info('📧 Email: ' . $user->email);
            $this->info('🔑 Contraseña: [La que acabas de configurar]');

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Error al crear el usuario: ' . $e->getMessage());
            return 1;
        }
    }
}
