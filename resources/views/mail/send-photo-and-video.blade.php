<x-mail::message>

<p>Terima kasih telah memberikan pose terbaik anda dengan menggunakan photoblast.</p>
<p>Nyalakan semangatmu dengan memberikan kenangan berharga disini.</p>
<p>Akses link berikut agar kamu dapat melihat rekaman kenangan yang kamu dapatkan dari photoblast</p>
<a href="{{ route('video', ['code' => session('code')]) }}">VIDEO URL</a>
<br><br><br>

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
