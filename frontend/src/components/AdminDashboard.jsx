import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const AdminDashboard = () => {
  const navigate = useNavigate();

  const [dashboards, setDashboards] = useState([]);
  const [admins, setAdmins] = useState([]);
  const [newDashboard, setNewDashboard] = useState({
    dashboard: '',
    event_registrations: '',
    revenue: '',
    attendee_demographics: '',
    admin_id: ''
  });

  useEffect(() => {
    fetchDashboards();
    fetchAdmins();
  }, []);

  const fetchDashboards = async () => {
    try {
      const res = await axios.get('http://127.0.0.1:8000/api/admin_dashboards');
      setDashboards(res.data);
    } catch (err) {
      console.error('Error fetching dashboards:', err);
    }
  };

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
    const updated = [...dashboards];
    updated[index][name] = value;
    setDashboards(updated);
  };

  const handleAdminSelect = (e, index) => {
    const selectedAdmin = admins.find(admin => admin.name === e.target.value);
    const updated = [...dashboards];
    updated[index].admin_id = selectedAdmin ? selectedAdmin.admin_id : '';
    setDashboards(updated);
  };

  const handleNewChange = (e) => {
    const { name, value } = e.target;
    setNewDashboard({ ...newDashboard, [name]: value });
  };

  const handleNewAdminSelect = (e) => {
    const selectedAdmin = admins.find(admin => admin.name === e.target.value);
    setNewDashboard({ ...newDashboard, admin_id: selectedAdmin ? selectedAdmin.admin_id : '' });
  };

  const handleUpdate = async (id, data) => {
    try {
      await axios.put(`http://127.0.0.1:8000/api/admin_dashboards/${id}`, data);
      fetchDashboards();
    } catch (err) {
      console.error('Update failed', err);
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/admin_dashboards/${id}`);
      fetchDashboards();
    } catch (err) {
      console.error('Delete failed', err);
    }
  };

  const handleAdd = async () => {
    try {
      await axios.post(`http://127.0.0.1:8000/api/admin_dashboards`, newDashboard);
      setNewDashboard({
        dashboard: '',
        event_registrations: '',
        revenue: '',
        attendee_demographics: '',
        admin_id: ''
      });
      fetchDashboards();
    } catch (err) {
      console.error('Add failed', err);
    }
  };

  return (
    <div className="container py-4 text-white">
      <div className="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Dashboards</h2>
        <button className="btn btn-purple" onClick={() => navigate('/admin')}>
          Add Admin
        </button>
      </div>

      <div className="d-flex gap-2 mb-3">
        <input type="text" placeholder="Dashboard" name="dashboard" value={newDashboard.dashboard} onChange={handleNewChange} className="form-control" />
        <input type="text" placeholder="Event Registrations" name="event_registrations" value={newDashboard.event_registrations} onChange={handleNewChange} className="form-control" />
        <input type="text" placeholder="Revenue" name="revenue" value={newDashboard.revenue} onChange={handleNewChange} className="form-control" />
        <input type="text" placeholder="Demographics" name="attendee_demographics" value={newDashboard.attendee_demographics} onChange={handleNewChange} className="form-control" />
        <select className="form-control" value={admins.find(a => a.admin_id === parseInt(newDashboard.admin_id))?.name || ''} onChange={handleNewAdminSelect}>
          <option value="">Select Admin</option>
          {admins.map(admin => (
            <option key={admin.admin_id} value={admin.name}>{admin.name}</option>
          ))}
        </select>
        <button className="btn btn-purple" onClick={handleAdd}>Add Dashboard</button>
      </div>

      <table className="table table-dark table-bordered">
        <thead>
          <tr>
            <th>Dashboard</th>
            <th>Event Reg</th>
            <th>Revenue</th>
            <th>Demographics</th>
            <th>Admin</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {dashboards.map((item, index) => (
            <tr key={item.id}>
              <td><input type="text" name="dashboard" value={item.dashboard} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td><input type="text" name="event_registrations" value={item.event_registrations} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td><input type="text" name="revenue" value={item.revenue} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td><input type="text" name="attendee_demographics" value={item.attendee_demographics} onChange={(e) => handleChange(e, index)} className="form-control" /></td>
              <td>
                <select className="form-control" value={admins.find(a => a.admin_id === parseInt(item.admin_id))?.name || ''} onChange={(e) => handleAdminSelect(e, index)}>
                  <option value="">Select Admin</option>
                  {admins.map(admin => (
                    <option key={admin.admin_id} value={admin.name}>{admin.name}</option>
                  ))}
                </select>
              </td>
              <td>
                <button className="btn btn-success me-2" onClick={() => handleUpdate(item.id, item)}>Update</button>
                <button className="btn btn-danger" onClick={() => handleDelete(item.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default AdminDashboard;
