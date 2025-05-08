<p align="center"><strong>Jobsy - Sistem Informasi Pengelolaan Pembayaran Rusunawa Unsulbar</strong></p>

<div align="center">

![logo_unsulbar](public/image.png)

<b>Chindi Paihad Dahlan</b><br>
<b>D0222350</b><br>
<b>Framework Web Based</b><br>
<b>2025</b>

</div>

---

## 👥 Role dan Fitur

### 👨‍💼 Penghuni

-   Registrasi & Login
-   Melihat tagihan bulanan
-   Mengunggah bukti pembayaran

### 🏢 Pengurus

-   Registrasi & Login
-   Menambahkan tagihan
-   Menerima dan memverifikasi pembayaran

### 🛠️ Pengawas

-   Login
-   Melihat aktivitas pembayaran
-   Laporan keuangan

---

## 🗃️ Struktur Tabel Database

### 1. `roles`

| Field          | Tipe Data | Keterangan                                 |
| -------------- | --------- | --------------------------------------     |
| id             | BIGINT    | Primary key, auto increment                |
| nama_role      | VARCHAR   | Nama peran (penghuni, pengurus,,pengawas)  |
| created_at     | TIMESTAMP | Timestamp pembuatan                        |
| updated_at     | TIMESTAMP | Timestamp pembaruan                        |

### 2. `user`

| Field       | Tipe Data | Keterangan                      |
| ----------- | --------- | ------------------------------- |
| id          | BIGINT    | Primary key                     |
| nama        | VARCHAR   | Nama pengguna                   |
| email       | VARCHAR   | Email pengguna                  |
| password    | VARCHAR   | Password pengguna               |
| role_id     | BIGINT    | Foreign key ke `roles`          |
| created_at  | TIMESTAMP | Timestamp pembuatan             |
| updated_at  | TIMESTAMP | Timestamp pembaruan             |

### 3. `tagihan`

| Field           | Tipe Data | Keterangan                      |
| --------------- | --------- | ------------------------------- |
| id              | BIGINT    | Primary key                     |
| user_id         | BIGINT    | Foreign key ke `user`(penghuni) |
| tanggal         | DATE      | Tanggal tagihan                 |
| jumlah          | DECIMAL   | Jumlah tagihan                  |
| status          | ENUM      | Status pembayaran (belum, lumas)|
| created_at      | TIMESTAMP | Timestamp pembuatan             |
| updated_at      | TIMESTAMP | Timestamp pembaruan             |

### 4. `kategori_pekerjaan`

| Field             | Tipe Data | Keterangan                          |
| ------------------| --------- | ----------------------------------- |
| id                | BIGINT    | Primary key                         |
| tagihan_id        | BIGINT    | Foreign key ke `tagihan`            |
| tanggal_bayar     | DATE      | Tanggal pembayaran                  |
| jumlah_dibayar    | DECIMAL   | Jumlah yang dibayar                 |
| bukti_transfer    | VARCHAR   | Path file bukti transfer (nullable) |
| created_at        | TIMESTAMP | Timestamp pembuatan                 |
| updated_at        | TIMESTAMP | Timestamp pembaruan                 |


---

## 🔗 Relasi Antar Tabel

| Entitas yang Terlibat              | Jenis Relasi | Penjelasan                                                                       |
| ---------------------------------- | ------------ | -------------------------------------------------------------------------------  |
| Roles dengan User                  | One-to-Many  | Satu role (penghuni, pengurus, pengawas) dapat dimiliki oleh banyak user         |
| User (Penghuni) dengan Tagihan     | One-to-Many  | Satu penghuni dapat memiliki banyak tagihan sewa berdasarkan lamanya ia tinggal  |
| Tagihan dengan Pembayaran          | One-to-One   | Satu tagihan sewa hanya memiliki satu pembayaran                                 |

---# fwb_D0222350
