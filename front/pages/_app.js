import '@/styles/globals.css'
import axios from './axios';

axios.get('/endpoint')
  .then(response => {
    // Traiter la réponse de l'API
    console.log(response.data);
  })
  .catch(error => {
    // Traiter les erreurs
    console.error(error);
  });
  
export default function App({ Component, pageProps }) {
  return <Component {...pageProps} />
}
