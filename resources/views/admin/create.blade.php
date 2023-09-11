<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Relawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Nama Relawan</label>
                    <input type="text" name="name" placeholder="Masukan Nama Relawan" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email Relawan</label>
                    <input type="email" name="email" placeholder="Masukan Email Relawan" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="telpon" class="form-label">No Telpon Relawan</label>
                    <input type="text" name="notelpon" placeholder="Masukan No TelponRelawan" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="telpon" class="form-label">Kabupaten</label>
                     <select name="kabupaten" id="kabupaten"  class="form-select">
                        @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->kabupaten }}">{{ $kabupaten->kabupaten }}</option>
                    @endforeach
                     </select>
                </div>
                <div class="mb-4">
                    <label for="telpon" class="form-label">Tps Relawan</label>
                     <select name="tps_id" id="tps_id" class="form-select">
                     </select>
                </div>
                <div class="mb-4">
                    <label for="telpon" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="telpon" class="form-label">Password</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="form-control">
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
<script>
  document.addEventListener("DOMContentLoaded", () =>{
   const kabupatenSelect = document.getElementById("kabupaten");
   const tpsSelect = document.getElementById("tps_id");
   const tpsData = {!! json_encode($tpsData) !!};

   function updateTpsOptions() {
    const selectedKabupaten = kabupatenSelect.value;
    tpsSelect.innerHTML = tpsData[selectedKabupaten].map(tps =>
    `<option value="${tps.id}">${tps.notps}</option>`
    ).join('');
   }

   kabupatenSelect.addEventListener("change", updateTpsOptions);

   updateTpsOptions();
  })

  

</script>
