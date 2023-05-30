import { useState, useEffect } from 'react';
import axios from './axios';

function Articles() {
  const [articles, showArticles] = useState([]);
  const [categories, showCategories] = useState([]);
  const [selectedCategory, setSelectedCategory] = useState('');

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      const response1 = await axios.get('/articles');
      const response2 = await axios.get('/categories');

      showArticles(response1.data);
      showCategories(response2.data);
    } catch (error) {
      console.log(error);
    }
  };

  const handleCategoryChange = (event) => {
    setSelectedCategory(event.target.value);
  };

  const filteredArticles = selectedCategory
  ? articles.filter((article) => article.category && article.category.name === selectedCategory)
  : articles;

  return (
    <div>
      <div>
        <select value={selectedCategory} onChange={handleCategoryChange}>
          <option value="">All Categories</option>
          {categories.map((category) => (
            <option key={category.id} value={category.name}>
              {category.name}
            </option>
          ))}
        </select>
      </div>
      <h2>Liste des articles</h2>
      <ul>
        {filteredArticles.map((article) => (
          <li key={article.id}>
            <h3>{article.title}</h3>
            <img
              src={`http://127.0.0.1:8000/upload/images/articles/${article.image}`}
              alt={article.title}
            />
            <p>{article.content}</p>
            <p>{article.date}</p>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Articles;
