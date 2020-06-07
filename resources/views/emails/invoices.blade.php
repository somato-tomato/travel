@component('mail::message')
# Halo, {{ $form_data->nama }}

Terima Kasih telah menggunakan jasa kami!
Untuk informasi invoice silahkan gunakan tombol di bawah ini!
@component('mail::button', ['url' => 'pesanpaket/info/'. $form_data->idPesanPaket])
Invoice
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }} Admin
@endcomponent
