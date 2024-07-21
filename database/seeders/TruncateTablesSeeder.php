<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks to avoid constraint violations
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables
        DB::table('loans')->truncate();
        DB::table('backpacks')->truncate();
        DB::table('wishlists')->truncate();
        DB::table('deletes')->truncate();
        DB::table('edits')->truncate();
        DB::table('adds')->truncate();
        DB::table('books')->truncate();
        DB::table('authors')->truncate();
        DB::table('categories')->truncate();
        DB::table('images')->truncate();
        DB::table('librarians')->truncate();
        DB::table('clients')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
