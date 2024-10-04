<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aplicación de Cifrado</title>

        @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Cargar CSS y JS con Vite -->
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </head>
<body>

    <!-- Encabezado con fondo azul oscuro -->
    <header class="bg-dark-blue text-white p-4">
        <div class="container text-center">
            <!-- Título con ícono al lado y centrado -->
            <h1 class="mb-4 text-warning">
                <i class="fas fa-shield-alt"></i> Bienvenido A Cifrados De Varios Métodos
            </h1>

            <!-- Menú de opciones centrado con íconos -->
            <nav class="navbar navbar-expand-lg justify-content-center">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse justify-content-center" id="navbarMenu">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('inicio')" id="inicio-link">
                                    <i class="fas fa-home fa-2x"></i><br>
                                    Inicio
                                </a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('cesar')" id="cesar-link">
                                    <i class="fas fa-lock fa-2x"></i><br>
                                    Cifrado César
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('escitala')" id="escitala-link">
                                    <i class="fas fa-key fa-2x"></i><br>
                                    Cifrado Escítala
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('simetrico')" id="simetrico-link">
                                    <i class="fas fa-shield-alt fa-2x"></i><br>
                                    Cifrado Simétrico
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('asimetrico')" id="asimetrico-link">
                                    <i class="fas fa-exchange-alt fa-2x"></i><br>
                                    Cifrado Asimétrico
                                </a>
                            </li>

                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('hash')" id="hash-link">
                                    <i class="fas fa-hashtag fa-2x"></i><br>
                                    Hash
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="#" onclick="cargarComponentes('ayuda')" id="ayuda-link">
                                    <i class="fas fa-question-circle fa-2x"></i><br>
                                    Ayuda
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">

                <div id="contenido-dinamico" class="text-center">

                    @include('components.cifrado-inicio')
                </div>
            </div>
        </div>
    </div>


     <footer class="bg-dark-blue text-white text-center py-5 mt-5">
        <div class="container">
            <p class="mb-0" style="font-size: 1.25rem; font-weight: bold;">
                Hecho por <span class="text-warning">Edilberto Hernández Ramírez</span>
            </p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>
