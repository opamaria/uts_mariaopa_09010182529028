<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder { public function run(): void {
  User::firstOrCreate(['email'=>'admin@perpustakaan.test'], ['name'=>'Admin Perpustakaan','password'=>Hash::make('password')]);
  $cats=[]; foreach ([['Teknologi','Buku teknologi dan pemrograman'],['Novel','Novel dan karya sastra'],['Pendidikan','Buku pendidikan dan pembelajaran']] as $c) $cats[$c[0]]=Category::create(['name'=>$c[0],'description'=>$c[1]]);
  foreach ([['Laravel untuk Pemula','Andi Setiawan','Informatika Press',2025,8,'Teknologi'],['Dasar Pemrograman Web','Budi Santoso','Media Komputasi',2024,12,'Teknologi'],['Laskar Pelangi','Andrea Hirata','Bentang',2005,5,'Novel'],['Bumi Manusia','Pramoedya Ananta Toer','Lentera Dipantara',2018,4,'Novel'],['Belajar Basis Data','Rina Putri','EduTech',2023,10,'Pendidikan']] as $b) Book::create(['title'=>$b[0],'author'=>$b[1],'publisher'=>$b[2],'year'=>$b[3],'stock'=>$b[4],'category_id'=>$cats[$b[5]]->id]);
} }
