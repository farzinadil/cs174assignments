import React from 'react'
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import Login from './components/Login'
import CreateAccount from './components/CreateAccount'
import HomePage from './components/HomePage'

const App = () => {
  return (
    <Router>
      <Routes>
        <Route path='/' exact element={<Login />} />
        <Route path='/CreateAccount' element={<CreateAccount />} />
        <Route path='/HomePage' element={<HomePage />} />
      </Routes>
    </Router>
  )
}

export default App
