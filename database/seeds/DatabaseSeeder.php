<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PessoaTableSeeder::class);
        $this->call(MembrosTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(AdministradorTableSeeder::class);
        $this->call(SobreNosTableSeeder::class);
        $this->call(NoticiaTableSeeder::class);
        $this->call(NoticiaGeneralTableSeeder::class);

    }
}
