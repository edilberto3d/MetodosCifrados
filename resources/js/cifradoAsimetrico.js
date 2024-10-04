import * as bootstrap from 'bootstrap';


export function asignarEventosCifradoAsimetrico() {

    const helpIcon = document.getElementById('help-icon');
    if (helpIcon) {
        helpIcon.addEventListener('click', function () {
            const helpModal = new bootstrap.Modal(document.getElementById('info-modal'));
            helpModal.show();
        });
    }

    function inicializarCifradoAsimetrico() {
        const encryptButton = document.getElementById('encrypt-button');
        const decryptButton = document.getElementById('decrypt-button');
        const inputText = document.getElementById('input-text');
        const resultadoPizarron = document.getElementById('resultado-pizarron');
        const keyInput = document.getElementById('key-value');
        const cipherType = document.getElementById('cipher-type');
        const errorAlert = document.getElementById('error-alert');
        const resetButton = document.getElementById('reset-button');
        const copyButton = document.getElementById('copy-button');


        function diffieHellmanSimulado(privateKey) {
            const base = 5;
            const modulo = 23;

            const privateKeyNum = parseInt(privateKey, 10);


            if (isNaN(privateKeyNum)) {
                return 'Error: La clave debe ser un número entero.';
            }


            const publicKey = Math.pow(base, privateKeyNum) % modulo;
            const sharedKey = Math.pow(publicKey, privateKeyNum) % modulo;
            return `Clave intercambiada: ${sharedKey}`;
        }

        // Simulación de cifrado RSA (usando XOR para demo)
        function cifrarAsimetricoRSA(text, key) {
            if (!key || key.length === 0) {
                return 'Error: Clave RSA no válida.';
            }
            let encrypted = '';
            for (let i = 0; i < text.length; i++) {
                encrypted += String.fromCharCode(text.charCodeAt(i) ^ key.charCodeAt(i % key.length));
            }
            return btoa(encrypted);
        }

        // Simulación de descifrado RSA (usando XOR para demo)
        function descifrarAsimetricoRSA(text, key) {
            if (!key || key.length === 0) {
                return 'Error: Clave RSA no válida.';
            }
            let decodedText = atob(text);
            let decrypted = '';
            for (let i = 0; i < decodedText.length; i++) {
                decrypted += String.fromCharCode(decodedText.charCodeAt(i) ^ key.charCodeAt(i % key.length));
            }
            return decrypted;
        }

        // Simulación de cifrado ECC (usando XOR para demo)
        function cifrarAsimetricoECC(text, key) {
            if (!key || key.length === 0) {
                return 'Error: Clave ECC no válida.';
            }
            let encrypted = '';
            for (let i = 0; i < text.length; i++) {
                encrypted += String.fromCharCode(text.charCodeAt(i) ^ key.charCodeAt(i % key.length));
            }
            return btoa(encrypted);
        }

        // Simulación de descifrado ECC (usando XOR para demo)
        function descifrarAsimetricoECC(text, key) {
            if (!key || key.length === 0) {
                return 'Error: Clave ECC no válida.';
            }
            let decodedText = atob(text);
            let decrypted = '';
            for (let i = 0; i < decodedText.length; i++) {
                decrypted += String.fromCharCode(decodedText.charCodeAt(i) ^ key.charCodeAt(i % key.length));
            }
            return decrypted;
        }

        // Evento para Cifrar
        encryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const key = keyInput.value;
            const selectedCipher = cipherType.value;

            if (!text || !key) {
                errorAlert.style.display = 'block';
                errorAlert.textContent = 'Error: Debes ingresar texto y una clave válida para el cifrado.';
                return;
            } else {
                errorAlert.style.display = 'none';
            }

            let encryptedText = '';
            if (selectedCipher === 'rsa') {
                encryptedText = cifrarAsimetricoRSA(text, key);
            } else if (selectedCipher === 'ecc') {
                encryptedText = cifrarAsimetricoECC(text, key);
            } else if (selectedCipher === 'diffie-hellman') {
                encryptedText = diffieHellmanSimulado(key) + ` para texto: ${text}`;
            }

            resultadoPizarron.textContent = encryptedText;
            copyButton.style.display = 'inline';
        });

        // Evento para Descifrar
        decryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const key = keyInput.value;
            const selectedCipher = cipherType.value;

            if (!text || !key) {
                errorAlert.style.display = 'block';
                errorAlert.textContent = 'Error: Debes ingresar texto y una clave válida para descifrar.';
                return;
            } else {
                errorAlert.style.display = 'none';
            }

            let decryptedText = '';
            if (selectedCipher === 'rsa') {
                decryptedText = descifrarAsimetricoRSA(text, key);
            } else if (selectedCipher === 'ecc') {
                decryptedText = descifrarAsimetricoECC(text, key);
            }

            resultadoPizarron.textContent = decryptedText;
            copyButton.style.display = 'inline'; 
        });

        // Evento de Reset para vaciar los campos
        resetButton.addEventListener('click', function () {
            inputText.value = '';
            keyInput.value = '';
            resultadoPizarron.textContent = 'Introduce el texto para cifrar o descifrar Asimétrico';
            copyButton.style.display = 'none';
        });

        // Evento de Copiar al portapapeles
        copyButton.addEventListener('click', function () {
            navigator.clipboard.writeText(resultadoPizarron.textContent)
                .then(() => {
                    alert('Texto copiado al portapapeles');
                })
                .catch(() => {
                    alert('Hubo un error al copiar el texto');
                });
        });
    }

    inicializarCifradoAsimetrico();
}
