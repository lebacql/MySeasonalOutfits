import { useState, useEffect } from 'react';
import axios from './axios';

function Articles() {
  const [articles, showArticles] = useState([]);

  useEffect(() => {
    axios.get('/articles')
      .then(response => {
        console.log(response.data);
        showArticles(response.data);
      })
      .catch(error => {
        console.log(error);
      });
  }, [])

  return (
    <div>
      <h2>Liste des articles</h2>
      <ul>
        {articles.map((article) => (
          <li key={article.id}>
            <h3>{article.title}</h3>
            <img src={`http://127.0.0.1:8000/upload/images/articles/${article.image}`} alt={article.title}/>
            <p>{article.content}</p>
            <p>{article.date}</p>
          </li>
        ))}
      </ul>
    </div>


  );
}

export default Articles;