

<!doctype html>
<html lang="en">

<!-- Mirrored from templates.iqonic.design/posdash/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 11:10:14 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>POS Dash | Responsive Bootstrap 4 Admin Dashboard Template</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/posdash/html/assets/images/favicon.ico" />
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backend-plugin.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/backende209.css?v=1.0.0">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('backend_assets') }}/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class=" ">

<div class="wrapper">
    <section class="login-content">
       <div class="container">
          <div class="row align-items-center justify-content-center height-self-center">
             <div class="col-lg-8">
                <div class="card auth-card">
                   <div class="card-body p-0">
                      <div class="d-flex align-items-center auth-content">
                         <div class="col-lg-7 align-self-center">
                            <div class="p-3">
                               <h2 class="mb-2">Sign In</h2>
                               <p>Login to stay connected.</p>
                               <form action="{{ route('login') }}" method="POST">
                                @csrf
                                  <div class="row">
                                     <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control @error('email') is-invalid @enderror" type="email" placeholder=" " name="email" value="{{ old('email') }}" required autocomplete="email" id="email">
                                           <label for="email">Email</label>
                                           @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                           <input class="floating-input form-control @error('password') is-invalid @enderror" type="password" placeholder=" "  id="password" name="password" required autocomplete="current-password">
                                           <label for="password">Password</label>
                                           @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                           <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                           <label class="custom-control-label control-label-1" for="remember">Remember Me</label>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-primary float-right" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                     </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Sign In</button>

                                  <p class="mt-3">
                                     Create an Account <a href="{{ route('register') }}" class="text-primary">Sign Up</a>
                                  </p>
                               </form>
                            </div>
                         </div>
                         <div class="col-lg-5 content-right">
                            <img src="{{ asset('backend_assets') }}/images/login/01.png" class="img-fluid image-right" alt="">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('backend_assets') }}/js/backend-bundle.min.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('backend_assets') }}/js/table-treeview.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('backend_assets') }}/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('backend_assets') }}/js/chart-custom.js"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('backend_assets') }}/js/app.js"></script>
  </body>

<!-- Mirrored from templates.iqonic.design/posdash/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 11:10:14 GMT -->
</html>
