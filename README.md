# UTS Pemrograman Web III - Aplikasi Perpustakaan

Nama project: `uts_nama_nim`

## Fitur
- Authentication login/logout
- Dashboard
- CRUD Buku
- Detail Buku
- Relationship Category hasMany Book / Book belongsTo Category
- Migration + Seeder
- Pencarian judul/penulis (bonus)
- Git version control

## Menjalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
# buat database MySQL: uts_nama_nim
php artisan migrate:fresh --seed
php artisan serve
```

Login demo:
- Email: `admin@perpustakaan.test`
- Password: `password`

## Git
```bash
git init
git add . && git commit -m "Initial Laravel project"
git add database app/Models && git commit -m "Add database and book model"
git add routes resources && git commit -m "Add book CRUD and authentication"
git branch -M main
git remote add origin https://github.com/USERNAME/uts_nama_nim.git
git push -u origin main
```
