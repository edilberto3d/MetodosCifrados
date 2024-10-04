import * as bootstrap from 'bootstrap';


export function asignarEventosCifradoCesar() {

    const helpIcon = document.getElementById('help-icon');
    if (helpIcon) {
        helpIcon.addEventListener('click', function () {
            console.log('Ícono de ayuda clickeado');
            const helpModal = new bootstrap.Modal(document.getElementById('info-modal'));
            helpModal.show();
        });
    }


    const encryptButton = document.getElementById('encrypt-button');
    const decryptButton = document.getElementById('decrypt-button');
    const inputText = document.getElementById('input-text');
    const resultadoPizarron = document.getElementById('resultado-pizarron');
    const languageSelect = document.getElementById('language-select');
    const errorAlert = document.getElementById('error-alert');
    const resetButton = document.getElementById('reset-button');
    const copyButton = document.getElementById('copy-button');
    const shiftInput = document.getElementById('shift-value');


    function validarTexto(text, idioma) {
        const regexSpanish = /^[A-Za-zñÑ\s]+$/;
        const regexEnglish = /^[A-Za-z\s]+$/;
        if (idioma === 'spanish') {
            return regexSpanish.test(text);
        } else {
            return regexEnglish.test(text);
        }
    }


    if (encryptButton) {
        encryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const shift = parseInt(shiftInput.value);
            const idioma = languageSelect.value;


            if (!validarTexto(text, idioma)) {
                errorAlert.style.display = 'block';
                return;
            } else {
                errorAlert.style.display = 'none';
            }

            // Cifrar el texto
            const encryptedText = cifrarCesar(text, shift);
            resultadoPizarron.textContent = encryptedText;
            copyButton.style.display = 'inline';
        });
    }

    // Evento de Descifrar
    if (decryptButton) {
        decryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const shift = parseInt(shiftInput.value);
            const idioma = languageSelect.value;


            if (!validarTexto(text, idioma)) {
                errorAlert.style.display = 'block';
                return;
            } else {
                errorAlert.style.display = 'none';
            }


            const decryptedText = cifrarCesar(text, -shift);
            resultadoPizarron.textContent = decryptedText;
            copyButton.style.display = 'inline';
        });
    }


    function cifrarCesar(text, shift) {
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        let result = '';

        for (let i = 0; i < text.length; i++) {
            const char = text[i].toUpperCase();
            const index = alphabet.indexOf(char);

            if (index === -1) {
                result += char;
            } else {
                const newIndex = (index + shift + alphabet.length) % alphabet.length;
                result += alphabet[newIndex];
            }
        }

        return result;
    }


    if (resetButton) {
        resetButton.addEventListener('click', function () {
            inputText.value = '';
            resultadoPizarron.textContent = 'Introduce el texto para cifrar o descifrar';
            copyButton.style.display = 'none';
        });
    }

    
    if (copyButton) {
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
}
