<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Nagumo Admin  - Entra</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template-->
  <link href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class=" bg-login-image">
              
              </div>
              <div class="col-lg-6"style="background-image: url('https://nagumo.marketingonline.click/public/vendor/img/fundofrutaslayout2-.jpg');">
                <div class="p-5">
                  <div class="text-center">
                  <img src="https://nagumo.marketingonline.click/public/vendor/img/logo_nagumo.png" alt="Bootstrap" width="70" height="70">
                    <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                  </div>
                  <form action="{{ route('login.action') }}" method="POST" class="user">
                    @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Inserir Endereço Email...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Lembre de mim
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-user">Conecte-se</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    
                    <!-- msg de sucesso -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <a class="small" href="{{ route('register') }}">Crie a sua conta aqui!</a><br>
                    <a class="small" href="{{ route('inicio') }}">Retorno <-</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js') }}"></script>
</body>
</html>