import React, { useState } from 'react';

function RechercheFilm() {
  const [filmRechercher, setFilmRechercher] = useState('');
  const [resultatDeRecherche, setResultatDeRecherche] = useState([]);

  const handleChange = (event) => {
    setFilmRechercher(event.target.value);
  };

  const handleSearch = () => {
    if (filmRechercher.trim() === '') {
      alert('Veuillez entrer le titre du film.');
      return;
    }

    const apiKey = 'f33cd318f5135dba306176c13104506a';
    const apiUrl = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${encodeURIComponent(
      filmRechercher
    )}`;

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        setResultatDeRecherche(data.results);
      })
      .catch(function (error) {
        console.log(error);
      });
  };

  return (
    <>
      <div>
        
        <input
          type='text'
          value={filmRechercher}
          onChange={handleChange}
          placeholder='Entrez le titre de film'
        />
        <button onClick={handleSearch}>Recherche</button>
      </div>
      <div>
        {resultatDeRecherche.map((movie) => (
          <div key={movie.id}>
            <p><b>Titre de film:</b> {movie.title}</p>
            <p><b>Date de Sortie: </b> {movie.release_date}</p>
            <p><b>Note: </b> {movie.vote_average}</p>
          </div>
        ))}
      </div>
    </>
  );
}

export default RechercheFilm;