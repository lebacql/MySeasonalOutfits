import axios from 'axios';

// Créer une instance d'Axios avec les configurations globales
const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // URL de base de votre API Symfony
  timeout: 5000, // Timeout pour les requêtes (en millisecondes)
  headers: {
    'Content-Type': 'application/json', // Type de contenu pour les requêtes
  },
});

export default instance;