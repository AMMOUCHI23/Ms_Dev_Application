import axios from 'axios'
import '/assets/styles/app.css';
import React, { useState, useEffect } from 'react';


const Categorie = () => {
    const [categories, setCategories]=useState([]);
    
    // on utilise useEffect pour effectuer la requete dés le rendu initial
     useEffect(() => {
        axios.get('https://127.0.0.1:8000/api/categories?page=1')
        .then((response) => {
            setCategories(response.data['hydra:member']);
        })
        .catch((error) => {
          console.error("Une erreur s'est produite lors de la récupération des catégories :", error);
      });

    }, [] );
    
        return(
            <div className="container text-center text-primary my-4">
             <h1 className="my-4">Nos Catégories des plats</h1>
            <div className="row justify-content-center">
                {
                categories.map((category) =>(
                <div  key={category['@id']} className=" col-sm-5 col-md-4 my-4  "> 
                <a href="">
                <img 
                src={`assets/img/category/${category.image}`}
               
                alt={category.libelle}
                thumbnail
                width={350}
                
              />
              </a>
               <h3 className="nomCategorie my-2">{category.libelle}</h3>
              </div>
                ))
                }
            </div>
            </div>
        )
};

export default Categorie;
/*
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import '/assets/styles/app.css';
import { Container, Row, Col, Image } from 'react-bootstrap';


const Categories = () => {
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('https://127.0.0.1:8000/api/categories?page=1');
        setCategories(response.data['hydra:member']);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);

  return (
    <Container className="categories text-center text-primary my-4">
      <h1 className="my-4">Nos Catégories des plats</h1>
      <Row className="justify-content-center">
        {categories.map((category) => (
          <Col key={category['@id']} sm={6} md={3} className="categories custom-div m-3">
            <a href="#">
              <Image
                src={`assets/img/category/${category.image}`}
               
                alt={category.libelle}
                thumbnail
                width={400}
                height={400}
              />
            </a>
            <h3 className="nomCategorie my-2">{category.libelle}</h3>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default Categories;*/