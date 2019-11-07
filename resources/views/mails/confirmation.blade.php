@component('mail::message')
Hello **{{$nama}}**,<br><br>
Berikut detail pemesanan anda <br>
Kode pemesanan  : {{$kode}} <br>
Paket           : {{$paket}} <br>
Total           : Rp. {{ number_format($total, 2, ',', '.')}} <br> <br>
Silahkan transfer ke rekening berikut : <br>
BNI   : 2336402229 <br> <br>
Sincerely,  
Signage team.
@endcomponent