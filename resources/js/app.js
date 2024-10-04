
import 'bootstrap';
import { asignarEventosCifradoCesar } from './cifradoCesar';

import { asignarEventosCifradoEscitala } from './cifradoEsitala';

import  {asignarEventosCifradoSimetrico} from './cifradoSimetrico';

import  {asignarEventosCifradoAsimetrico} from './cifradoAsimetrico';

import {asignarEventosHash} from './cifradoHash';

document.addEventListener('DOMContentLoaded', function () {
    console.log('App JS cargado correctamente');


    function cargarComponentes(componente) {
        fetch(`/componentes/${componente}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('contenido-dinamico').innerHTML = html;

                if(componente=='cesar'){
                    asignarEventosCifradoCesar();
                }else if( componente=='escitala'){
                    asignarEventosCifradoEscitala();
                }else if(componente=='simetrico'){
                    asignarEventosCifradoSimetrico();
                }else if(componente=='asimetrico'){
                    asignarEventosCifradoAsimetrico();
                }else if(componente=='hash'){
                    asignarEventosHash();
                }

            })
            .catch(error => console.error('Error al cargar el componente', error));
    }

    window.cargarComponentes = cargarComponentes;


    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        link.addEventListener('click', function () {
            links.forEach(l => l.querySelector('i').classList.remove('active-icon'));
            links.forEach(l => l.classList.remove('active'));

            this.querySelector('i').classList.add('active-icon');
            this.classList.add('active');
        });
    });

   
    const showYouTubeButton = document.getElementById('show-youtube');
    const closeVideoButton = document.getElementById('close-video');
    const youtubeVideo = document.getElementById('youtube-video');
    const videoContainer = document.getElementById('video-container');
    const infoPizarron = document.getElementById('info-pizarron');
    const youtubeButtonContainer = document.getElementById('youtube-button-container');

    const videoUrl = 'https://www.youtube.com/embed/wDpqrasDmxM';

    if (showYouTubeButton) {
        showYouTubeButton.addEventListener('click', function () {
            youtubeVideo.src = videoUrl;
            videoContainer.style.display = 'block';
            infoPizarron.style.display = 'none';
            youtubeButtonContainer.style.display = 'none';
        });
    }

    if (closeVideoButton) {
        closeVideoButton.addEventListener('click', function () {
            youtubeVideo.src = '';
            videoContainer.style.display = 'none';
            infoPizarron.style.display = 'block';
            youtubeButtonContainer.style.display = 'block';
        });
    }



});
