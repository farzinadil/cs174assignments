import React, { useState } from 'react';
import { Navigate } from 'react-router-dom';
import axios from 'axios';


// login page with link to create account page
const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [isAuthenticated, setIsAuthenticated] = useState(false);
  
    const handleSubmit = (event) => {
      event.preventDefault();
      axios.post('localhost:8888/auth', {
        username,
        password,
      })
      .then((response) => {
        if (response.data.success) {
          setIsAuthenticated(true);
        }
      })
      .catch((error) => {
        setIsAuthenticated(true);
        console.error(error);
      });
    };
  
    if (isAuthenticated) {
      return <Navigate to="/HomePage"> </Navigate>;
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
        <button type="submit">Login</button>
      </form>
    );
  };
  
  export default Login;