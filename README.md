#Aplikasi Sistem Lelang Online
Aplikasi sederhana sistem lelang online, untuk latihan persiapan UKK 2020

##Tutorial instalasi
* jalankan perintah dibawah
```
git clone https://github.com/defrindr/SystemInformasiLelang.git
```
* Buat database dengan nama ` db_lelang `
* rename `.env.example` menjadi `.env`
* jalankan perintah `php artisan migrate:fresh --seed`
* jalankan server