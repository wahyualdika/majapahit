<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Majapahit</title>
  </head>
  <body>
    <form class="" action="{{route('make_profile')}}" method="post">
      {{ csrf_field() }}
      <input type="text" name="nama" value="{{Auth::user()->name}}" disabled placeholder="nama">
      <input type="text" name="perkerjaan" placeholder="Perkerjaan" required>
      <input type="text" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir" required>
      <input type="text" name="alamat" placeholder="Alamat" required>
      <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" required>
      <button type="submit" name="button">Kirim</button>
    </form>

  </body>
</html>
