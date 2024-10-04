import * as bootstrap from 'bootstrap';


export function asignarEventosCifradoEscitala() {

    const helpIcon = document.getElementById('help-icon');
    if (helpIcon) {
        helpIcon.addEventListener('click', function () {
            console.log('Ícono de ayuda clickeado');
            const helpModal = new bootstrap.Modal(document.getElementById('info-modal'));
            helpModal.show();
        });
    }


    function inicializarCifradoEscitala() {
        const encryptButton = document.getElementById('encrypt-button');
        const decryptButton = document.getElementById('decrypt-button');
        const inputText = document.getElementById('input-text');
        const resultadoPizarron = document.getElementById('resultado-pizarron');
        const columnInput = document.getElementById('column-value');
        const errorAlert = document.getElementById('error-alert');
        const resetButton = document.getElementById('reset-button');
        const copyButton = document.getElementById('copy-button');


        function mostrarAlerta(mensaje) {
            errorAlert.innerHTML = mensaje;
            errorAlert.style.display = 'block';
        }


        function ocultarAlerta() {
            errorAlert.style.display = 'none';
        }


        function cifrarEscitala(text, columns) {
            let result = '';
            const numRows = Math.ceil(text.length / columns);

            for (let i = 0; i < columns; i++) {
                for (let j = i; j < text.length; j += columns) {
                    result += text[j];
                }
            }
            return result;
        }


function descifrarEscitala(text, columns) {
    const numRows = Math.ceil(text.length / columns);
    let result = '';


    const grid = Array.from({ length: columns }, () => []);

    let charIndex = 0;


    for (let col = 0; col < columns; col++) {
        for (let row = 0; row < numRows; row++) {
            if (charIndex < text.length) {
                grid[col][row] = text[charIndex++];
            }
        }
    }


    for (let row = 0; row < numRows; row++) {
        for (let col = 0; col < columns; col++) {
            if (grid[col][row]) {
                result += grid[col][row];
            }
        }
    }

    return result.trim();
}




        encryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const columns = parseInt(columnInput.value);


            if (isNaN(columns) || columns <= 0) {
                mostrarAlerta('Error: El número de columnas debe ser un valor mayor que 0.');
                return;
            } else {
                ocultarAlerta();
            }


            if (!text) {
                mostrarAlerta('Error: El campo de texto no puede estar vacío.');
                return;
            } else {
                ocultarAlerta();
            }

            const encryptedText = cifrarEscitala(text, columns);
            resultadoPizarron.textContent = encryptedText;
            copyButton.style.display = 'inline';
        });


        decryptButton.addEventListener('click', function () {
            const text = inputText.value;
            const columns = parseInt(columnInput.value);


            if (isNaN(columns) || columns <= 0) {
                mostrarAlerta('Error: El número de columnas debe ser un valor mayor que 0.');
                return;
            } else {
                ocultarAlerta();
            }


            if (!text) {
                mostrarAlerta('Error: El campo de texto no puede estar vacío.');
                return;
            } else {
                ocultarAlerta();
            }

            const decryptedText = descifrarEscitala(text, columns);
            resultadoPizarron.textContent = decryptedText;
            copyButton.style.display = 'inline';
        });


        resetButton.addEventListener('click', function () {
            inputText.value = '';
            resultadoPizarron.textContent = 'Introduce el texto para cifrar o descifrar Escítala';
            copyButton.style.display = 'none';
            ocultarAlerta();
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

   
    inicializarCifradoEscitala();
}
