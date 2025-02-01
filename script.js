document.addEventListener("DOMContentLoaded", function() {
    let audio = document.getElementById("musica");
    
    // Establecer el volumen a 50%
    audio.volume = 0.5;

    // Solo reproducir cuando el usuario interactúe con la página
    document.body.addEventListener("click", function() {
        if (audio.paused) {
            audio.play().catch(error => console.log("Error al reproducir audio:", error));
        }
    });
});
