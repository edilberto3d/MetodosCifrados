<div class="pizarron-container text-center">
    <!-- Alerta de error -->
    <div class="alert alert-danger mt-3 w-50 mx-auto" id="error-alert" style="display: none;" role="alert">
        Error: El texto contiene caracteres no válidos para el hash.
    </div>

    <!-- Pizarrón -->
    <div class="pizarron position-relative shadow-lg" id="pizarron" style="background-color: #4CAF50; border: 5px solid #8B4513; height: 350px; width: 600px; margin: 0 auto;">
        <!-- Icono de ayuda -->
        <div class="position-absolute" style="top: 10px; right: 10px;">
            <i class="bi bi-question-circle-fill" id="help-icon" style="cursor: pointer; font-size: 24px; color: #007bff;" title="Pulsa para obtener ayuda"></i>
        </div>

        <!-- Resultado dentro del pizarrón -->
        <div id="info-pizarron" class="text-white d-flex align-items-center justify-content-center text-center" style="height: 100%; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; padding: 10px;">
            <h2 id="resultado-pizarron" style="max-width: 100%; white-space: normal;">Introduce el texto para generar el hash</h2>
        </div>
    </div>

    <!-- Selector de tipo de hash -->
    <div class="mt-4">
        <label for="hash-type" class="form-label">Selecciona el tipo de hash:</label>
        <select id="hash-type" class="form-select w-50 mx-auto">
            <option value="ripemd">RIPEMD</option>
            <option value="ripemd128">RIPEMD-128</option>
            <option value="ripemd160" selected>RIPEMD-160</option>
            <option value="ripemd256">RIPEMD-256</option>
            <option value="ripemd320">RIPEMD-320</option>
        </select>
    </div>

    <!-- Input de texto -->
    <div class="mt-4">
        <label for="input-text" class="form-label">Texto para hash:</label>
        <textarea id="input-text" class="form-control w-50 mx-auto" rows="3" placeholder="Ingresa el texto"></textarea>
    </div>

    <!-- Botones de generar hash y vaciar en la misma línea -->
    <div class="d-flex justify-content-center align-items-center mt-3">
        <!-- Botón de Generar Hash -->
        <button id="generate-hash-button" class="btn btn-primary mx-2">Generar Hash</button>

        <!-- Botón de Vaciar -->
        <button id="reset-button" class="btn btn-secondary mx-2">Vaciar</button>

        <!-- Botón de Copiar (Oculto por defecto) -->
        <button id="copy-button" class="btn btn-success mx-2" style="display: none;">Copiar</button>
    </div>

    <!-- Modal de ayuda -->
    <div id="info-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            @include('components.modal-hash')
        </div>
    </div>
</div>
