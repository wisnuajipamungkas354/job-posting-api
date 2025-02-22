# Aplikasi Backend Job Posting

Selamat Datang di Aplikasi Backend Job Posting Kita Bantu Indonesia (KBI)!.

## About Aplikasi Job Posting KBI

Aplikasi Job Posting Kita Bantu Indonesia (KBI) adalah sebuah aplikasi backend yang dirancang untuk membuat proses pencarian kerja lebih mudah dan efisien. Aplikasi ini memungkinkan pengguna untuk mencari lowongan pekerjaan, mengirimkan lamaran, dan juga mencari jasa freelancer yang tersedia di aplikasi. Aplikasi ini juga dilengkapi dengan fitur-fitur lain seperti perusahaan ataupun freelancer dapat mendaftar dan memposting lowongan pekerjaan atau jasa yang mereka tawarkan kepada pengguna secara umum.

## Cara Installasi

Adapun cara menggunakan aplikasi backend ini adalah sebagai berikut:
1. Clone repository ini menggunakan perintah `git clone https://github.com/your-usernam
2. Pindah ke direktori repository yang telah di clone menggunakan perintah `cd nama
3. Instal semua dependensi yang dibutuhkan menggunakan perintah `composer install`
4. Duplikasi file `.env.example` dan ganti nama file nya menjadi `.env`
5. Jalankan perintah `php artisan migrate` untuk menjalankan migrasi database
6. Kemudian jalankan perintah `php artisan db:seed` untuk menjalankan seeding data dummy
7. Lalu jalankan perintah `php artisan serve` untuk memulai server aplikasi
8. Untuk melihat route yang tersedia, jalankan perintah `php artisan route:list`


## Dokumentasi API

Dokumentasi API aplikasi ini dapat diakses di [link ini](https://kbi-intern-fullstack.postman.co/workspace/Team-Workspace~c4f952ee-843b-475a-897e-ba55f834b350/collection/42391783-a094d6ed-d664-48f3-ad4c-9ed0aab99c48?action=share&creator=42391783&active-environment=42391783-f9dac5e7-58c8-48c1-8a70-ac2edf323730)

Atau Anda juga bisa melihat list API yang tersedia di bawah ini:

### Autentikasi

- **POST /api/auth/login**: Untuk melakukan login
- **POST /api/auth/register**: Untuk melakukan registrasi user umum & freelancer
- **POST /api/auth/general-profile**: Untuk mengisi data lengkap user umum & freelancer
- **POST /api/auth/register-company**: Untuk melakukan registrasi perusahaan
- **GET /logout**: Untuk melakukan logout

Adapun untuk default akun yang dapat digunakan untuk melakukan login adalah sebagai berikut:

**Akun Company**
- **Email:** `company@kbi.com`
- **Password:** `company1234`

**Akun General/Freelancer**
- **Email:** `general@kbi.com`
- **Password:** `general1234`

### Job Posting

#### Company
- **GET /api/company-job**: Mendapatkan list lowongan pekerjaan dari perusahaan
- **POST /api/company-job**: Membuat lowongan pekerjaan baru
- **PUT /api/company-job/{id}**: Mengedit data lowongan pekerjaan
- **DELETE /api/company-job/{id}**: Menghapus lowongan pekerjaan

#### Freelancer
- **GET /api/freelancer-service**: Mendapatkan list produk/jasa freelancer yang tersedia
- **POST /api/freelancer-service**: Membuat produk/jasa freelancer
- **PUT /api/freelancer-service/{id}**: Mengedit data produk/jasa freelancer
- **DELETE /api/freelancer-service/{id}**: Menghapus produk/jasa freelancer