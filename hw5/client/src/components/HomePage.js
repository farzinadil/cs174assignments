import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import Cookies from 'react-cookies';

const HomePage = () => {
  const [suggestedDate, setSuggestedDate] = useState('');
  const username = Cookies.load('username');


  useEffect(() => {
    fetch(`localhost:8888/match?username=${username}`)
      .then((response) => response.json())
      .then((data) => {
        setSuggestedDate(data.name);
      });
  }, []);

  return (
    <div>
      <h1>Suggested Date</h1>
      <p>{suggestedDate ? suggestedDate : "sorry no person left to suggest" }</p>
      <Link to="/Login"> <button>Sign Out</button></Link>
    </div>
  );
};

export default HomePage;



