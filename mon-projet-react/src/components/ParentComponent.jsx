import React from 'react';
import ChildComponent from './ChildComponent';
import Compteur from './Compteur';
import ListeCourses from './ListeCourses';

const ParentComponent = () => {
  return (
    <>
    <h2>Exercice 1</h2>
    <ChildComponent /> 
    
    <h2>Exercice 2</h2>
    <h2>Compteur</h2>
    <Compteur/> 
     
    <h2>Exercice 3</h2>
    <h2>Liste de courses</h2>
    <ListeCourses/> 
    </>
  );
};

export default ParentComponent;