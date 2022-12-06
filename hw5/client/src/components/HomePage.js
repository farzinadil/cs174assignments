import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const HomePage = () => {
  const [suggestedDate, setSuggestedDate] = useState('');

  useEffect(() => {
    fetch('localhost:8888/match')
      .then((response) => response.json())
      .then((data) => {
        suggestedDate(data.name);
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



