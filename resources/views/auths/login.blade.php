<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login section</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

        {{-- FORM LOGIN --}}

        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="number"name="npm" required>
                    <label>NPM</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" style="--i:4; --j:25;">
                    <p>Don't have an account ? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <img src="img/Universitas_Nasional_Logo.png" alt="Universitas_Nasional_Logo"class="animation" style="--i:0; --j:20;">
            <h2 class="animation" style="--i:0; --j:21;">Welcome back!</h2>
            <p class="animation" style="--i:1; --j:22;">Login to access your account.</p>
        </div>
        
        {{-- FORM REGISTER --}}

        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="{{ route('signup') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="number" name="npm" required>
                    <label>NPM</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="number" name="nik" required>
                    <label>NIK</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="text" name="nama" required>
                    <label>Nama</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="text" name="alamat" required>
                    <label>Alamat</label>
                    <i class='bx bxs-home-alt-2'></i>
                </div>
                <div class="input-box animation prodi_box" style="--i:20; --j:3;">
                    <select name="prodi" class="input-box prodi" required>
                        <option value={{ null }}>Program Studi</option>
                        @foreach ($data as  $d)                            
                            <option value={{ $d['id_prodi'] }}>{{ $d['prodi'] }}</option>
                            {{-- <option value=>{{ dd($d) }}</option> --}}
                        @endforeach
                        {{-- <option value="Address 1">Informatika</option>
                        <option value="Address 1">Sistem Informasi</option> --}}
                    </select>
                    <label>Program Studi</label>
                    <i class='bx bxs-book'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="number" name="telephon" required>
                    <label>Telephone</label>
                    <i class='bx bx-phone'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an account ? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <img src="img/Universitas_Nasional_Logo.png" alt="Universitas_Nasional_Logo"class="animation" style="--i:17; --j:0;">
            <h2 class="animation" style="--i:18; --j:1;">Welcome back!</h2>
            <p class="animation" style="--i:19; --j:2;">Register</p>
        </div>
    </div>

    <script src="./Js/script.js"></script>

</body>
</html>