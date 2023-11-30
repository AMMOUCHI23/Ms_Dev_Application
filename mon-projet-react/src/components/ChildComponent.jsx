
import React, { useState } from 'react';

const ChildComponent = () => {
  const [name, setName]=useState('');
  const [firstName, setFirstName]=useState('');

  const handleNomChange=(event)=>{
    setName(event.target.value);
   
  }
  const handlePrenomChange=(event)=>{
    setFirstName(event.target.value);
   
  }

  return (
     <div>
      <input type="text" value={name} placeholder='Votre nom' onChange={handleNomChange} />
      <input type="text" value={firstName} placeholder='Votre prénom' onChange={handlePrenomChange} />
      <p>Bonjour, {name}, {firstName}</p>
  </div>
  )
  
};

export default ChildComponent;