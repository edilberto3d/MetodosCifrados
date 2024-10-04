<div class="pizarron-container text-center">
      <!-- Alerta de error -->
      <div class="alert alert-danger mt-3 w-50 mx-auto" id="error-alert" style="display: none;" role="alert">
        Error: El texto contiene caracteres no válidos para el idioma seleccionado.
    </div>
    <!-- Pizarrón -->
    <div class="pizarron position-relative shadow-lg" id="pizarron" style="background-color: #4CAF50; border: 5px solid #8B4513; height: 350px; width: 600px; margin: 0 auto;">
        <!-- Icono de ayuda -->
        <div class="position-absolute" style="top: 10px; right: 10px;">
            <i class="bi bi-question-circle-fill" id="help-icon" style="cursor: pointer; font-size: 24px; color: #007bff;" title="Pulsa para obtener ayuda"></i>
        </div>

        <!-- Resultado dentro del pizarrón -->
        <div id="info-pizarron" class="text-white d-flex align-items-center justify-content-center" style="height: 100%;">
            <h2 id="resultado-pizarron">Introduce el texto para cifrar o descifrar CESAR</h2>
        </div>
    </div>

    <!-- Selector de idioma -->
    <div class="mt-4">
        <label for="language-select" class="form-label">Selecciona el idioma:</label>
        <select id="language-select" class="form-select w-50 mx-auto">
            <option value="spanish" selected>Español</option>
            <option value="english">Inglés</option>
        </select>
    </div>

    <!-- Input de texto -->
    <div class="mt-4">
        <label for="input-text" class="form-label">Texto a cifrar/descifrar:</label>
        <textarea id="input-text" class="form-control w-50 mx-auto" rows="3" placeholder="Ingresa el texto"></textarea>
    </div>

    <!-- Selector del desplazamiento -->
    <div class="mt-4">
        <label for="shift-value" class="form-label">Valor de desplazamiento:</label>
        <input type="number" id="shift-value" min="1" max="25" value="3" class="form-control w-25 mx-auto">
    </div>


    <!-- Botones de Cifrar/Descifrar y Adicionales en la misma línea -->
<div class="d-flex justify-content-center align-items-center mt-3">
    <!-- Botón de Cifrar -->
    <button id="encrypt-button" class="btn btn-primary mx-2">Cifrar</button>

    <!-- Botón de Descifrar -->
    <button id="decrypt-button" class="btn btn-warning mx-2">Descifrar</button>

    <!-- Botón de Vaciar -->
    <button id="reset-button" class="btn btn-secondary mx-2">Vaciar</button>

    <!-- Botón de Copiar (Oculto por defecto) -->
    <button id="copy-button" class="btn btn-success mx-2" style="display: none;">Copiar</button>
</div>
    <!-- Modal de ayuda -->
    <div id="info-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            @include('components.modal-cesar')
        </div>
    </div>
</div>

