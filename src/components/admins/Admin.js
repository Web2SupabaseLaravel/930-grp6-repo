import React, { useEffect, useState } from 'react';

function Admins() {
  const [admins, setAdmins] = useState([]);
  const [formData, setFormData] = useState({ human_id: '' });

  const fetchAdmins = async () => {
    const res = await fetch('/api/admins');
    const data = await res.json();
    setAdmins(data);
  };

  useEffect(() => {
    fetchAdmins();
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await fetch('/api/admins', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData),
    });
    setFormData({ human_id: '' });
    fetchAdmins();
  };

  return (
    <div>
      <h2>Admins</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="number"
          placeholder="Human ID"
          value={formData.human_id}
          onChange={(e) => setFormData({ human_id: e.target.value })}
        />
        <button type="submit">Add Admin</button>
      </form>

      <ul>
        {admins.map(admin => (
          <li key={admin.admin_id}>Admin ID: {admin.admin_id} (Human: {admin.human_id})</li>
        ))}
      </ul>
    </div>
  );
}

export default Admins;
