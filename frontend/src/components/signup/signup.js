import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function Signup() {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    name: '',
    email: '',
    age:'',
    password: '',
    password_confirmation: ''
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSignup = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch('http://localhost:8000/api/human', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify(form)
      });

      const data = await response.json();

      if (response.ok) {
        alert('Signup successful');
        // Redirect or save token here
      } else {
        alert(data.message || 'Signup failed');
      }

    } catch (error) {
      alert('An error occurred during signup');
    }
  };

  return (
    <div className="w-[40vw] max-w-full mx-auto p-6 border border-gray-600 rounded-[20px] min-h-[50vh] flex flex-col justify-between">
      <h2 className="text-2xl font-bold mb-4">Sign Up</h2>
      <form onSubmit={handleSignup} className="space-y-4">
        <div>
          <label>Name</label>
          <input
            type="text"
            name="name"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={form.name}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Email</label>
          <input
            type="email"
            name="email"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={form.email}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Password</label>
          <input
            type="password"
            name="password"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={form.password}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Confirm Password</label>
          <input
            type="password"
            name="password_confirmation"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={form.password_confirmation}
            onChange={handleChange}
            required
          />
        </div>
         <div>
          <label>Age</label>
          <input
            type="number"
            name="age"
            className="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value={form.age}
            onChange={handleChange}
            required
          />
        </div>
        <button
          type="submit"
          onClick={() => navigate('/signin')}
          className="w-full bg-accent-purple py-2 rounded hover:bg-accent-purple/80"
        >
          Sign Up
        </button>
      </form>
    </div>
  );
}

export default Signup;
