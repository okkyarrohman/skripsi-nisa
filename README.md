<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About Skripsi Nisa

Aplikasi Learning Manajeman Sistem yang terdapat Guru dan Murid yang dimana setiap Role memiliki Feature yang Berbeda beda

# Feature Aplikasi Skripsi Nisa 
Guru : 
- Login, Register
- Informasi Akun
- Dashboard
- CRUD Materi
- CRUD Tugas
- CRUD Quiz
- Penilaian

Murid : 
- Login, Register
- Informasi Akun
- Dashboard
- Materi
- Tugas
- Quiz


## Teknologi Yang Digunakan

- PHP 8.1+
- Laravel 10
- Composer
- MySql
- NPM

## Instalasi Aplikasi

### Instalalsi Awal
- Clone Repository 
- Buka Project yang sudah berhasil di clone

- Pada Terminal Jalankan Action 
```terminal
composer update
```
- Tunggu Proses Composer membuild ke dalam folder vendor 

- Lalu jalankan Action
```terminal
npm install
```
- Tunggu Proses selesai untuk membuild file javascript kedalam folder node_modules

- Kemudian jalankan Action untuk mencopy file .env
```terminal
cp .env.example .env
```

- Kemudian generate Key dengan action 
```terminal
php artisan generate:key
```
- Instalasi awal sudah dilakukan


### Instalasi Integrasi Dengan Database
- Buat terlebih dahulu database pada MySQL
- Taruh nama database yang sudah dibuat tadi kedalam folder .env pada bagian DB_DATABASE 

- Lalu, lakukan migrasi dengan menjalankan action pada terminal 
```terminal
php artisan migrate
```
- Setelah migrasi berhasil, jika ada dummy data jalankan action 
```terminal
php artisan db:seed
```
- Lalu ketikan action berikut untuk membuat storage link pada public
```terminal
php artisan storage:link
```

- Integrasi dengan database selesai dilakukan 


## Menjalankan Aplikasi 
- Untuk menjalankan Aplikasi ini memerlukan 2 terminal
- untuk terminal pertama, jalankan action : 
```terminal
php artisan serve
```

- Untuk terminal kedua, jalankan action : 
```terminal
npm run dev
```

- Aplikasi sudah bisa dijalankan, silahkan pergi ke link yang ada pada terminal pertama untuk melihat aplikasi



### User Account Testing

Role Guru : 
email = guru@gmail.com
password = guru123

Role Murid : 
email = murid@gmail.com
password = murid123

## License
This program has been development by [Xanoy](https://github.com/okkyarrohman) and Teams
