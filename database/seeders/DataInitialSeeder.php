<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Profesion;
use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataInitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $role = new Role();
        $role->nombre_rol = 'Administrador';
        $role->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->role_id = 1;
        $user->save();

        $role = new Role();
        $role->nombre_rol = 'Operador';
        $role->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre_tipo_documento = 'Cedula';
        $tipoDocumento->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre_tipo_documento = 'Pasaporte';
        $tipoDocumento->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre_tipo_documento = 'Carnet de Extranjeria';
        $tipoDocumento->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre_tipo_documento = 'Tarjeta de Identidad';
        $tipoDocumento->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre_tipo_documento = 'NIT';
        $tipoDocumento->save();

        $profesion = new Profesion();
        $profesion->nombre_profesion = 'Ingeniero';
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre_profesion = 'Abogado';
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre_profesion = 'Contador';
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre_profesion = 'Licenciado';
        $profesion->save();

        $profesion = new Profesion();
        $profesion->nombre_profesion = 'Otro';
        $profesion->save();
    }
}
