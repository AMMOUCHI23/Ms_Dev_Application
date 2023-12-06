import axios from 'axios'


const Categorie = () => {
    axios.get('https://127.0.0.1:8000/api/categories?page=')
        .then((response) => {
            console.log(response.data['hydra:member']);
        });
};

export default Categorie;