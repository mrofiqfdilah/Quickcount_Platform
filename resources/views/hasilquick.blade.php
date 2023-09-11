<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quick Count Page</title>
    <link rel="icon" href="img/LOGOS.png">
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav id="navv" class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="logo"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="btn " id="btn1"><img src="img/icon-call.svg" alt=""> Pengaduan Call 24/7</button>
                    </li>
                    <button class="btn " id="relawan" type="submit">Relawan</button>
                </ul>
            </div>
        </div>
    </nav>
    <section class="sec">
        <img src="img/background.png" class="bg" alt="">
        <div class="judul">
            <p>QUICK COUNT PEMILU</p>
            <p style="position: relative; top:-20px;">WAPRES CAWAPRES 2024</p>
        </div>
        <p class="smk">Presented by SMKN NEGERI 1 Sampit</p>
        <div class="container">
            @foreach ($paslon as $index => $candidate)
            <div class="box">
                <img src="{{ $candidate->gambar }}" alt="{{ $candidate->namapaslon }}">
                <div class="card1"  style="background: 
                @if($index == 0)
                rgba(126, 10, 2, 1) /* Warna latar belakang untuk kandidat pertama */
                @elseif($index == 1)
                rgba(35, 120, 53, 1) /* Warna latar belakang untuk kandidat kedua */
                @else
                rgba(6, 99, 167, 1) /* Warna latar belakang untuk kandidat ketiga */
                @endif
                ;">
                <p style="position: relative; top:8px; font-weight:600;">{{ $candidate->nourut }}</p>
                </div>
                <p style="font-family:poppins;font-size: 13px;position: relative; top:-30px; left:60px; font-weight:600;">{{ $candidate->namapaslon }}</p>
            </div>
            @endforeach
        </div>
        
        <p data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1200" style="letter-spacing:1px;position: relative; top:-690px; left:240px; font:Montserrat; font-weight:600; font-size:20px; z-index:2; color: rgba(0, 0, 0, 1);">Hasil quick count sementara : </p>
        <div class="box1" data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1200"  style="z-index:2;position: relative; top: -700px; left:240px;  width: 800px; ">
            @foreach ($paslon as $index => $candidate)
            <div style="position: relative; top: 37px; color: #E65353; font-size: 16px; font-weight: 400; margin: -10px 0;">
                @php
                $nourut = $candidate->nourut;
                $backgroundColor = '';
                
                // Tentukan warna latar belakang berdasarkan nomor urut
                if ($nourut === '01') {
                    $backgroundColor = 'rgba(126, 10, 2, 1)';
                } elseif ($nourut === '02') {
                    $backgroundColor = 'rgba(35, 120, 53, 1)';
                } elseif ($nourut === '03') {
                    $backgroundColor = 'rgba(6, 99, 167, 1)';
                } else {
                    // Warna default jika tidak ada nomor urut yang cocok
                    $backgroundColor = '#2FB75B';
                }
                @endphp
                
                <div class="card" style="
                width: 50px;
                background: {{ $backgroundColor }};
                color: #fff;
                font-family: poppins;
                text-align: center;
                font-size: 20px;
                height:50px;
                position: relative;
                ">
                <p style="position: relative; top:8px; font-weight:600;">{{ $candidate->nourut }}</p>
                </div>
                
            </div>
            @php
            $totalSuara = $candidate->suara->sum('jumlah_suara');
            $width = $maxTotalSuara > 0 ? ($totalSuara / $maxTotalSuara) * 700 : 0;
            $persentase = $maxTotalSuara > 0 ? ($totalSuara / $maxTotalSuara) * 100 : 0;
            $persentaseBulat = round($persentase); // Memotong persentase menjadi bilangan bulat
            @endphp
            <p style="position: relative; top:-5px; left:65px; font-size:16px; z-index:2; font-family:Montserrat; font-weight:600;">{{ $candidate->namapaslon }}</p>
            <div class="card" style="top:10px; border: none; border-radius: 1px; z-index: 1; width: 680px; left: 65px; margin: -25px 0; border-radius:29px; height: 24px; background: rgba(222, 222, 222, 1);
            position: relative;">
            <div class="box" style="z-index: 2; border-radius:29px; left: px; text-align: center; position: absolute; top: -4px; width: {{ $width }}px; margin: 5px 0; height: 24px; background-color: {{ $index === 0 ? 'rgba(126, 10, 2, 1);' : ($index === 1 ? 'rgba(34, 120, 53, 1);' : ($index === 2 ? 'rgba(6, 99, 167, 1);' : '#2FB75B')) }};">
                <p style="color: #fff; font-weight:600; font-size:16px; position: relative;">
                {{ $persentaseBulat }}% 
                </p>
            </div>
        </div>
        <p style="position: relative; left:770px; top:10px; font-family: Montserrat; font-size: 16px; font-weight: 600; z-index:2;">Total Suara : {{ $totalSuara }}</p>
        @endforeach
    </div>   
</section>

<p class="mt-5" data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1200" style="letter-spacing:1px;position: relative; top:-700px; left:240px; font:Montserrat; font-weight:600; font-size:20px; z-index:2; color: rgba(0, 0, 0, 1);">Data Suara Tiap Kabupaten : </p>

<table border="1" data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1200" style="position: relative; ">
    <thead>
        <tr>
            <th style="width: 10px;">No</th>
            <th  style="width: 200px;" >Wilayah / Kota</th>
            @foreach ($paslon as $index => $candidate)
            <th style="width: 40px;" >{{ $candidate->nourut }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($suaraByKabupaten as $kabupaten => $suaraPaslon)
        <tr>
            <td style="color: rgba(56, 56, 56, 1);">{{ $loop->iteration }}</td>
            <td style="color: rgba(56, 56, 56, 1);">Kabupaten {{ $kabupaten }}</td>
            @foreach ($suaraPaslon as $suara)
            <td>{{ $suara->jumlah_suara }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
<style>
    table {
        position: relative;
        left: 15px;
        top: -680px;
        border-collapse: collapse;
        width: 900px; /* Atur lebar tabel sesuai kebutuhan Anda */
        margin: 0 auto; /* Untuk memusatkan tabel */
    }
    
    th, td {
        border: 1px solid rgba(0, 0, 0, 1);
        padding: 8px;
        text-align: center;
    }
    th{
        background-color:  rgba(126, 10, 2, 1);
        color:  #fff;
    }
    td{
        color: rgba(0, 0, 0, 1);
        font-weight: 500;
    }
</style>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<style>
body{
    font-family: poppins;
    background: rgba(255, 255, 255, 1);
    overflow-x: hidden;
    margin: 0;
     height: 100px; /* Adjust as needed */
}
html{
    height: 100px;
}
 body,html{
        margin: 0;
        padding: 0;
    }

html::-webkit-scrollbar{
    width:0.5rem;
}

html::-webkit-scrollbar-track{
    background:#A1A9AF;
}

html::-webkit-scrollbar-thumb{
    background:#808B93;
    border-radius: 50px;
}

.container {
    display: flex;
    position: relative;
    top: -720px;
    left: 110px;
    flex-wrap: wrap;
}

.box {
    flex: 0 0 calc(27% - 20px); /* Melebarkan kotak sedikit dan menambah jarak */
    margin: 15px; /* Jarak antara kotak */
    background: rgba(255, 254, 254, 1);
    display: flex;
    border-radius: 8px;
    flex-direction: column;
    z-index: 2;
    height: 296px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.box img {
    border-top-left-radius: 8px; /* Bulatkan sudut kiri atas */
    border-top-right-radius: 8px; /* Bulatkan sudut kanan atas */
    width: 100%; /* Mengatur lebar gambar agar 100% dari kotak */
    height: 250px; /* Mengurangi ketinggian gambar */
    object-fit: cover;
}

.card1{
    width: 50px;
    background: rgba(126, 10, 2, 1);
    color: #fff;
    font-family: poppins;
    text-align: center;
    font-size: 20px;
    position: relative;
}

.bg{
    width: 1360px;
    position: relative;
    top:-70px;
    z-index: 1;
    height: auto;
}

#logo{
    margin-left: 110px;
}

#navv{
    height: 80px;
    background-color: #fff;
    z-index: 2;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.imagecan{
    width: 250px;
    z-index: 1;
}

#btn1{
    background-color: #fff;
    border: 1px solid  rgba(172, 134, 62, 1);
    border-radius:30px;
    width: 260px;
    position: relative;
    left:450px;
    color: rgba(172, 134, 62, 1);
    letter-spacing: 1px;
}

#relawan{
    border-radius:30px;
    color: #fff;
    width: 120px;
    letter-spacing: 1px;
    position: relative;
    left:460px;
    background: rgba(126, 10, 2, 1);
}

.judul{
    position: relative;
    top:-700px;
    font-size:30px;
    font-weight: 700;
    color: rgba(126, 10, 2, 1);
    font-family: Montserrat;
    text-align: center;
}

.smk{
    font-family: Montserrat;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    position: relative;
    top:-730px;
}
</style>
