<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user {--email=} {--name=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un usuario administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔧 Creando usuario administrador...');
        $this->newLine();

        // Obtener datos del usuario
        $email = $this->option('email') ?: $this->ask('Email del administrador');
        $name = $this->option('name') ?: $this->ask('Nombre del administrador');
        $password = $this->option('password') ?: $this->secret('Contraseña');

        // Validar datos
        $validator = Validator::make([
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ], [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $this->error('❌ Error en la validación:');
            foreach ($validator->errors()->all() as $error) {
                $this->error("   • $error");
            }
            return 1;
        }

        // Verificar si el usuario ya existe
        if (User::where('email', $email)->exists()) {
            $this->error("❌ Ya existe un usuario con el email: $email");
            return 1;
        }

        // Crear el usuario
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin',
                'active' => true,
            ]);

            $this->newLine();
            $this->info('✅ Usuario administrador creado exitosamente!');
            $this->newLine();

            $this->table(
                ['Campo', 'Valor'],
                [
                    ['ID', $user->id],
                    ['Nombre', $user->name],
                    ['Email', $user->email],
                    ['Rol', $user->role],
                    ['Estado', $user->active ? 'Activo' : 'Inactivo'],
                    ['Creado', $user->created_at->format('d/m/Y H:i:s')],
                ]
            );

            $this->newLine();
            $this->info('🌐 Puedes acceder al panel de administración en:');
            $this->info('   URL: http://localhost:8000/admin');
            $this->info("   Email: $email");
            $this->info("   Contraseña: [la que acabas de configurar]");

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Error al crear el usuario:');
            $this->error("   {$e->getMessage()}");
            return 1;
        }
    }
}
