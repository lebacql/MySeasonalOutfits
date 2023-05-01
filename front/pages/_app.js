import '@/styles/globals.css'
import axios from './axios';
import { Routes, Route } from 'react-router-dom';
import { Home } from './home';

function App() {
  axios.get('/endpoint')
    .then(response => {
      // Traiter la réponse de l'API
      console.log(response.data);
    })
    .catch(error => {
      // Traiter les erreurs
      console.error(error);
    });

  return (
    <Routes>
      <Route path="/" element={<Home />} />
    </Routes>
  );
}

export default App;
