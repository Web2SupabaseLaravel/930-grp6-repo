import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Admin = () => {
  const [admins, setAdmins] = useState([]);
  const [newAdmin, setNewAdmin] = useState({ name: '', email: '', password: '' });

  useEffect(() => {
    fetchAdmins();
  }, []);

  const fetchAdmins = async () => {
    try {
      const res = await axios.get('http://127.0.0.1:8000/api/admin');
      setAdmins(res.data);
    } catch (err) {
      console.error('Error fetching admins:', err);
    }
  };

  const handleChange = (e, index) => {
    const { name, value } = e.target;
    const updated = [...admins];
    updated[index][name] = value;
    setAdmins(updated);
  };

  const handleNewChange = (e) => {
    const { name, value } = e.target;
    setNewAdmin({ ...newAdmin, [name]: value });
  };

  const handleUpdate = async (id, data) => {
    try {
      await axios.put(`http://127.0.0.1:8000/api/admin/${id}`, data);
      fetchAdmins();
    } catch (err) {
      console.error('Update failed', err);
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/admin/${id}`);
      fetchAdmins();
    } catch (err) {
      console.error('Delete failed', err);
    }
  };

  const handleAdd = async () => {
    try {
      await axios.post(`http://127.0.0.1:8000/api/admin`, newAdmin);
      setNewAdmin({ name: '', email: '', password: '' });
      fetchAdmins();
    } catch (err) {
      console.error('Add failed', err);
    }
  };

  return (
    <div className="container py-4 text-white">
      <h2>Manage Admins</h2>

      <div className="d-flex gap-2 mb-3">
        <input type="text" placeholder="Admin Name" name="name" value={newAdmin.name} onChange={handleNewChange} className="form-control" />
        <input type="email" placeholder="Email" name="email" value={newAdmin.email} onChange={handleNewChange} className="form-control" />
        <input type="password" placeholder="Password" name="password" value={newAdmin.password} onChange={handleNewChange} className="form-control" />
        <button className="btn btn-purple text-white" onClick={handleAdd}>Add Admin</button>
      </div>

      <table className="table table-dark table-bordered">
        <thead>
          <tr>
            <th>Admin Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {admins.map((admin, index) => (
            <tr key={admin.admin_id}>
              <td><input type="text" name="name" value={admin.name} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td><input type="email" name="email" value={admin.email || ''} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td>
                <button className="btn btn-success me-2" onClick={() => handleUpdate(admin.admin_id, admin)}>Update</button>
                <button className="btn btn-danger" onClick={() => handleDelete(admin.admin_id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default Admin;
