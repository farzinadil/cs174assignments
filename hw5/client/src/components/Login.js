import React from "react";
import { Link } from 'react-router-dom'
import CreateAccount from "./CreateAccount";
import HomePage from "./HomePage";

// login page with link to create account page
const Login = () => {
    return (
        <div>
        <h1>Login Page</h1>
        <Link to = '/HomePage'>Homepage</Link>
        <br></br>
        <Link to = '/CreateAccount'>Create Account</Link>
        </div>
        
    );
};


export default Login;