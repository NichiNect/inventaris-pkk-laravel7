<h1 align="center">Halo, selamat datang di Sistem Inventaris SMK</h1>

<img align="center" src="http://ForTheBadge.com/images/badges/built-with-love.svg"> <img align="center" src="http://ForTheBadge.com/images/badges/makes-people-smile.svg"> <img align="center" src="http://ForTheBadge.com/images/badges/built-by-developers.svg">

[![](https://img.shields.io/github/issues/NichiNect/inventaris-pkk-laravel7?style=flat-square)](https://img.shields.io/github/issues/NichiNect/inventaris-pkk-laravel7?style=flat-square) [![](https://img.shields.io/github/stars/NichiNect/inventaris-pkk-laravel7?style=flat-square)](https://img.shields.io/github/stars/NichiNect/inventaris-pkk-laravel7?style=flat-square) ![](https://img.shields.io/github/forks/NichiNect/inventaris-pkk-laravel7?style=flat-square) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com) [![HitCount](http://hits.dwyl.com/NichiNect/https://github.com/NichiNect/inventaris-pkk-laravel7.svg)](http://hits.dwyl.com/NichiNect/https://github.com/NichiNect/inventaris-pkk-laravel7) [![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity) [![GitHub followers](https://img.shields.io/github/followers/NichiNect.svg?style=flat-square&label=Follow&maxAge=2592000)](https://github.com/NichiNect?tab=followers)

### Tentang Repo Ini?
Repositori ini adalah Web App pengelolaan inventaris sarana prasarana di smk dengan Laravel 7. Awalnya project ini dibuat oleh <a href="https://github.com/NichiNect"> Yoni Widhi C </a> sebagai tugas Produk Kreatif dan Kewirausahaan pada semester 5, serta sebagai uji coba latihan. **Sistem Inventaris SMK ini adalah web app untuk me-manajemen atau mengatur Inventaris Peminjaman pada ruang maupun kelas.**

### Fitur Apa Saja Yang Tersedia di Web App Ini?
- Autentikasi Admin, Petugas, dan Pegawai 
- Terdapat 3 User Level
- User Management
- Barang Inventaris & CRUD
- Jenis Barang Inventaris & CRUD
- Data Ruang & CRUD
- Peminjaman Barang Sesuai Dengan Ruang
- Cetak Laporan (sesuai role)

------------

## 💻 Install

1. **Clone Repository**
```bash
git clone https://github.com/NichiNect/inventaris-pkk-laravel7.git inventaris-app
cd inventaris-app
composer install
npm install && npm run dev
copy .env.example .env
```

2. **Buka ```.env``` lalu ubah baris berikut sesuai dengan konfigurasi database**
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Saya menyediakan data dummy simple untuk database nya jika terjadi error pada migration atau seeding. silahkan import file ```laravel_project_inventaris.sql``` pada database Anda.

4. **Run the website**
```bash
php artisan serve
```

------------

### 👤 Default Account for testing
	
**Admin Default Account**
- Username: yoniwidhi
- Password: thispassword

**Petugas Default Account**
- Username : petugas1
- Password : thispassword

------------

## 🧑 Author

👤 <a href="https://www.facebook.com/yoniwidhi"> **Yoni Widhi**</a>
- Facebook : <a href="https://www.facebook.com/yoniwidhi"> Yoni Widhi</a>
- Telegram : <a href="https://t.me/yoniwidhi"> Yoni Widhi</a>

------------

## 🤝 Contributing
Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi. **Berhubung Project ini saya yang mengerjakannya sendiri, namun banyak fitur yang kalian dapat tambahkan silahkan berkontribusi yaa!**