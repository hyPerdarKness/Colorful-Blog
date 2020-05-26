# Colorful Blog
Basit, eski blog scripti. 

## Veritabanı Ayarları

config.php dosyasını düzenleyin;
```php
$dbhost = "localhost";
$dbuser = "root"; //Veritabanı Kullanıcı Adı
$dbpass = ""; //Veritabanı Şifresi
$dbdata = "veritabani"; //Veritabanı Adı
```
## Yönetim Paneli Bilgileri
```
Kullanıcı Adı: admin
Şifre: admin
```
## Kurulum

Veritabanı oluşturup, config.php dosyasına bilgileri girdikten sonra ana dizinde yer alan " colorfulblog.sql " dosyasını phpMyAdmin ile içeri aktarın.

## Uyarı
Kurulum yaptıktan mutlaka yönetici şifrenizi değiştirin. Ayrıca güvenlik için " yonetim " klasörünün ismini değiştirmeyi unutmayın!