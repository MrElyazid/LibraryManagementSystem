<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $imageIds = [];
        for ($i = 0; $i < 10; $i++) {
            $typeArray = ['Author', 'Category', 'Cover'];
            $typeKey = array_rand($typeArray);
            $type = $typeArray[$typeKey];

            $imageIds[] = DB::table('images')->insertGetId([
                'type' => $type,
                'path' => 'images/image' . $i . '.jpg', // Only the relative path is needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $categoryIds = [];
        for ($i = 0; $i < 5; $i++) {
            $categoryIds[] = DB::table('categories')->insertGetId([
                'name' => 'Category' . $i,
                'description' => 'Description for category ' . $i,
                'image' => $imageIds[array_rand($imageIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $authorIds = [];
        for ($i = 0; $i < 5; $i++) {
            $authorIds[] = DB::table('authors')->insertGetId([
                'name' => 'Author' . $i,
                'lastname' => 'Lastname' . $i,
                'birth_date' => Carbon::create(rand(1950, 2000), rand(1, 12), rand(1, 28)),
                'description' => 'Description for author ' . $i,
                'image' => rand(0, 1) ? $imageIds[array_rand($imageIds)] : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

            // Seed Books
            $bookIds = [];
            for ($i = 0; $i < 10; $i++) {
                $statusArray = ['Available', 'Coming Soon', 'Not Available'];
                $statusKey = array_rand($statusArray);
                $status = $statusArray[$statusKey];

                $bookIds[] = DB::table('books')->insertGetId([
                    'isbn' => Str::random(13),
                    'title' => 'Book Title ' . $i,
                    'category' => $categoryIds[array_rand($categoryIds)],
                    'status' => $status,
                    'quantity' => rand(1, 10),
                    'image' => $imageIds[array_rand($imageIds)],
                    'author' => $authorIds[array_rand($authorIds)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }


        // Seed Clients
        $clientIds = [];
        for ($i = 0; $i < 10; $i++) {
            $clientIds[] = DB::table('clients')->insertGetId([
                'name' => 'Client' . $i,
                'lastname' => 'Lastname' . $i,
                'email' => 'client' . $i . '@example.com',
                'password' => "password",
                'student' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // Seed Librarians
        $librarianIds = [];
        for ($i = 0; $i < 5; $i++) {
            $librarianIds[] = DB::table('librarians')->insertGetId([
                'name' => 'Librarian' . $i,
                'lastname' => 'Lastname' . $i,
                'phone_number' => '123-456-789' . $i,
                'password' => 'password',
                'email' => 'librarian' . $i . '@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // Seed Adds
        for ($i = 0; $i < 5; $i++) {
            DB::table('adds')->insert([
                'book' => $bookIds[array_rand($bookIds)],
                'librarian' => $librarianIds[array_rand($librarianIds)],
                'added_qty' => rand(1, 5),
                'operation_date' => now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Edits
        for ($i = 0; $i < 5; $i++) {
            DB::table('edits')->insert([
                'book' => $bookIds[array_rand($bookIds)],
                'librarian' => $librarianIds[array_rand($librarianIds)],
                'operation_date' => now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Deletes
        for ($i = 0; $i < 5; $i++) {
            DB::table('deletes')->insert([
                'book' => $bookIds[array_rand($bookIds)],
                'librarian' => $librarianIds[array_rand($librarianIds)],
                'operation_date' => now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Wishlists
        for ($i = 0; $i < 5; $i++) {
            DB::table('wishlists')->insert([
                'book' => $bookIds[array_rand($bookIds)],
                'client' => $clientIds[array_rand($clientIds)],
                'date_added' => now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Backpacks
        for ($i = 0; $i < 5; $i++) {
            DB::table('backpacks')->insert([
                'client' => $clientIds[array_rand($clientIds)],
                'book' => $bookIds[array_rand($bookIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Loans
        for ($i = 0; $i < 5; $i++) {
            DB::table('loans')->insert([
                'book' => $bookIds[array_rand($bookIds)],
                'client' => $clientIds[array_rand($clientIds)],
                'date_borrowed' => now()->subDays(rand(1, 30)),
                'due_date' => now()->addDays(rand(1, 30)),
                'return_date' => rand(0, 1) ? now()->addDays(rand(1, 30)) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
