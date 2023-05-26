import { useState, useEffect } from 'react';
import axios from './axios';

function Question() {
  const [questions, showQuestion] = useState([]);
  const [answers, showAnswer] = useState([]);

  useEffect(() => {
    fetchData();
  }, []);
  const fetchData = async () => {
    try {
      const response1 = await axios.get('/questions'); 
      const response2 = await axios.get('/answers'); 
      
      showQuestion(response1.data);
      showAnswer(response2.data);
    } catch (error) {
      console.log(error);
    }
    }

    return (
      <div>
        <h3>Questions</h3>
        {questions.map((question) => (
          <div key={question.id}>
            <h2>{question.question}</h2>
    
            {answers.map((answer) => {
              if (answer.question.id === question.id) {
                return (
                  <div key={answer.id}>
                    <input type="checkbox"/>
                      <label>{answer.answer}</label>
                  </div>
                );
              }
              return null;
            })}
          </div>
        ))}
      </div>
    );
}

export default Question;