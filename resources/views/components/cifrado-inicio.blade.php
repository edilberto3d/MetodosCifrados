<div class="pizarron-container text-center">
    <div class="pizarron position-relative p-4 shadow-lg" id="pizarron" style="background-color: #4CAF50; border: 5px solid #8B4513; height: 350px; width: 600px; margin: 0 auto;">

        <!-- Contenedor del video de YouTube -->
        <div id="video-container" style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
            <!-- Botón para cerrar el video -->
            <button id="close-video" class="btn btn-danger position-absolute" style="top: 10px; right: 10px;">X</button>

            <!-- Video de YouTube ajustado para ocupar todo el pizarrón -->
            <iframe id="youtube-video" style="width: 100%; height: 100%;" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>

        <!-- Información del pizarrón antes de mostrar el video -->
        <div id="info-pizarron" class="text-white" style="padding-top: 60px;">
            <h2>Bienvenidos a los Métodos de Cifrado</h2>
            <p><strong>Nombre:</strong> Edilberto Hernandez Ramirez</p>
            <p><strong>Email:</strong> 20221034@uthh.edu.mx</p>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <!-- Icono de hoja izquierda -->
        <div class="hoja-icon">
            <i class="fas fa-leaf fa-3x text-success"></i>
        </div>

        <!-- Botón de YouTube en rojo -->
        <div id="youtube-button-container" class="mx-3">
            <button id="show-youtube" class="btn btn-danger btn-lg rounded-pill shadow-sm" style="display: block;">
                <i class="fab fa-youtube"></i> Mostrar Video de YouTube
            </button>
        </div>

        <!-- Icono de hoja derecha -->
        <div class="hoja-icon">
            <i class="fas fa-leaf fa-3x text-success"></i>
        </div>
    </div>
</div>
