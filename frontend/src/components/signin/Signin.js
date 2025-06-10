import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function Signin() {
  const [formData, setFormData] = useState({
    email: '',
    password: '',
  });
  const navigate = useNavigate();

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch('http://localhost:8000/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      });

      if (response.ok) {
        const data = await response.json();
        localStorage.setItem('token', data.token);
        navigate('/dashboard');
      } else {
        const error = await response.json();
        alert(error.message || 'Failed to sign in');
      }
    } catch (error) {
      alert('Network error: ' + error.message);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-dark-navy">
      <div className="bg-card-bg p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 className="text-2xl font-bold text-accent-purple mb-6 text-center">Sign In</h2>
        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <label className="block text-gray-400 mb-2">Email</label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              className="w-full bg-dark-navy text-white p-2 rounded border border-gray-700 focus:border-accent-purple focus:outline-none"
              required
            />
          </div>
          <div>
            <label className="block text-gray-400 mb-2">Password</label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              className="w-full bg-dark-navy text-white p-2 rounded border border-gray-700 focus:border-accent-purple focus:outline-none"
              required
            />
          </div>
          <button
            type="submit"
            className="w-full bg-accent-purple text-white py-2 rounded hover:bg-accent-purple/80 transition"
          >
            Sign In
          </button>
        </form>
        <p className="mt-4 text-center text-gray-400">
          Don't have an account?{' '}
          <button
            onClick={() => navigate('/signup')}
            className="text-accent-purple hover:underline"
          >
            Sign Up
          </button>
        </p>
      </div>
    </div>
  );
}

export default Signin; 