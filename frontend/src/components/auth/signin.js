import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './signin.css'
function Signin() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleSignin = async (e) => {
    e.preventDefault();
    setError('');

    try {
      const response = await fetch('http://localhost:8000/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ 
          email: email.trim(),
          password: password.trim()
        })
      });

      const data = await response.json();

      if (!response.ok) {
        throw new Error(data.message || 'Login failed');
      }

    
      localStorage.setItem('user', JSON.stringify(data.user));
      alert('Login successful!');
      navigate('/');

    } catch (error) {
      setError(error.message);
      console.error('Login error:', error);
    }
  };

  return (
<div className="signin-container">
  <h2 className="signin-title">Sign In</h2>

  {error && <div className="signin-error">{error}</div>}

  <form onSubmit={handleSignin} className="signin-form">
    <div className="input-group">
      <label className="input-label">Email</label>
      <input
        type="email"
        className="input-field"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
        required
        autoComplete="email"
      />
    </div>

    <div className="input-group">
      <label className="input-label">Password</label>
      <input
        type="password"
        className="input-field"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        required
        autoComplete="current-password"
        minLength="6"
      />
    </div>

    <div className="button-group">
      <button
        type="submit"
        onClick={() => navigate('/')}
        className="btn btn-primary"
      >
        Sign In
      </button>
      <button
        type="button"
        onClick={() => navigate('/signup')}
        className="btn btn-secondary"
      >
        Sign Up
      </button>
    </div>
  </form>
</div>

  );
}

export default Signin;