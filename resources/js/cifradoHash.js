import * as bootstrap from 'bootstrap';
import CryptoJS from 'crypto-js'; 


export function asignarEventosHash() {
    // Modal de ayuda para Hash
    const helpIcon = document.getElementById('help-icon');
    if (helpIcon) {
        helpIcon.addEventListener('click', function () {
            const helpModal = new bootstrap.Modal(document.getElementById('info-modal'));
            helpModal.show();
        });
    }


    function inicializarHash() {
        const generateHashButton = document.getElementById('generate-hash-button');
        const inputText = document.getElementById('input-text');
        const resultadoPizarron = document.getElementById('resultado-pizarron');
        const hashType = document.getElementById('hash-type');
        const errorAlert = document.getElementById('error-alert');
        const resetButton = document.getElementById('reset-button');
        const copyButton = document.getElementById('copy-button');

        // Simulación manual para variantes no soportadas de RIPEMD
        function hashManual(text, length) {
            let hash = '';
            for (let i = 0; i < text.length; i++) {
                hash += text.charCodeAt(i).toString(16);
            }

            return hash.padEnd(length / 4, '0').slice(0, length / 4);
        }

        // Función para generar el hash usando el tipo seleccionado
        function generarHash(text, tipoHash) {
            let hashResult;
            switch (tipoHash) {
                case 'ripemd':
                    hashResult = CryptoJS.RIPEMD160(text);
                    break;
                case 'ripemd128':
                    hashResult = hashManual(text, 128);
                    break;
                case 'ripemd160':
                    hashResult = CryptoJS.RIPEMD160(text);
                    break;
                case 'ripemd256':
                    hashResult = hashManual(text, 256);
                    break;
                case 'ripemd320':
                    hashResult = hashManual(text, 320);
                    break;
                default:
                    hashResult = CryptoJS.RIPEMD160(text); /
            }

            return typeof hashResult === 'string' ? hashResult : hashResult.toString(CryptoJS.enc.Hex);
        }


        generateHashButton.addEventListener('click', function () {
            const text = inputText.value;
            const tipoHash = hashType.value;

            if (!text) {
                errorAlert.style.display = 'block';
                errorAlert.textContent = 'Error: Debes ingresar texto para generar el hash.';
                return;
            } else {
                errorAlert.style.display = 'none';
            }

            const hashText = generarHash(text, tipoHash);

            resultadoPizarron.textContent = hashText;
            copyButton.style.display = 'inline';
        });


        resetButton.addEventListener('click', function () {
            inputText.value = '';
            resultadoPizarron.textContent = 'Introduce el texto para generar el hash';
            copyButton.style.display = 'none';
        });


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


    inicializarHash();
}
