<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Relawan/Input suara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="logo"><i class="ri-infinity-line"></i> Quick Count</div>
        <ul class="menu">
           
            <li><a href="{{ route('home') }}"><i class="ri-file-list-3-line"></i>Data TPS</a></li>
            <li><a href="{{ route('hasilquick') }}"><i class="ri-user-voice-fill"></i>Quick Count</a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
           <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </ul>
    </div>
    <div class="logo" style="box-shadow:0 4px 10px rgba(0,0,0,0.1); position: relative; width:1115px; border-bottom:1px solid; background-color:#FDFDFD; margin-left:280px;margin-top:-610px; color:#C4C3C5; "><i class="ri-menu-line" style="position: relative; left:-450px;"></i><p style="color: #C4C3C5; font-size:20px; left:-430px; position: relative; top:8px; font-weight:400;">Dashboard</p></div>
    <div class="content">
       <div class="card" style="width:940px; margin-left:300px;">
        <div class="card-body">
            <form method="post" action="{{ route('suara.store') }}"> 
                @csrf
                <input type="hidden" name="tps_id" value="{{ $tps_id }}">
                <input type="hidden" name="kabupaten" value="{{ $kabupaten }}">
                
                    <table>
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ddd; padding: 8px; width:50px;"><div class="d-flex justify-content-center">No Urut</th>
                                <th  style="border: 1px solid #ddd; padding: 8px; width:140px;"><div class="d-flex justify-content-center">Nama Pasangan</th>
                                <th  style="border: 1px solid #ddd; padding: 8px; width:100px; "><div class="d-flex justify-content-center">Jumlah Suara</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paslon as $candidate)
                            <tr>
                                <td  style="border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">{{ $candidate->nourut }}</td>
                                <td  style="border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">{{ $candidate->namapaslon }}</td>
                                <td  style="border: 1px solid #ddd; padding: 8px; width:200px;"><div class="d-flex justify-content-center">
                                    <input type="number" name="suara[{{ $candidate->id }}]" min="0" value="0">
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                     
                    </table>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
        </div>
       </div>
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color:#EBECF0;
        font-family: poppins;
        overflow-x: hidden;
    }
      /* Add your CSS styling here */
      table {
            border-collapse: collapse;
            width: 900px;
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
