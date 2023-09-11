<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Data Suara Page</title>
    <link rel="icon" href="img/LOGOS.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="logo"><i class="ri-infinity-line"></i> Quick Count</div>
        <ul class="menu">
            <li><a href="" class="active"><i class="ri-home-3-line"></i>Dashboard</a></li>
            <li><a href="{{ route('paslon.index') }}"><i class="ri-user-heart-line"></i>Data Paslon</a></li>
            <li><a href="{{ route('tps.index') }}"><i class="ri-file-list-3-line"></i>Data TPS</a></li>
            <li><a href="{{ route('admin.index') }}"><i class="ri-team-line"></i>Data Relawan</a></li>
            <li><a href="{{ route('datasuara') }}"><i class="ri-bar-chart-line"></i>Data Suara</a></li>
            <li><a href=""><i class="ri-message-2-fill"></i>Data Berita</a></li>
            <li><a href="{{ route('hasilquick') }}"><i class="ri-user-voice-fill"></i>Quick Count</a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
           <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </ul>
    </div>
    <div class="logo" style="box-shadow:0 4px 10px rgba(0,0,0,0.1); position: relative; width:1115px; border-bottom:1px solid; background-color:#FDFDFD; margin-left:280px;margin-top:-610px; color:#C4C3C5; "><i class="ri-menu-line" style="position: relative; left:-450px;"></i><p style="color: #C4C3C5; font-size:20px; left:-430px; position: relative; top:8px; font-weight:400;">Dashboard</p></div>
    <div class="content">
        <div class="card" data-aos="fade-up"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine" style="width: 980px; margin-left:260px;">
            <div class="card-body">
                <a href=""  class="btn btn-warning mb-3">Print To PDF</a>
                <table>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">No </div></th>
                        <th style="border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Wilayah / Kota</div></th>
                        @foreach ($paslon as $item)
                        <th style="border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">
                        Paslon {{ $item->nourut }}</div></th>
                            @endforeach
                       
                       
                    </tr>
                    @foreach ($suaraByKabupaten as $kabupaten => $suaraPaslon)
                    <tr>
                        <td style="border: 1px solid #ddd; text-align:center; padding: 8px; "><a href="" style="text-decoration: none;">{{ $loop->iteration }}</a></td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">Kabupaten {{ $kabupaten }}</td>
                        @foreach ($suaraPaslon as $suara)
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">
                            {{ $suara->jumlah_suara }}
                        </td>
                        @endforeach
            
                    </tr>
                    @endforeach
                    
                
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        background-color:#EBECF0;
        font-family: poppins;
    }
      /* Add your CSS styling here */
      table {
            border-collapse: collapse;
            width: 940px;
            position: relative;
            
            
            
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 8px;
           
        }
        th {
            background-color: #f2f2f2;
        }
      
        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #2EB961;
            color: #fff;
            border: none;
        }
        .btn-primary:hover{
            background-color: #2EB961;
        }
        .btn-danger {
            background-color: #DE5554;
            color: #fff;
            border: none;
        }

    .sidebar {
        width: 250px;
        background-color: #3B4A64;
        color: white;
        height: 100vh;
        padding: 20px;
        box-sizing: border-box;
    }

    .logo {
        width: 260px;
        height: 75px;
        background-color: #2C344B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        position: relative;
        top: -22px;
        left: -30px;
        margin-bottom: 20px;
    }

    .menu {
        list-style: none;
        padding: 0;
    }

    .menu li {
        margin-bottom: 20px;
    }

    .menu a {
        text-decoration: none;
        color: #9AA4BD;
        font-size: 20px;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .menu a i {
        margin-right: 10px;
    }

    .menu a:hover {
        color: #fff;
       
    }

    .content {
        padding: 20px;
    }
</style>
