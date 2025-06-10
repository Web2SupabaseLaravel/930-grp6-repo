import React, { useState, useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import { UserContext } from '../../context/UserContext';

function LoginForm() {
  const { login } = useContext(UserContext);
  const navigate = useNavigate();

  const [name, setName] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  async function handleSubmit(e) {
    e.preventDefault();
    setError('');

    try {
      const res = await fetch('http://127.0.0.1:8000/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, password }),
      });

      if (!res.ok) {
        const errData = await res.json();
        setError(errData.message || 'Login failed');
        return;
      }

      const data = await res.json();

      login(data);

      switch (data.role) {
        case 'admin':
          navigate('/admins');
          break;
        case 'organizer':
          navigate('/organizers');
          break;
        case 'attendee':
          navigate('/attendees');
          break;
        default:
          navigate('/');
      }
    } catch (err) {
      setError('Network error');
      console.error(err);
    }
  }

  return (
    <form onSubmit={handleSubmit}>
      <h2>Login</h2>
      {error && <p style={{ color: 'red' }}>{error}</p>}

      <label>
        Name:
        <input
          type="text"
          value={name}
          onChange={e => setName(e.target.value)}
          required
        />
      </label>

      <br />

      <label>
        Password:
        <input
          type="password"
          value={password}
          onChange={e => setPassword(e.target.value)}
          required
        />
      </label>

      <br />

      <button type="submit">Login</button>
    </form>
  );
}

export default LoginForm;
