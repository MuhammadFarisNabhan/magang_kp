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
        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="{{ route('signup') }}" method="POST">
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="number" name="npm" required>
                    <label>NPM</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:18; --j:1;">
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
                {{-- <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="text" name="alamat" required>
                    <label>Alamat</label>                    
                </div>                                 --}}
                {{-- <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="number" name="telepon" required>
                    <label>Telephon</label>                    
                </div> --}}
                <button type="submit" class="btn animation" name="signUp" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an account ? <a href="{{ route('login') }}" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <img src="img/Universitas_Nasional_Logo.png" alt="Universitas_Nasional_Logo"class="animation" style="--i:17; --j:0;">
            <h2 class="animation" style="--i:18; --j:1;">Welcome back!</h2>
            <p class="animation" style="--i:19; --j:2;">Register</p>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>