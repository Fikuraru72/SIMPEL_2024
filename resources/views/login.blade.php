<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 2s ease-in forwards;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #37517E;
            color: white;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #000;
            color: white;
            padding: 1rem 0;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <main>
        <section class="py-3 py-md-5 py-xl-8">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-12 col-md-6 col-xl-7">
                        <div class="d-flex justify-content-center" style="background-color: #37517E">
                            <div class="col-12 col-xl-9 fade-in" style="background-color: #37517E">
                                <h1>SIMPEL</h1>
                                <hr class="border-primary-subtle mb-4">
                                <h3 class="h1 mb-4">Sistem Pelayanan Masyarakat</h3>
                                <p class="lead mb-5">RW 04 Kelurahan Jatimulyo, Kecamatan Lowokwaru, Kota Malang</p>
                                <div class="text-endx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                        fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                        <path
                                            d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5">
                        <div class="card border-0 rounded-4 fade-in">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <h3>Sign in</h3>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="username" id="username"
                                                    placeholder="name@example.com" required>
                                                @error('username')
                                                    <small class="text-danger">Username dan Password tidak sesuai</small>
                                                @enderror
                                                <label for="username" class="form-label">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password"
                                                    value="" placeholder="Password" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <label for="password" class="form-label">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <div
                                            class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                                            <a href="#!">Forgot password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 fade-in">
        <div class="container">
            <h5>Kontak RW</h5>
            <p>
                Alamat : Jl. Kembang Turi, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141<br>
                Email : RW04Jatimulyo@gmail.com<br>
                Telepon : 0341-2456-23
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS and dependencies (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
