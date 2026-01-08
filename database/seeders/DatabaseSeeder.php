<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $schema = env('DB_SCHEMA');

        // Load the raw SQL file
        $path = base_path('database/ssbymoutadb.sql');
        $sql = file_get_contents($path);

        // If DB_SCHEMA is set, expose it to the SQL script
        // (the script reads it via current_setting('app.schema', true))
        if ($schema !== null) {
            DB::statement("SELECT set_config('app.schema', ?, false)", [$schema]);
        }

        // Run the SQL script
        DB::unprepared($sql);

        // Show a message in the Artisan console
        $this->command?->info('Database seeded using schema: ' . ($schema ?? 'thingy (default)'));

    }
}
