@include('partials.header')

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('/assets/img/logosmk9-hd.png') }}" alt="AdminLTE Logo" class="brand-image" style="width: 90px;">
      <a href="../../index2.html" class="h1"><b>SI </b>HADIR</a>
      <p>Sistem Absensi SMKN 9 Kota Bekasi</p>
    </div>
    <div class="card-body">

      <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required autofocus autocomplete="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" type="password" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@include('partials.scripts')
</body>
</html>
