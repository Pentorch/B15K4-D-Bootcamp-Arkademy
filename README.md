##<h2>Arkademy Bootcamp Batch 15 K4-D</h2>
#### jawaban dari tes yang diberikan oleh Arkademy

### Soal 1(1.html)
cara menjalakan program:
* cukup menjalankan pada browser

Fungsi JSON pada REST API adalah sebagai tipe dari sebuah data yang diberikan/dikembalikan oleh REST SERVER. dengan tipe JSON maka akan memudahkan kita untuk mengakses data tersebut.

### Soal 2(2.js)
cara menjalakan program:
* jalankan pada console di browser anda
* atau salin code-nya lalu jalankan(run) diconsole pada website berikut: [es6console.com](https://es6console.com/)

2.js Untuk mengecek validasi username, ketik pada console: console.log("Is The Username Valid? "+ is_username_valid("Masukkan username"));. Sedangkan untuk mengecek validasi password, ketik pada console: console.log("Is The Password Valid? "+ is_password_valid("Masukkan password"));.


### Soal 6(6.php)

yang harus disiapkan untuk menjalankan **soal 6**:
* Install Web Server(Xampp,Lamp,Mamp, dll) karena soal-6 membutuhkan web server dan database server.
* disini menggunakan **Xampp**
* clone/download repository **B15K4-D-Bootcamp-Arkademy
** simpan di direktori Web Server, contoh: **xampp (C:/xampp/htdocs/)**

**Soal 6a** <br/>
pada folder 6a terdapat file **arkademy_batch_15_4_d.sql** dan **Query.txt** untuk memunculkan tabel(perintah di soal 6a) dari hasil query.

cara menjalankan soal 6a:
* buka aplikasi XAMPP
* arahkan browser ke url **localhost/phpmyadmin**
* lalu buat database dengan nama **arkademy_batch_15_4_d**
* pilih database tersebut
* setelah itu pergi ke menu **Import**
* klik **pilih file**, lalu arahkan ke file **arkademy_batch_15_4_d.sql** pada folder **6a/**
* jika sudah klik **go**
* maka database tadi sudah berisi tabel yang diimport tadi
* setelah itu masuk ke database tersebut dan klik menu **SQL**
* dan paste-kan **Query** yang ada pada file **Query.txt**
* lalu klik **go**, maka tampilannya akan sesuai dengan yang diminta oleh soal.

**Soal 6b** <br/>
cara menjalankan soal 6b:
* hanya jalankan **index.html** pada browser
* karena masih menggunakan data statis

**Soal 6c** </br>
Struktur folder 6c:
* **assets/** </br>
folder ini menyimpan semua bahan yang diperlukan seperti: **CSS**, **Gambar**, **Javascript**, dll.
  * **css/** -- pada folder ini terdapat file-file css yang diperlukan termasuk bootstrap.
  * **img/** -- pada folder ini terdapat semua gambar, icon ataupun logo yang kita perlukan.
  * **js/** pada folder ini terdapat javascript yang kita perlukan untuk website termasuk Jquery.
* **functions.php** -- file ini merupakan jembatan antara **Website** dengan **Database**.
* **hapus.php** -- file ini untuk memproses Query **DELETE** pada sebuah tabel didatabase.
* **index.php** -- ini adalah halam index/utama yang akan ditampilkan ke user.

cara menjalankan soal 6c:
* buka aplikasi XAMPP
* arahkan browser ke url **localhost/B15K4-D-Bootcamp-Arkademy/soal-6/6c/index.php**
* jika berhasil maka tampilannya akan seperti pada **Demo Aplikasi dibawah ini.**

**Demo Aplikasi**

Tampilan utama:
![pictures](soal-6/capture/6c-1.png)
<br/>
<br/>
Tampilan ketika button **ADD** ditekan:
![pictures](soal-6/capture/6c-3.png)
<br/>
<br/>
Tampilan ketika button **Edit** ditekan:
![pictures](soal-6/capture/6c-2.png)
<br/>
<br/>
Tampilan ketika button **Delete** ditekan:
![pictures](soal-6/capture/6c-4.png)
<br/>
