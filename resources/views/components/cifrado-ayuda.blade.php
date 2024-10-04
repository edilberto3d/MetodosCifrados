<div class="container mt-5 p-4" style="border: 1px solid #e0e0e0; border-radius: 10px; background-color: #ffffff; max-width: 900px; margin: auto;">
    <h1 class="text-center mb-4" style="font-family: 'Georgia', serif; color: #333;">Comparación entre Laravel y React</h1>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Datos Personales</h2>
    <p style="color: #666; text-align: center;">
        <strong>Nombre:</strong> Edilberto Hernández Ramírez<br>
        <strong>Matrícula:</strong> 20221034<br>
        <strong>Carrera:</strong> Ingeniería en Desarrollo y Gestión de Software<br>
        <strong>Docente:</strong> NMce. Ana María Felipe Redondo<br>
        <strong>Grado y Grupo:</strong> 7 "B"
    </p>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Clases de Cifrado: Simétrico, Asimétrico y Hash</h2>
    <p style="color: #666; text-align: justify;">
        <strong>Cifrado Simétrico:</strong> Utiliza una única clave para cifrar y descifrar los datos. Es rápido, pero requiere un manejo seguro de la clave. <br>
        <strong>Cifrado Asimétrico:</strong> Utiliza dos claves diferentes: una pública para cifrar y una privada para descifrar. Aunque es más seguro, es más lento que el cifrado simétrico. <br>
        <strong>Hash:</strong> Unidireccional, convierte datos en un resumen o "digest". No es posible recuperar los datos originales desde el hash. Ideal para verificación de integridad.
    </p>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Documentación del Código</h2>
    <p style="color: #666; text-align: justify;">
        A continuación se explica cómo se implementaron los métodos de cifrado en Laravel (backend) y React (frontend). En Laravel, se utilizó el componente nativo para el cifrado simétrico (AES) y para hashing se utilizó bcrypt. React, por otro lado, hace uso de bibliotecas externas como CryptoJS para simular el cifrado en el lado del cliente.
    </p>

    <h4 class="mt-3" style="font-family: 'Georgia', serif; color: #666;">Laravel - Ejemplo de Cifrado AES</h4>
    <pre style="background-color: #f5f5f5; padding: 15px; border-radius: 5px;">
<code>
use Illuminate\Support\Facades\Crypt;

// Cifrado de datos
$encrypted = Crypt::encryptString('Mensaje secreto');

// Descifrado de datos
$decrypted = Crypt::decryptString($encrypted);
</code></pre>

    <h4 class="mt-3" style="font-family: 'Georgia', serif; color: #666;">React - Simulación de Cifrado con CryptoJS</h4>
    <pre style="background-color: #f5f5f5; padding: 15px; border-radius: 5px;">
<code>
import CryptoJS from 'crypto-js';

// Cifrado AES
const secretMessage = 'Mensaje secreto';
const encrypted = CryptoJS.AES.encrypt(secretMessage, 'claveSecreta').toString();

// Descifrado AES
const bytes  = CryptoJS.AES.decrypt(encrypted, 'claveSecreta');
const originalText = bytes.toString(CryptoJS.enc.Utf8);
</code></pre>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Comparación de Laravel vs React</h2>
    <table class="table table-bordered mt-3" style="color: #666;">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center;">Característica</th>
                <th style="text-align: center;">Laravel</th>
                <th style="text-align: center;">React</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Facilidad de Implementación</strong></td>
                <td>Laravel ofrece una implementación de cifrado directa y eficiente gracias a sus helpers integrados como <code>Crypt</code> para cifrado simétrico y <code>Hash</code> para hashing.</td>
                <td>En React, es necesario usar bibliotecas externas como CryptoJS o jsencrypt para lograr un cifrado simulado. Esto puede añadir complejidad, pero permite gran flexibilidad en el lado del cliente.</td>
            </tr>
            <tr>
                <td><strong>Rendimiento</strong></td>
                <td>Laravel al ser un framework backend ofrece un rendimiento más rápido en el cifrado ya que las operaciones se realizan en el servidor.</td>
                <td>React, al ejecutarse en el lado del cliente, tiene un rendimiento limitado por el navegador y la máquina del usuario. Las operaciones de cifrado en JavaScript son más lentas comparadas con las del servidor.</td>
            </tr>
            <tr>
                <td><strong>Seguridad</strong></td>
                <td>Laravel es más seguro porque el cifrado se realiza en el servidor, lo que significa que las claves privadas y los algoritmos están protegidos.</td>
                <td>En React, el cifrado en el cliente es más vulnerable, ya que el código JavaScript se ejecuta en el navegador del usuario. Las claves pueden ser interceptadas si no se manejan adecuadamente.</td>
            </tr>
            <tr>
                <td><strong>Escalabilidad</strong></td>
                <td>Laravel es más adecuado para aplicaciones que requieren procesamiento intensivo y gestión de seguridad del lado del servidor. La escalabilidad en Laravel se maneja bien.</td>
                <td>React puede manejar grandes interfaces de usuario, pero cuando se trata de cifrado y seguridad, es mejor delegar esas operaciones al backend para evitar vulnerabilidades.</td>
            </tr>
        </tbody>
    </table>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Justificación de Uso de Laravel para Cifrados</h2>
    <p style="color: #666; text-align: justify;">
        Laravel fue seleccionado para manejar los trabajos de cifrado debido a su sólida integración con herramientas de seguridad y cifrado de datos. Laravel incluye componentes nativos, como <code>Crypt</code> para cifrado simétrico y <code>Hash</code> para hashing, que simplifican la implementación de algoritmos de cifrado seguros y eficientes. Estos componentes aprovechan librerías modernas y seguras de PHP, como OpenSSL, para asegurar que los datos estén siempre protegidos.
    </p>
    <p style="color: #666; text-align: justify;">
        Laravel maneja las operaciones de cifrado en el servidor, lo que añade una capa adicional de seguridad, ya que las claves privadas y las operaciones críticas no se exponen en el lado del cliente. Esto lo hace ideal para proyectos donde la seguridad de los datos y la integridad del cifrado son cruciales.
    </p>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Comparación de Frameworks: React vs. Laravel</h2>
    <p style="color: #666; text-align: justify;">
        Comparando React con Laravel, ambos son herramientas poderosas, pero sirven para diferentes propósitos: React es una biblioteca de JavaScript enfocada principalmente en la creación de interfaces de usuario dinámicas, mientras que Laravel es un framework PHP diseñado para el desarrollo backend.
    </p>

    <ul style="color: #666;">
        <li><strong>Rendimiento:</strong> React utiliza el virtual DOM, lo que hace que sea extremadamente rápido en aplicaciones front-end complejas. Laravel es más pesado, ya que maneja la lógica del servidor y bases de datos.</li>
        <li><strong>Facilidad de Implementación de Métodos:</strong> Para cifrados en React, puedes usar bibliotecas de JavaScript como <em>crypto-js</em> para AES y otros algoritmos. Laravel facilita el cifrado backend con <code>Hash</code> y <code>Crypt</code>, proporcionando seguridad y facilidad de uso.</li>
    </ul>

    <h2 class="text-center mt-4" style="font-family: 'Georgia', serif; color: #555;">Comparación de los Cifrados</h2>
    <p style="color: #666; text-align: justify;">
        En términos de cifrado, AES es el más utilizado debido a su equilibrio entre seguridad y eficiencia. El cifrado César es didáctico pero inseguro. Escítala, al igual que César, carece de seguridad moderna. Diffie-Hellman sigue siendo crucial en el intercambio seguro de claves en protocolos como HTTPS.
    </p>
</div>
