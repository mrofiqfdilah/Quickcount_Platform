<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Paslon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paslon.update',$paslon->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-4">
            <label for="nourut" class="form-label">No Urut</label>
            <input type="number" class="form-control" value="{{ $paslon->nourut }}" name="nourut" placeholder="Masukan No urut Paslon">
            </div>

            <div class="mb-4">
            <label for="namapaslon" class="form-label">Nama Paslon</label>
            <input type="text" class="form-control" value="{{ $paslon->namapaslon }}" name="namapaslon" placeholder="Masukan Nama Paslon">
            </div>

            <div class="mb-4">
            <label for="namapaslon" class="form-label">Partai</label>
            <select class="form-select" name="partai" aria-label="Default select example">
                <option value="" disabled selected>Pilih Partai Paslon</option>
                <option value="Demokrasi Indonesia Perjuangan (PDIP)"  {{ $paslon->partai == 'Demokrasi Indonesia Perjuangan (PDIP)' ? 'selected' : '' }}>Demokrasi Indonesia Perjuangan (PDIP)</option>
                <option value="Golkar"  {{ $paslon->partai == 'Golkar' ? 'selected' : '' }}>Golkar</option>
                <option value="Kebangkitan Bangsa (PKB)"  {{ $paslon->partai == 'Kebangkitan Bangsa (PKB)' ? 'selected' : '' }}>Kebangkitan Bangsa (PKB)</option>
                <option value="Gerakan Indonesia Raya (Gerindra)"  {{ $paslon->partai == 'Gerakan Indonesia Raya (Gerindra)' ? 'selected' : '' }}>Gerakan Indonesia Raya (Gerindra)</option>
                <option value="Amanat Nasional (PAN)"  {{ $paslon->partai == 'Amanat Nasional (PAN)' ? 'selected' : '' }}>Amanat Nasional (PAN)</option>
                <option value="Keadilan Sejahtera (PKS)"  {{ $paslon->partai == 'Keadilan Sejahtera (PKS)' ? 'selected' : '' }}>Keadilan Sejahtera (PKS)</option>
                <option value="Demokrat"  {{ $paslon->partai == 'Demokrat' ? 'selected' : '' }}>Demokrat</option>
                <option value="Nasional Demokrat (NasDem)"  {{ $paslon->partai == 'Nasional Demokrat (NasDem)' ? 'selected' : '' }}>Nasional Demokrat (NasDem)</option>
              </select>
            </div>
            <div class="mb-4">
            <label for="namapaslon" class="form-label">Gambar Paslon</label>
            <input type="file"  class="form-control" name="gambar" placeholder="Masukan Nama Paslon">
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