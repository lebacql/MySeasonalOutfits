import '@/styles/globals.css'
import axios from './axios';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
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
    <BrowserRouter>
    <Switch>
      <Route exact={true} path={'/'} component={<Home />} />
    </Switch>
    </BrowserRouter>
  );
}

export default App;
