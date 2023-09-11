<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah TPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tps.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="notps" class="form-label">No Tps</label>
                    <input type="number" name="notps" placeholder="Masukan No Tps" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat TPS</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat TPS" ></textarea>
                </div>
                <div class="mb-4">
                    <select name="kabupaten" class="form-select" id="">
                        <option value="" disabled selected>Pilih Kabupaten TPS</option>
                        <option value="Palangka Raya">Palangka Raya</option>
                        <option value="Barito Selatan">Barito Selatan</option>
                        <option value="Barito Timur">Barito Timur</option>
                        <option value="Barito Utara">Barito Utara</option>
                        <option value="Gunung Mas">Gunung Mas</option>
                        <option value="Kapuas">Kapuas</option>
                        <option value="Katingan">Katingan</option>
                        <option value="Kotawaringin Barat">Kotawaringin Barat</option>
                        <option value="Kotawaringin Timur">Kotawaringin Timur</option>
                        <option value="Lamandau">Lamandau</option>
                        <option value="Murung Raya">Murung Raya</option>
                        <option value="Pulang Pisau">Pulang Pisau</option>
                        <option value="Seruyan">Seruyan</option>
                        <option value="Sukamara">Sukamara</option>
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