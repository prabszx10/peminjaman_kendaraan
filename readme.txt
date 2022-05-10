Admin
username: admin@mail.com
password: password

Approval
username: approval@mail.com
password: password

Server version: 10.4.22-MariaDB (phpmyadmin)
PHP version: 7.4.27
Framework : Laravel Framework 8.83.11

panduan penggunaan aplikasi:
- download atau clone source code dari github
- masuk ke cli dan ketikan composer install
- copy file .env.example kemudian ganti nama menjadi .env
- didalam file .env isikan "DB_DATABASE" sesuai nama DB yang anda buat
- masukan command php artisan key:generate
- masukan command php artisan migrate:fresh --seed
- untuk menjalankan source code masukan perintah masukan command php artisan serve 

Aplikasi ini memiliki 2 role user:
admin: yang bertugas menginputkan data kendaraan, data user, dan data peminjaman
approval : yang memberikan persetujuan atas peminjaman kendaraan yang akan dilakukan