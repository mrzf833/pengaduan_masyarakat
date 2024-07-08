# LARAVEL 8
## Di buat memakai php 7.4

# Cara Pemasangan

- `composer install`
- `cp .env.example .env`
- `BUKAK .env LALU SETTING DATABASENYA`
- `php artisan key:generate`
- `composer dump-auto`
- `php artisan migrate:fresh --seed`
- `php artisan storage:link`

# user default
## masyarakat
- `username : masyarakat`
- `password : masyarakat`

## petugas
- `username : petugas`
- `password : petugas`

## admin
- `username : admin`
- `password : admin`

# dengan docker
## install
- `docker compose up -d --build`
- `docker exec -it pengaduan_masyarakat_app /bin/sh`
- `php artisan migrate:fresh --seed`

## uninstall
- `docker compose down --rmi=all`
