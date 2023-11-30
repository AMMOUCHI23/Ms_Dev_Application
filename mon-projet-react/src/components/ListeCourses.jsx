import React, { useState } from 'react';

const ListeCourses = ()=>{
    const [listeCourses, setListeCourses]= useState([]);
    const [nouvelElement, setNouvelElement] = useState('');

    const handleElement=(event)=>{
        setNouvelElement(event.target.value);
       
      }

    const ajouterElement=()=>{
        if (nouvelElement.trim() !==""){
            setListeCourses([...listeCourses,nouvelElement ]);
            setNouvelElement("");
        }
    };
    return (
        <>
        <h1>Liste de courses</h1>
       
        <div>
        <input type="text" value={nouvelElement} placeholder='Elément à ajouter' onChange={handleElement} />
        <button onClick={ajouterElement}>Ajouter</button>
        <ol> 
            {listeCourses.map((item)=>( <li>{item}</li>))}
        </ol>
        </div>

        </>
    )
}

export default ListeCourses;