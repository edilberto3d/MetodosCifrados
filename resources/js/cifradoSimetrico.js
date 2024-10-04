import * as bootstrap from "bootstrap";
import CryptoJS from "crypto-js"; 
import { Buffer } from "buffer";


export function asignarEventosCifradoSimetrico() {

    const helpIcon = document.getElementById("help-icon");
    if (helpIcon) {
        helpIcon.addEventListener("click", function () {
            const helpModal = new bootstrap.Modal(
                document.getElementById("info-modal")
            );
            helpModal.show();
        });
    }


    function inicializarCifradoSimetrico() {
        const encryptButton = document.getElementById("encrypt-button");
        const decryptButton = document.getElementById("decrypt-button");
        const inputText = document.getElementById("input-text");
        const resultadoPizarron = document.getElementById("resultado-pizarron");
        const keyInput = document.getElementById("key-value");
        const cipherType = document.getElementById("cipher-type");
        const errorAlert = document.getElementById("error-alert");
        const resetButton = document.getElementById("reset-button");
        const copyButton = document.getElementById("copy-button");

        // Función de Cifrado Simétrico simple (XOR)
        function cifrarXOR(text, key) {
            let result = "";
            for (let i = 0; i < text.length; i++) {
                const keyChar = key[i % key.length];
                const encryptedChar = String.fromCharCode(
                    text.charCodeAt(i) ^ keyChar.charCodeAt(0)
                );
                result += encryptedChar;
            }
            return btoa(result);
        }


        function descifrarXOR(text, key) {
            let decodedText = atob(text);
            let result = "";
            for (let i = 0; i < decodedText.length; i++) {
                const keyChar = key[i % key.length];
                const decryptedChar = String.fromCharCode(
                    decodedText.charCodeAt(i) ^ keyChar.charCodeAt(0)
                );
                result += decryptedChar;
            }
            return result;
        }


        function cifrarAES(text, key) {
            return CryptoJS.AES.encrypt(text, key).toString();
        }


        function descifrarAES(text, key) {
            const bytes = CryptoJS.AES.decrypt(text, key);
            return bytes.toString(CryptoJS.enc.Utf8);
        }


        function rotarBitsIzquierda(valor, cantidad) {
            return ((valor << cantidad) | (valor >>> (8 - cantidad))) & 0xff;
        }


        function rotarBitsDerecha(valor, cantidad) {
            return ((valor >>> cantidad) | (valor << (8 - cantidad))) & 0xff;
        }


        function toBase64(str) {
            return btoa(unescape(encodeURIComponent(str)));
        }


        function fromBase64(str) {
            return decodeURIComponent(escape(atob(str)));
        }

        // Simulación mejorada de Twofish usando múltiples rondas y más complejidad
        function cifrarTwofishSimulado(text, key) {
            let result = "";
            const blockSize = 16;
            const rounds = 8;

            // Aseguramos que la clave tenga al menos el tamaño del bloque
            const keyFull = key.padEnd(blockSize, " ").slice(0, blockSize);

            // Ciframos cada bloque de texto
            for (let i = 0; i < text.length; i++) {
                let blockChar = text.charCodeAt(i);


                for (let round = 0; round < rounds; round++) {
                    const keyChar = keyFull.charCodeAt((i + round) % blockSize);


                    blockChar = blockChar ^ keyChar
                    blockChar = rotarBitsIzquierda(blockChar, (round + 1) % 8);
                    blockChar = (blockChar + round) & 0xff;
                }

                result += String.fromCharCode(blockChar);
            }


            return toBase64(result);
        }


        function descifrarTwofishSimulado(encryptedText, key) {
            const blockSize = 16;
            const rounds = 8;
            const decodedText = fromBase64(encryptedText);
            let result = "";


            const keyFull = key.padEnd(blockSize, " ").slice(0, blockSize);


            for (let i = 0; i < decodedText.length; i++) {
                let blockChar = decodedText.charCodeAt(i);


                for (let round = rounds - 1; round >= 0; round--) {
                    blockChar = (blockChar - round) & 0xff;
                    blockChar = rotarBitsDerecha(blockChar, (round + 1) % 8);
                    const keyChar = keyFull.charCodeAt((i + round) % blockSize);
                    blockChar = blockChar ^ keyChar;
                }

                result += String.fromCharCode(blockChar);
            }

            return result;
        }
        // Evento de Cifrar
        encryptButton.addEventListener("click", function () {
            const text = inputText.value;
            const key = keyInput.value;
            const type = cipherType.value;

            if (!text || !key) {
                errorAlert.style.display = "block";
                errorAlert.textContent =
                    "Error: Debes ingresar texto y una clave válida para el cifrado.";
                return;
            } else {
                errorAlert.style.display = "none";
            }

            let encryptedText = "";
            if (type === "xor") {
                encryptedText = cifrarXOR(text, key);
            } else if (type === "aes") {
                encryptedText = cifrarAES(text, key);
            } else if (type === "twofish") {
                encryptedText = cifrarTwofishSimulado(text, key);
            }

            resultadoPizarron.textContent = encryptedText;
            copyButton.style.display = "inline";
        });


        decryptButton.addEventListener("click", function () {
            const text = inputText.value;
            const key = keyInput.value;
            const type = cipherType.value;

            if (!text || !key) {
                errorAlert.style.display = "block";
                errorAlert.textContent =
                    "Error: Debes ingresar texto cifrado y una clave válida para descifrar.";
                return;
            } else {
                errorAlert.style.display = "none";
            }

            let decryptedText = "";
            try {
                if (type === "xor") {
                    decryptedText = descifrarXOR(text, key);
                } else if (type === "aes") {
                    decryptedText = descifrarAES(text, key);
                } else if (type === "twofish") {
                    decryptedText = descifrarTwofishSimulado(text, key);
                }
            } catch (e) {
                errorAlert.style.display = "block";
                errorAlert.textContent =
                    "Error: No se pudo descifrar el texto. Verifica la clave.";
                return;
            }

            resultadoPizarron.textContent = decryptedText;
            copyButton.style.display = "inline";
        });


        resetButton.addEventListener("click", function () {
            inputText.value = "";
            keyInput.value = "";
            resultadoPizarron.textContent =
                "Introduce el texto para cifrar o descifrar Simétrico";
            copyButton.style.display = "none";
        });


        copyButton.addEventListener("click", function () {
            navigator.clipboard
                .writeText(resultadoPizarron.textContent)
                .then(() => {
                    alert("Texto copiado al portapapeles");
                })
                .catch(() => {
                    alert("Hubo un error al copiar el texto");
                });
        });
    }

    // Llamar a la función inicializar cuando el DOM esté completamente cargado
    inicializarCifradoSimetrico();
}
