import React from 'react';
import ChildComponent from './ChildComponent';
import Compteur from './Compteur';
import ListeCourses from './ListeCourses';

const ParentComponent = () => {
  return (
    <>
    <ChildComponent /> 

    <h2>Compteur</h2>
    <Compteur/> 

    <h2>Liste de courses</h2>
    <ListeCourses/> 
    </>
  );
};

export default ParentComponent;