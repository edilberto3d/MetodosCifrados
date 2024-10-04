<div class="pizarron-container text-center">

    <div class="alert alert-danger mt-3 w-50 mx-auto" id="error-alert" style="display: none;" role="alert">
        Error: El texto contiene caracteres no válidos para el cifrado asimétrico.
    </div>


    <div class="pizarron position-relative shadow-lg" id="pizarron" style="background-color: #4CAF50; border: 5px solid #8B4513; height: 350px; width: 600px; margin: 0 auto;">

        <div class="position-absolute" style="top: 10px; right: 10px;">
            <i class="bi bi-question-circle-fill" id="help-icon" style="cursor: pointer; font-size: 24px; color: #007bff;" title="Pulsa para obtener ayuda"></i>
        </div>

        <div id="info-pizarron" class="text-white d-flex align-items-center justify-content-center text-center" style="height: 100%; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; padding: 10px;">
            <h2 id="resultado-pizarron" style="max-width: 100%; white-space: normal;">Introduce el texto para cifrar o descifrar Asimétrico</h2>
        </div>
    </div>


    <div class="mt-4">
        <label for="cipher-type" class="form-label">Selecciona el tipo de cifrado asimétrico:</label>
        <select id="cipher-type" class="form-select w-50 mx-auto">
            <option value="rsa" selected>RSA</option>
            <option value="ecc">ECC</option>
            <option value="diffie-hellman">Diffie-Hellman (Intercambio de claves)</option>
        </select>
    </div>


    <div class="mt-4">
        <label for="input-text" class="form-label">Texto a cifrar/descifrar:</label>
        <textarea id="input-text" class="form-control w-50 mx-auto" rows="3" placeholder="Ingresa el texto"></textarea>
    </div>


    <div class="mt-4">
        <label for="key-value" class="form-label">Clave pública/privada:</label>
        <input type="text" id="key-value" class="form-control w-50 mx-auto" placeholder="Introduce la clave">
    </div>


    <div class="d-flex justify-content-center align-items-center mt-3">

        <button id="encrypt-button" class="btn btn-primary mx-2">Cifrar</button>


        <button id="decrypt-button" class="btn btn-warning mx-2">Descifrar</button>


        <button id="reset-button" class="btn btn-secondary mx-2">Vaciar</button>

        <button id="copy-button" class="btn btn-success mx-2" style="display: none;">Copiar</button>
    </div>


    <div id="info-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            @include('components.modal-asimetrico')
        </div>
    </div>
</div>
