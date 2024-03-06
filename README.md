Abonelik planı satın alımı ve yönetimi için örnek kod bloğu

.env dosyasında

STRIPE_KEY=
STRIPE_SECRET=

alanlarına stripe api bilgilerinizi tanımlayınız.


https://dashboard.stripe.com/test/products?active=true

Product catalog adresinde bir plan hazırlıyınız. Planların fiyatını/ödeme periyoduna göre ayarlayın.
Stripe tarafından üretilen plan/fiyat idsini kopyalayınız.
ÖRNEK API ID
price_1OrGHM2KfsafsaQAZdjyGbnVAw3sfaWmy

database/seeders/PlanSeeder.php dosyasında paketinizle eşleyiniz.
stripe_id = (Üretilen fiyat id)

## Kurulum
Projeyi locale aldıktan sonra aşağıda yer alan adımları uygulayınız.
#### 1) .env.example dosyasını düzenleyin
    - .env.example isimli dosyayı .env olarak yeniden adlandırın.
    -  Mysql'de veritabanı oluşturunuz. Oluşturduğunuz dbname .env dosyasında tanımlanmalıdır.
    - .env dosyasında konfigürasyon değerlerini localinizdeki bilgiler ile değiştiriniz.
```
    # APP_URL değerini çalışma dizininiz olarak tanımlayınız.
    APP_URL=http://localhost

    # Database Bilgileriniz
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```
#### 2) Gereklik bağımlılıkların yüklenmesi
Paketlerin yüklenmesi için php paket yöneticisi composer kurulu olan bir ortamda aşadağıdaki komutu çalıştırınız.
```
composer install
```
Tabloların ve örnek datanın initialize işlemi
Uyarı: Tablolar mevcut ve data girdisi var ise tüm veriler silinecek ve tablolar varsayılan ayarlarda seed edilecektir.
```
php artisan migrate:refresh --seed
```
Proje için özel anahtar oluşturulması
```
php artisan key:generate
```
#### 3) Projeyi dev olarak çalıştır
Eğer projeyi dev olarak başlatırsanız, .env dosyasında APP_URL=http://localhost:<AÇILAN PORT> olarak tanımlama yapınız.
```
php artisan serve
```



Stripe 3d secure örnek kart no
3d secure card no: 4000 0000 0000 3220