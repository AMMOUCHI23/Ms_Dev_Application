
import {React, useState, useEffect, useRef} from 'react';
import ParentComponent from './components/ParentComponent';
import MyComponent from './MyComponent.js';
import axios from "axios";
import RechercheFilm from './components/RechercheFilm';
import Tableau from './components/Tableau';
import Graphique from './components/Graphique';

const a = 4+5;


 
    {/* JSX 1- Afficher un contenu
    const App = () => {
  const name = 'Jimmy McNulty';

  return (
    <div className="app">
      <h1>Bienvenue dans mon application React</h1>
      <p>Je m'appelle {name}</p>
      <button>Click me</button>
    </div>
  );
};
    */}
  
    {/* JSX 2-  Instruction ternaire
  const App = () => {
  let en_anglais = false;
  let prenom= "Abdallah";

  return (
    <div>
      {
        en_anglais?
        (
          <div>
            Hello {prenom}
          </div>
        )
        :
        (
          <div>
          Bonjour {prenom}
        </div>
        )
      }
      
    </div>
  );
};
  */}

     {/* JSX 3- Afficher un tableau avec la fonction map
    const App = () => {
  let couleurs = ["rouge","noir", "vert", "marron", "jaune","bleu"];

  return (
    <div >
     <h1>La liste des couleurs</h1>
      <ol>
       {
        couleurs.map((item)=>(
        <li>{item}</li>
        ))
       } 
      </ol>
      
    </div>
  )onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
}
  */ 
                                                  /* React 1- Créer et uonst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};tiliser un composant
     un composant est une classe javascript qui renvoie du JSX

    const App = () => {
 
onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
  return (
    <div >
     <h1>Voici mon composant que j'ai crié</h1>
     <MyComponent />
      
    </div>
  )
}
*/} 

                                              {/* React 2- Comp /* React 4- Les Hooks (crochets)osition des composants  
Utiliser des composants dans d'autres composants
    

    const App = () => {
 
    return (
      <div>
      <ParentComponent/>
      
   </div>

    );
    };

      const ParentComponent = () => {
        return (
          <div>
            <h2>Je suis le composant parent</h2>
            <ChildComponent />
          </div>
        );
        };
      
      const ChildComponent = () => {
        return <p>Je suis le composant enfant</p>;
      };
*/} 

                                                  /* React 3- L es Propriétés (Props)
Les ̀props` sont des objets JavaScript utilisés pour transmettre des données d'un composant à un autre. Ils sont passés 
en tant qu'attributs aux composants et peuvent contenir n'importe quel type de données, telles que des chaînes de caractères,
 des nombres, des tableaux ou même des fonctions.
    
const App = () => {
  return (
    <div>
    <HelloChild name="Jimmy McNulty" />
  </div>
  );
};

// Exemple de composant avec des props
const HelloChild = (props) => {
  return <h1>Bonjour, {props.name} !</h1>;
};
*/

                                                  /* React 4- Les Hooks (crochets)
sont des fonctions prédéfinies qui peuvent être utilisées pour gérer différents aspects du cycle de vie et du comportement des composants.

Voici quelques hooks couramment utilisés :

useState - permet de déclarer et de mettre à jour un état local dans un composant fonctionnel
useEffect - permet d'effectuer des actions tels que des appels à des API externes, la souscription à des événements, etc
useRef - permet de créer une référence mutable qui persiste entre les rendus d'un composant

a- hook useState

    
const App = () => {
  const [count, setCount]=useState(0);
   const increment =()=>{
    setCount(count + 1);
   }
  return (
  <div>
    <p>Compteur: {count}</p>
    <button onClick={increment}>incrementer</button>onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
  </div>
  );
};
*/
/*
b- hook useEffect

    
const App = () => {
  const [users, setUsers] = useState(null);

  useEffect(() => {
    // Appel à une API externe pour récupérer des données
    fetch('https://reqres.in/api/users?per_page=20')
      .then(response => response.json())
      .then(data => setUsers(data.data));
  }, []);

  return (
    <div>
      {users ? (onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
        <ul>
          {users.map(item => (
            <li key={item.first_name}>{item.last_name}</li>
          ))}
        </ul>
      ) : (
        <p>Chargement des données...</p>
      )}
    </div>
  );
};

//Exercice

const App = (props) => {

  const [nombre, setNombre] = useState(0);

  useEffect(() => {
      console.log("useEffect 2 ...")
  }, [nombre])

  useEffect(() => {
      console.log("useEffect 1 ...")
  }, [])

  const handleClick1 = () => {
      setNombre(Math.random());
  }

  return (
      <>
          <div>
              {nombre}
          </div>
          <button onClick={handleClick1}>nouveau nombre</button>
      </>
  );
}
 le premier useEffect s'exicute jute une fois au montage initial parce que il a un rendu vide, tandis le deuxieme UseEffect
il renvoie le nombre donné en cliquant sur le bouton, donc il s'exicute à chaque fois qu'on clic sur le bouton
*/
                                           /* React 4- Gestion des évenements, Input Controlé et non controlé
a- Evenement onClick onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
const App = () => {

  const [message, setMessage] = useState("");

  const handleClick = () => {
      setMessage("Le bouton a été cliqué");
  };

  return (
      
          <div>
              <p> {message} </p>
              <button onClick={handleClick}>Cliquer-moi</button>
          </div>
         
    
  );
}
*/
/*
// b- Input controlé
/*Les inputs contrôlés sont liés à une valeur de l'état du composant. À chaque modification de l'input, 
l'état est mis à jour, ce qui permet de contrôler et de gérer la valeur de l'input.
const App = () => {

  const [name, setName] = useState("");

  const handleChange = (event) => {
      setName(event.target.value);
  };

  return (
      
          <div>
              <input type='text' value={name} onChange={handleChange}/>
              <p>Bonjour, {name} </p>
          </div>
         
    
  );onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );onst App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
};
};
}
Explication : Dans cet exemple, nous utilisons la valeur de l'état ̀name pour contrôler la valeur de l'input. 
À chaque modification de l'input, la fonction handleChange() est appelée, mettant à jour la valeur deExplication : 
Dans cet exemple, nous utilisons la valeur de l'état ̀name pour contrôler la valeur de l'input. À chaque modification
 de l'input, la fonction handleChange() est appelée, mettant à jour la valeur de l'état name et affichant 
 le message "Bonjour, {name} !" à l'écran. l'état name et affichant le message "Bonjour, {name} !" à l'écran.
*/
/*
// b- Input noncontrolé
// Les inputs non contrôlés n'utilisent pas l'état du composant pour gérer leur valeur. 
//Au lieu de cela, nous utilisons une référence pour obtenir la valeur de l'input.
const App = () => {

  const inputRef = useRef(null);

  const handleClick = () => {
    const value=inputRef.current.value;
      console.log(value);
  };

  return (
      
          <div>
              <input type='text' ref={inputRef}/>
              <button onClick={handleClick}>Afficher la valeur</button>
          </div>
         
    
  );
}
Explication :Dans cet exemple, nous utilisons la référence inputRef pour obtenir la valeur de l'input lors 
du clic sur le bouton. Lorsque le bouton est cliqué, la fonction handleClick() est appelée, récupérant la valeur 
de l'input à l'aide de inputRef.current.value et l'affichant dans la console.*/               



/*                                  ********Mise en pratique ******** 
const App = () => {
  return (
    <div>
      <h1>Mon application React</h1>
      <ParentComponent />
    </div>
  );
};
*/
/* *************************Intéragir une API **********
Pour Intéragir une avec une API on utilise la bibliotheque axios ou la fonction de javaScript fecth
 a- Axios

const App = () => {
  
    axios.get('/user?ID=12345')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  }
  );
*/
const App = () => {
  return (
    <>
    <div>
      <h1>Mon application React</h1>

      <h2>Les exercices</h2>
      <ParentComponent />
    </div>
    <div>
    <h2>Les exercices 4</h2>
    <h1>Recherche des films</h1>
    <RechercheFilm />
    </div>
    <div>
    <h1>Création d'un tableau</h1>
    <Tableau/>
    </div>
    <div>
    <h1>Les graphes</h1>
    <Graphique/>
    </div>
    </>
  );
};




export default App;
