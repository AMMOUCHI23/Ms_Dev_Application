import React, { useState } from 'react';

const Compteur=()=>{
    const [number, setNumber]=useState(0)

    const handleClick=()=>{
        setNumber(number + 1);
    }
    return (
        <button onClick={handleClick}>Compteur = {number}</button>
    )
}
export default Compteur;