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
      <h1>Nos Catégories des plats</h1>
      <Row className="justify-content-center">
        {categories.map((category) => (
          <Col key={category['@id']} sm={6} md={4} className="categories custom-div mx-3">
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

export default Categories;