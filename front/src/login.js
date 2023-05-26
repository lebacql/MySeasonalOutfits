// login.js

import React, { useState } from 'react';
import axios from 'axios';

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await axios.post(
        'http://127.0.0.1:8000/api/connexion',
        JSON.stringify({
          // username: email,
          // password: password,
          username: 'test@test.fr',
          password: 'password',
        }),
        );
    
      // Traiter la réponse et rediriger l'utilisateur en fonction du rôle
      // ...
    console.log(response);
    } catch (error) {
      // Gérer les erreurs
      // ...
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="email"
        placeholder="Email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      />
      <input
        type="password"
        placeholder="Password"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
      />
      <button type="submit">Login</button>
    </form>
  );
};

export default Login;
