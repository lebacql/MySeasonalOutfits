import { useState, useEffect } from 'react';
import axios from './axios';

function Quiz() {
  const [quizs, showQuiz] = useState([]);

  useEffect(() => {
    axios.get('/quiz')
      .then(response => {
        console.log(response.data);
        showQuiz(response.data);
      })
      .catch(error => {
        console.log(error);
      });
  }, [])

  return (
    <>
      <h3>Quiz</h3>
      <div>
        {quizs.map((quiz) => (
          <div key={quiz.id}>
            <h2>{quiz.season}</h2>
            <h3>{quiz.title}</h3>
            <p>{quiz.description}</p>
            <img src={`http://127.0.0.1:8000/upload/images/quiz/${quiz.image}`} alt={quiz.title} />
          </div>
        ))}
        <button><a href="./questions" class="button">Commencer</a></button>
      </div>
    </>
  );
}

export default Quiz;