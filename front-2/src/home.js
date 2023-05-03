import { useState, useEffect } from 'react';
import instance from './axios';

function Articles() {
  const [articles, showArticles] = useState([]);

  useEffect(() => {
    instance.get('/articles')
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
            <h3>{article.Title}</h3>
            <img src={article.image}/>
            <p>{article.Content}</p>
            <p>{article.Date}</p>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Articles;