import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

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

      // تخزين بيانات المستخدم في localStorage
      localStorage.setItem('user', JSON.stringify(data.user));
      alert('Login successful!');
      navigate('/dashboard'); // توجيه المستخدم بعد تسجيل الدخول

    } catch (error) {
      setError(error.message);
      console.error('Login error:', error);
    }
  };

  return (
    <div className="w-[40vw] max-w-full mx-auto p-6 border border-gray-600 rounded-[20px] min-h-[50vh] flex flex-col justify-between">
      <h2 className="text-2xl font-bold mb-4">Sign In</h2>
      {error && <div className="text-red-500 mb-4">{error}</div>}
      <form onSubmit={handleSignin} className="space-y-4">
        <div>
          <label className="block mb-1">Email</label>
          <input
            type="email"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
            autoComplete="email"
          />
        </div>
        <div>
          <label className="block mb-1">Password</label>
          <input
            type="password"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
            autoComplete="current-password"
            minLength="6"
          />
        </div>
        <div className="flex space-x-4">
          <button
            type="submit"
            className="flex-1 bg-accent-purple py-2 rounded hover:bg-accent-purple/80 transition-colors"
          >
            Sign In
          </button>
          <button
            type="button"
            className="flex-1 bg-gray-600 py-2 rounded hover:bg-gray-700 transition-colors"
            onClick={() => navigate('/signup')}
          >
            Sign Up
          </button>
        </div>
      </form>
    </div>
  );
}

export default Signin;