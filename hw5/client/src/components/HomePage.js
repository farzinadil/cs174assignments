import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const HomePage = () => {
  const [suggestedDate, setSuggestedDate] = useState('');

  useEffect(() => {
    axios.get('localhost:8888/match')
      .then((response) => {
        setSuggestedDate(response.data.name);
      })
      .catch((error) => {
        console.error(error);
      });
  }, []);

  return (
    <div>
      <h1>Suggested Date</h1>
      <p>{suggestedDate}</p>
      <Link to="/Login"> <button>Sign Out</button></Link>
    </div>
  );
};

export default HomePage;



