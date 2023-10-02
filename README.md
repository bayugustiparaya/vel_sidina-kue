# INSTALATION

-   cek file .env

```text
APP_NAME="SIDINA"
APP_DESC="SISTEM INFORMASI DIGITAL NAGARI"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=namadatabase
DB_USERNAME=usernamedatabase
DB_PASSWORD=passworddatabase

FILAMENT_AUTH_GUARD=admin

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=email@domain.com
MAIL_PASSWORD=password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="email@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

-   buka terminal / cmd jalankan command ini satu per satu

```bash
$ composert install
$ php artisan key:generate
$ php artisan storage:link (skip while exist)
$ php artisan migrate --seed
```

-   Import data file .sql ke database di folder '01 file sql'

```text
nagaris
korongs
users
model_has_jabatans
surat_jenis
penduduk_keluargas // disable foreign key
penduduks // disable foreign key
```

-   copy isi folder '02 folder public' ke dalam storage/app/public/

-   akun dan url

```text
Url login

localhost/admin
email : superman@gmail.com
password : asdasd123

localhost/login
SIlahkan daftar dengan email aktif
```

-   tukar status ke varchar (surat_permohonans)
