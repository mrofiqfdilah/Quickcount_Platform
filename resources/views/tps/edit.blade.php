<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit TPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tps.update',$tps->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <label for="notps" class="form-label">No Tps</label>
                    <input type="number" value="{{ $tps->notps }}"    name="notps" placeholder="Masukan No Tps" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat TPS</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat TPS" >{{ $tps->alamat }}</textarea>
                </div>
                <div class="mb-4">
                    <select name="kabupaten" class="form-select" id="">
                        <option value="" disabled selected>Pilih Kabupaten TPS</option>
                        <option value="Palangka Raya" {{ $tps->kabupaten == 'Palangka Raya' ? 'selected' : '' }}>Palangka Raya</option>
                        <option value="Barito Selatan" {{ $tps->kabupaten == 'Barito Selatan' ? 'selected' : '' }}>Barito Selatan</option>
                        <option value="Barito Timur" {{ $tps->kabupaten == 'Barito Timur' ? 'selected' : '' }}>Barito Timur</option>
                        <option value="Barito Utara" {{ $tps->kabupaten == 'Barito Utara' ? 'selected' : '' }}>Barito Utara</option>
                        <option value="Gunung Mas" {{ $tps->kabupaten == 'Gunung Mas' ? 'selected' : '' }}>Gunung Mas</option>
                        <option value="Kapuas" {{ $tps->kabupaten == 'Kapuas' ? 'selected' : '' }}>Kapuas</option>
                        <option value="Katingan" {{ $tps->kabupaten == 'Katingan' ? 'selected' : '' }}>Katingan</option>
                        <option value="Kotawaringin Barat" {{ $tps->kabupaten == 'Kotawaringin Barat' ? 'selected' : '' }}>Kotawaringin Barat</option>
                        <option value="Kotawaringin Timur" {{ $tps->kabupaten == 'Kotawaringin Timur' ? 'selected' : '' }}>Kotawaringin Timur</option>
                        <option value="Lamandau" {{ $tps->kabupaten == 'Lamandau' ? 'selected' : '' }}>Lamandau</option>
                        <option value="Murung Raya" {{ $tps->kabupaten == 'Murung Raya' ? 'selected' : '' }}>Murung Raya</option>
                        <option value="Pulang Pisau" {{ $tps->kabupaten == 'Pulang Pisau' ? 'selected' : '' }}>Pulang Pisau</option>
                        <option value="Seruyan" {{ $tps->kabupaten == 'Seruyan' ? 'selected' : '' }}>Seruyan</option>
                        <option value="Sukamara" {{ $tps->kabupaten == 'Sukamara' ? 'selected' : '' }}>Sukamara</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
<style>
    body{
        font-family: poppins;
        background-color: #f4f5f8;
    }
    .card{
        box-shadow: 0 5px 10px rgba(0, 0, 0,0.1);
    }
</style>