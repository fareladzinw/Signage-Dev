@component('mail::message')
Hello **{{$nama}}**,<br><br>
Berikut detail pemesanan anda <br>
Paket   : {{$paket}} <br>
Total   : Rp. {{ number_format($total, 2, ',', '.')}} <br>
Silahkan transfer ke rekening berikut : belum diberitahu rekeningnya <br><br>
Sincerely,  
Signage team.
@endcomponent