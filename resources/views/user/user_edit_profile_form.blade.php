<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Majapahit</title>
  </head>
  <body>
    <form class="" action="{{route('edit_profile')}}" method="post">
      {{ csrf_field() }}
      <input type="text" name="name" value="{{$users->user->name}}" disabled placeholder="nama">
      <input type="text" name="perkerjaan" value="{{$users->perkerjaan}}" placeholder="Perkerjaan" required>
      <input type="text" name="pendidikan_terakhir" value="{{$users->pendidikan_terakhir}}" placeholder="Pendidikan Terakhir" required>
      <input type="text" name="alamat" value="{{$users->alamat}}" placeholder="Alamat" required>
      <input type="text" name="nomor_telepon" value="{{$users->nomor_telepon}}" placeholder="Nomor Telepon" required>
      <button type="submit" name="button">Kirim</button>
    </form>
  </body>
</html>
