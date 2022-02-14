<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('resources/css/login.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->

        @if (!empty($erro_msg))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sistema de login: </strong> {{ $erro_msg }}
            </div>
        @endif

        <div class="fadeIn first">
            <img src="{{ asset('resources/img/geralpisc.svg') }}" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="{{ route('site.login') }}" method="post">
            @csrf

            <input type="text" id="usuario" value="{{ old('usuario') }}" class="fadeIn second" name="usuario"
                placeholder="Usuario">
            @if ($errors->has('usuario'))
                <div class="text-danger" role="alert">
                    <strong>*</strong> {{ $errors->first('usuario') }}
                </div>
            @endif

            <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
            @if ($errors->has('senha'))
                <div class="text-danger" role="alert">
                    <strong>*</strong> {{ $errors->first('senha') }}
                </div>
            @endif
            <input type="submit" class="fadeIn fourth" value="Acessar">

        </form>

         @if (isset($erro))
                <div class="text-danger" role="alert">
                    <strong>*</strong> {{ $erro }}
                </div>
            @endif

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Esqueceu a senha?</a>
        </div>

    </div>
</div>
