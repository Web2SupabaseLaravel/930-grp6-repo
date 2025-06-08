import React, { useEffect, useState } from 'react';

const api = 'http://localhost:8000/api/humans'; 

function Humans() {
  const [humans, setHumans] = useState([]);
  const [formData, setFormData] = useState({
    name: '',
    age: '',
    email: '',
    location: '',
    creditcard: '',
    password: '',
  });
  const [editId, setEditId] = useState(null);
  const [formTitle, setFormTitle] = useState('Add Human');

  useEffect(() => {
    fetchHumans();
  }, []);

  async function fetchHumans() {
    const res = await fetch(api);
    const json = await res.json();
    setHumans(json.data || []);
  }

  function resetForm() {
    setFormData({
      name: '',
      age: '',
      email: '',
      location: '',
      creditcard: '',
      password: '',
    });
    setEditId(null);
    setFormTitle('Add Human');
  }

  function handleEdit(human) {
    setFormData({
      name: human.name,
      age: human.age,
      email: human.email,
      location: human.location || '',
      creditcard: human.creditcard || '',
      password: '',
    });
    setEditId(human.human_id);
    setFormTitle('Edit Human');
  }

  async function handleDelete(id) {
    if (window.confirm('Delete this human?')) {
      await fetch(`${api}/${id}`, { method: 'DELETE' });
      fetchHumans();
      if (editId === id) resetForm();
    }
  }

  async function handleSubmit(e) {
    e.preventDefault();
    const method = editId ? 'PUT' : 'POST';
    const url = editId ? `${api}/${editId}` : api;

    // بناء البيانات مع حذف password إذا فارغ
    const body = { ...formData };
    if (!body.password) delete body.password;

    const res = await fetch(url, {
      method,
      headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
      body: JSON.stringify(body),
    });

    if (res.ok) {
      resetForm();
      fetchHumans();
    } else {
      const err = await res.json();
      alert(err.message || 'Error');
    }
  }

  function handleChange(e) {
    setFormData((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  }

  return (
    <div>
      <h1>Humans</h1>
      <ul>
        {humans.map((h) => (
          <li key={h.human_id}>
            {h.name} ({h.age}) - {h.email}{' '}
            <button onClick={() => handleEdit(h)}>Edit</button>{' '}
            <button onClick={() => handleDelete(h.human_id)}>Delete</button>
          </li>
        ))}
      </ul>

      <h2>{formTitle}</h2>
      <form onSubmit={handleSubmit}>
        <input
          name="name"
          placeholder="Name"
          value={formData.name}
          onChange={handleChange}
          required
        />
        <input
          name="age"
          type="number"
          placeholder="Age"
          value={formData.age}
          onChange={handleChange}
          required
        />
        <input
          name="email"
          type="email"
          placeholder="Email"
          value={formData.email}
          onChange={handleChange}
          required
        />
        <input
          name="location"
          placeholder="Location"
          value={formData.location}
          onChange={handleChange}
        />
        <input
          name="creditcard"
          placeholder="Credit Card"
          value={formData.creditcard}
          onChange={handleChange}
        />
        <input
          name="password"
          type="password"
          placeholder="Password"
          value={formData.password}
          onChange={handleChange}
        />
        <button type="submit">Save</button>{' '}
        <button type="button" onClick={resetForm}>
          Cancel
        </button>
      </form>
    </div>
  );
}

export default Humans;
