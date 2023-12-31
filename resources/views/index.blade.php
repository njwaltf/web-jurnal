<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurnal | Login</title>
    <link rel="shortcut icon" type="image/png" href="images/logos/favicon.png" />
    <link rel="stylesheet" href="css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Masuk dengan </p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if (session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {!! session('success') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('successLogout'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {!! session('successLogout') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('loginFail'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {!! session('loginFail') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text"
                                            class="form-control @error('username')
                                        is-invalid
                                        @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" name="username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control @error('password')
                                        is-invalid
                                        @enderror"
                                            id="exampleInputPassword1" name="password" value="{{ old('password') }}">
                                        @error('password')
                                            <p class="invalid">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="login"
                                        type="submit">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>s

</html>
