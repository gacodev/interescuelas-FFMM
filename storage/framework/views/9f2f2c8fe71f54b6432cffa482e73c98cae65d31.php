<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'INTERESCUELAS')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/axios.min.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div>
                <a class="navbar-brand mr-4" href="<?php echo e(url('/home')); ?>">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Escudo_Fuerza_Aerea_Colombiana.svg/800px-Escudo_Fuerza_Aerea_Colombiana.svg.png" alt="" width="50px" height="50px">
                </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ml-4 mb-2 mb-lg-0 mx-auto">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Participantes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/equipos">Equipos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/staff">Registrar equipos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/participantes/registro">Registrar Participantes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/resultados">Resultados</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/roles">Roles</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active b" aria-current="page" href="/medalleria">Medalleria</a>
                      </li>
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <footer class="mt-4 fixed-bottom bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright:
          <a class="text-dark" href="https://fac.mil.co">Fuerza Aerea Colombiana</a>
        </div>
      </footer>
</body>
</html>
<?php /**PATH C:\Users\luis.contrerasv\Documents\bkinterescuelas\resources\views/layouts/app.blade.php ENDPATH**/ ?>