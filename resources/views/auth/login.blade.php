<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body class=" bg-info-subtle">

        <section class="container-fluid">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="card rounded-4 overflow-hidden border-info border-2">
                        <div class="card-header bg-info shadow-2 border-0 ">
                            <h2 class="text-center fs-1 fw-600">Login Form</h2>
                        </div>
                        <div class="card-body pb-5 pe-5 ps-5">
                            <form action="{{ route('login.action') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" placeholder="******" class="form-control">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" name="rememberme" class="form-check-input" id="rememberme">
                                        <label class="form-check-label" for="rememberme">Remember me</label>
                                    </div>
                                    <p class=""><a href="{{ url('/') }}">Forget Password</a></p>
                                </div>

                               <div class="d-grid">
                                   <button class="btn btn-info fw-semibold fs-4 rounded-4">Login</button>
                               </div>
                                <div class=" text-center mt-3">
                                    <span class="fw-bold">or</span>
                                    <a href="{{ route('register') }}">Signup</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
