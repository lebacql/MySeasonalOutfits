import axios from 'axios';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './home';
import instance from './axios'

function App() {
  instance.get('/endpoint')
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
      <Route path='/' element={<Home />} />
    </Routes>
  );
}

export default App;
