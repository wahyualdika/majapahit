<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Majapahit</title>
  </head>
  <body>
    @if(!is_null($users->profiles))
        <p>Username :{{$users->email}}</p>
        <p>Email : {{$users->email}}</p>
        <p>Nama : {{$users->name}}</p>
        <p>Alamat : {{$users->profiles->alamat}}</p>
        <p>Nomor : {{$users->profiles->nomor_telepon}}</p>
        <p>Pendidikan : {{$users->profiles->pendidikan_terakhir}}</p>
        <p>Pekerjaan : {{$users->profiles->perkerjaan}}</p>
    @else
        <p>Belum ada profile</p>
    @endif
  </body>
</html>
