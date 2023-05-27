import { useState, useEffect } from 'react';
import axios from './axios';

function Articles() {
  const [articles, showArticles] = useState([]);
  const [categories, showCategory] = useState([]);

  useEffect(() => {
    fetchData();
  }, []);
  const fetchData = async () => {
    try {
      const response1 = await axios.get('/articles');
      const response2 = await axios.get('/category');

      showArticles(response1.data);
      showCategory(response2.data);
    } catch (error) {
      console.log(error);
    }
  }

  return (
    <div>
      {categories.map((category) => (
      <div key={category.id}>
        <select>{category.name}</select>
      </div>
    ))}
      <h2>Liste des articles</h2>
      <ul>
        {articles.map((article) => (
          <li key={article.id}>
            <h3>{article.title}</h3>
            <img src={`http://127.0.0.1:8000/upload/images/articles/${article.image}`} alt={article.title} />
            <p>{article.content}</p>
            <p>{article.date}</p>
          </li>
        ))}
      </ul>
    </div>


  );
}

export default Articles;