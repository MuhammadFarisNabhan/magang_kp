<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login section</title>
    <link rel="stylesheet" href="css/style2.css">
    {{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('auths.message-error')
    {{-- <div class="container"></div> --}}

    
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
                    <input type="number" name="nik" required>
                    <label>NIK</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="number" name="npm" required>
                    <label>NPM</label>
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
                <div>
                    <select class="input-box animation" style="--i:19; --j:2;" name="program_studi" required>
                        {{-- Option tag dynamically display from database --}}
                        <option value="" selected>Program Studi</option>
                         @foreach ($data as $p)  
                            <option value="{{ $p->id_program_studi }}">{{ $p->nama_program_studi }}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt' ></i>
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
    <script src="./Js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>