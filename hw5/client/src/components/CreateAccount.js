import React, { useState } from 'react';
import axios from 'axios';
import { Navigate } from 'react-router-dom';



const CreateAccount = () => {
  const [isComplete, setIsComplete] = useState(false);
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [questionOne, setQuestionOne] = useState('');
  const [questionTwo, setQuestionTwo] = useState('');
  const [questionThree, setQuestionThree] = useState('');
  const [questionFour, setQuestionFour] = useState('');
  const [questionFive, setQuestionFive] = useState('');
  const [questionSix, setQuestionSix] = useState('');
  const [questionSeven, setQuestionSeven] = useState('');
  const [questionEight, setQuestionEight] = useState('');
  const [questionNine, setQuestionNine] = useState('');
  const [questionTen, setQuestionTen] = useState(''); 
  

    

  const handleSubmit = (event) => {
    event.preventDefault();
    axios.post('localhost:8888/users', {
      username,
      password,
      questionOne,
        questionTwo,
        questionThree,
        questionFour,
        questionFive,
        questionSix,
        questionSeven,
        questionEight,
        questionNine,
        questionTen
    })
    .then((response) => {
      console.log(response);
      setIsComplete(true);
    })
    .catch((error) => {
      setIsComplete(true);
      console.error(error);
    });
  };
  if (isComplete) {
    console.log('isComplete');
    return <Navigate to="/Login"> </Navigate> ;
  }

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Username:
        <input
          type="text"
          value={username}
          onChange={(event) => setUsername(event.target.value)}
        />
      </label>
      <br></br> 
      <label>
        Password:
        <input
          type="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
        />
      </label>
      <br></br> 
      <label>
        Have you had past relationships?
        <input
          type="radio"
          value="yes"
          checked={questionOne === 1}
          onChange={(event) => setQuestionOne(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionOne === 0}
          onChange={(event) => setQuestionOne(0)}
        /> No
      </label>
      <br></br>
        <label>
        Have you ever been cheated on?
        <input
            type="radio"
            value="no"
            checked={questionTwo === 1}
            onChange={(event) => setQuestionTwo(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionTwo === 0}
          onChange={(event) => setQuestionTwo(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Do you want to get married?
        <input
            type="radio"
            value="no"
            checked={questionThree === 1}
            onChange={(event) => setQuestionThree(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionThree === 0}
          onChange={(event) => setQuestionThree(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Have you ever confessed to a crush?
        <input
            type="radio"
            value="no"
            checked={questionFour === 1}
            onChange={(event) => setQuestionFour(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionFour === 0}
          onChange={(event) => setQuestionFour(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Is money really important to you?
        <input
            type="radio"
            value="no"
            checked={questionFive === 1}
            onChange={(event) => setQuestionFive(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionFive === 0}
          onChange={(event) => setQuestionFive(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Is dining out together quality time?
        <input
            type="radio"
            value="no"
            checked={questionSix === 1}
            onChange={(event) => setQuestionSix(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionSix === 0}
          onChange={(event) => setQuestionSix(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Were you ever friend zoned?
        <input
            type="radio"
            value="no"
            checked={questionSeven === 1}
            onChange={(event) => setQuestionSeven(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionSeven === 0}
          onChange={(event) => setQuestionSeven(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Do you think it’s ok to date a friend’s ex?
        <input
            type="radio"
            value="no"
            checked={questionEight === 1}
            onChange={(event) => setQuestionEight(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionEight === 0}
          onChange={(event) => setQuestionEight(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Is it ok to cry in front of your partner?
        <input
            type="radio"
            value="no"
            checked={questionNine === 1}
            onChange={(event) => setQuestionNine(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionNine === 0}
          onChange={(event) => setQuestionNine(0)}
        /> No 
        </label>

        <br></br>
        <label>
        Are white lies acceptable in a relationship?
        <input
            type="radio"
            value="no"
            checked={questionTen === 1}
            onChange={(event) => setQuestionTen(1)}
        /> Yes
        <input
          type="radio"
          value="no"
          checked={questionTen === 0}
          onChange={(event) => setQuestionTen(0)}
        /> No 
        </label>


        


      <br></br> 
      <button type="submit">Save</button>
      <br></br>
      
      

      
    </form>
  );
};

export default CreateAccount;