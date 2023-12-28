<div class="container">
    <div class="post-main">
        <div class="player-wrapper bg-black no-jsappear" data-player-wrap-id="51">
            <div class="player-wrapper-ratio ratio ratio-21x9">
                <div class="player-container">
                    <div class="player-header p-3">
                        <div class="d-flex align-items-center">
                            <h5 class="post-title post-title-md h5">Star Wars &#8211; The Old Republic
                            </h5>
                            <div class="ms-auto">
                                <button type="button" class="btn-close outline-none shadow-none"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="player-embed overflow-hidden bg-black ratio ratio-21x9">

                        {{-- <video  width="640" height="360">
                            <source src="{{ asset('storage/videos/' . $hashVideo->chemin_vers_video) }}"
                                type="video/mp4">
                        </video> --}}
                        <div class="player-embed overflow-hidden bg-black ratio ratio-21x9">
                            <video oncontextmenu="return false;" id="videoPlayer" class="video-js vjs-theme-forest" autoplay  controls >
                                <source src="{{ asset('storage/videos/' . $hashVideo->chemin_vers_video) }}" type="video/mp4">
                                <!-- Ajoutez d'autres sources pour différents formats si nécessaire -->
                                <track src="fgsubtitles_en.vtt" kind="subtitles" srclang="en" label="English">
                                    <track src="fgsubtitles_no.vtt" kind="subtitles" srclang="no" label="Norwegian">
                                <!-- Vous pouvez également ajouter des pistes de sous-titres ici si vous en avez -->
                                <div class="video-controls">
                                    <button onclick="rewindVideo()">Reculer</button>
                                    <button onclick="forwardVideo()">Avancer</button>
                                </div>
                                <!-- Masquer le bouton de téléchargement -->
                                <button class="vjs-control vjs-download-button" type="button" title="Télécharger" style="display: none;">
                                    <span aria-hidden="true" class="vjs-icon-placeholder"></span>
                                    <span class="vjs-control-text" aria-live="polite"></span>
                                </button>

                                  <!-- Bouton pour avancer de 10 secondes -->
       
                            </video>
                        </div>
                        
                        <!-- Assurez-vous d'inclure Video.js et ses styles dans votre page -->
                      
                        <!-- Initialisez le lecteur vidéo avec Video.js -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var player = videojs('videoPlayer', {
                                    // Options de configuration de Video.js (ajoutez selon vos besoins)
                                });
                                function rewindVideo() {
        //video.currentTime -= 0.5;
        video.playBackRate = -2;
        video.play();
    }    

           // Fonction pour reculer la vidéo de quelques secondes
    window.rewindVideo = function () {
        var currentTime = player.currentTime();
        player.currentTime(currentTime - 10); // Ajustez la valeur selon vos besoins
    };

    // Fonction pour avancer la vidéo de quelques secondes
    window.forwardVideo = function () {
        var currentTime = player.currentTime();
        player.currentTime(currentTime + 10); // Ajustez la valeur selon vos besoins
    };
                        
                                // Masquer le bouton de téléchargement
                                player.ready(function () {
                                    var controlBar = player.controlBar;
                                    if (controlBar && controlBar.downloadButton) {
                                        controlBar.removeChild('downloadButton');
                                    }
                                });
                                
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>