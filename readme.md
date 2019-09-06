## How to
- Clone
- composer install
- cp .env.example .env
- php artisan key:generate
- Buat database signage
- php artisan migrate
- php artisan db:seed
- php atisan serve
- 127.0.0.1:8000/login

## Fitur User
- Login
- Register with Afiliasi (Afiliasi ditaruh di url register)
- Register
- Load paket yang tersedia
- Pesan paket
- Load paket yang dipesan user
- Konfirmasi paket yang dipesan user
- Load list afiliasi user
- Withdraw komisi
- Load list rekap komisi afiliasi

## Fitur Admin Panel

## API Documentation

- Method : get | Url : call_player/{idPlayer}/{keyPlayer}
- Method : get | Url : get_signage/{idPlayer}/{keyPlayer}/{idUnique}
- Method : get | Url : download_content/{idPlayer}/{keyPlayer}
- Method : get | Url : afiliasi/{idUser}
- Method : get | Url : rekap_afiliasi/{idUser}/{tanggal}
- Method : POST | Url : withdraw/{idUser}
    Request body : nominal
- Method : POST | Url : set_afiliasi/{kodeAfiliasi}
    Request body : nama, username, alamat, hp, email, namaBank, nomorRekening, namaRekening
    
