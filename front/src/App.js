import { Routes, Route } from 'react-router-dom';
import Home from './home';
import Quiz from './quiz';
import Question from './question';
import Login from './login';
import axios from './axios'

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
      <Route path='/' element={<Home />} />
      <Route path='/quiz' element={<Quiz />} />
      <Route path='/questions' element={<Question />} />
      <Route path='/connexion' element={<Login />} />
    </Routes>
  );
}

export default App;
