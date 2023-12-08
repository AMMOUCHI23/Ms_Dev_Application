import axios from 'axios'
import React, { useState, useEffect } from 'react';


const Categorie = () => {
    const [categories, setCategories]=useState([]);
    
    // on utilise useEffect pour effectuer la requete dés le rendu initial
     useEffect(() => {
        axios.get('https://127.0.0.1:8000/api/categories?page=1')
        .then((response) => {
            setCategories(response.data['hydra:member']);
        });

    }, [] );
    
        return(
            <div class="container">
            <h1>Liste des Categorie</h1>
            <div class="row">
                {
                categories.map((category) =>(
                <div  key={category['@id']} className='col-3'> <img
                src={`assets/img/category/${category.image}`}
               
                alt={category.libelle}
                thumbnail
                width={400}
                height={400}
              />
              </div>
                ))
                }
            </div>
            </div>
        )
};

export default Categorie;