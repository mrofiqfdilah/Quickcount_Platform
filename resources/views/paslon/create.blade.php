<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Paslon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paslon.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <label for="nourut" class="form-label">No Urut</label>
            <input type="number" class="form-control" name="nourut" placeholder="Masukan No urut Paslon">
            </div>

            <div class="mb-4">
            <label for="namapaslon" class="form-label">Nama Paslon</label>
            <input type="text" class="form-control" name="namapaslon" placeholder="Masukan Nama Paslon">
            </div>

            <div class="mb-4">
            <label for="namapaslon" class="form-label">Partai</label>
            <select class="form-select" name="partai" aria-label="Default select example">
                <option value="" disabled selected>Pilih Partai Paslon</option>
                <option value="Demokrasi Indonesia Perjuangan (PDIP)">Demokrasi Indonesia Perjuangan (PDIP)</option>
                <option value="Golkar">Golkar</option>
                <option value="Kebangkitan Bangsa (PKB)">Kebangkitan Bangsa (PKB)</option>
                <option value="Gerakan Indonesia Raya (Gerindra)">Gerakan Indonesia Raya (Gerindra)</option>
                <option value="Amanat Nasional (PAN)">Amanat Nasional (PAN)</option>
                <option value="Keadilan Sejahtera (PKS)">Keadilan Sejahtera (PKS)</option>
                <option value="Demokrat">Demokrat</option>
                <option value="Nasional Demokrat (NasDem)">Nasional Demokrat (NasDem)</option>
              </select>
            </div>
            <div class="mb-4">
            <label for="namapaslon" class="form-label">Gambar Paslon</label>
            <input type="file" class="form-control" name="gambar" placeholder="Masukan Nama Paslon">
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
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
</style>