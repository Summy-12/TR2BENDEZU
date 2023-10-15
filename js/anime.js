function buscarAnime() {
    const animeName = document.getElementById('anime-name').value;
    const animeInfo = document.getElementById('anime-info');
    const animeTitle = document.getElementById('anime-title');
    const animeLink = document.getElementById('anime-link');
    const animeImage = document.getElementById('anime-image');
    const animeList = document.getElementById('anime-informacionAnime');
    const animeDetails = document.getElementById('anime-detalles');
    const agregarLista = document.getElementById('agregar-lista');

    // Hacer una solicitud a la API AniList
    fetchAnimeInfo(animeName, animeTitle, animeLink, animeImage, animeList, animeInfo, animeDetails, agregarLista);
}

function fetchAnimeInfo(animeName, animeTitle, animeLink, animeImage, animeList, animeInfo, animeDetails, agregarLista) {
    axios
        .post('https://graphql.anilist.co', {
            query: `
query ($search: String) {
    Media (search: $search, type: ANIME) {
        id
        title {
            romaji
        }
        coverImage {
            medium
        }
        description
    }
}
`,
            variables: {
                search: animeName
            },
        }, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })

        
        .then((response) => {
            const anime = response.data.data.Media;

            // Mostrar la información del anime en la página
            animeTitle.innerText = anime.title.romaji;
            animeLink.href = `https://anilist.co/anime/${anime.id}`;
            animeImage.src = anime.coverImage.medium;
            animeInfo.style.display = 'block';
            animeList.innerHTML = `<li>${anime.description}</li>
`;
            

            // Mostrar el div de detalles del anime
            animeDetails.style.display = 'block';

            // Mostrar el botón "Agregar a Lista"
            agregarLista.style.display = 'block';
        })
        .catch((error) => {
            console.error(error);
        });
        

        
}

function abrirPopup() {
    const popup = document.getElementById("popup");
    const animeTitle = document.getElementById("anime-title").textContent;
    const animeImageURL = document.getElementById("anime-image").src;
    const animeDescription = document.getElementById("anime-informacionAnime").textContent;
    const nombreAnimeInput = document.getElementById("nombre-anime");
    const descripcionAnimeInput = document.getElementById("descripcion-anime");
    const primeraLineaDescripcion = animeDescription.split('\n')[0];
    const imagenURLInput = document.getElementById("imagen-url");
    const imagenPreview = document.getElementById("imagen-preview");

    nombreAnimeInput.value = animeTitle;

   


    imagenURLInput.value = animeImageURL;
    // Establece la URL de la imagen en el elemento <img> en tu formulario
    
    imagenPreview.src = animeImageURL;

    descripcionAnimeInput.value = primeraLineaDescripcion;

    popup.style.display = "block"}


function cerrarPopup() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}

