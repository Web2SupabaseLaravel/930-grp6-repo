import React, { useState, useEffect } from 'react';
import { useNavigate, useLocation } from 'react-router-dom';
import './CreateEvent.css';

const initialFormData = {
  title: '', type: '', organizer: '', category: '', description: '',
  event_img: '', start_day: '', end_day: '',
  start_hour: '', end_hour: '', location: '',
};

function CreateEvent() {
  const apiBase = 'http://localhost:8000/api/events';
  const navigate = useNavigate();
  const location = useLocation();
  const [formData, setFormData] = useState(initialFormData);
  const [editId, setEditId] = useState(null);

  useEffect(() => {
    const params = new URLSearchParams(location.search);
    const id = params.get('id');
    if (id) {
      setEditId(id);
      fetchEvent(id);
    }
  }, [location.search]);

  const fetchEvent = async (id) => {
    try {
      const res = await fetch(`${apiBase}/${id}`);
      const data = await res.json();
      const event = data.data;
      setFormData({
        title: event.title || '', type: event.type || '', organizer: event.organizer || '',
        category: event.category || '', description: event.description || '',
        event_img: event.event_img || '', start_day: event.start_day || '',
        end_day: event.end_day || '', start_hour: event.start_hour || '',
        end_hour: event.end_hour || '', location: event.location || '',
      });
    } catch (err) {
      console.error(err);
    }
  };

  const handleChange = (e) => {
    const { name, value, files } = e.target;
    if (name === 'event_img') {
      setFormData((prev) => ({ ...prev, [name]: files[0] }));
    } else {
      setFormData((prev) => ({ ...prev, [name]: value }));
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const form = new FormData();
    form.append('title', formData.title);
    form.append('type', formData.type);
    form.append('organizer', formData.organizer);
    form.append('category', formData.category);
    form.append('description', formData.description);
    form.append('start_day', formData.start_day);
    form.append('end_day', formData.end_day);
    form.append('start_hour', formData.start_hour);
    form.append('end_hour', formData.end_hour);
    form.append('location', formData.location);

    if (formData.event_img) {
      form.append('event_img', formData.event_img);
    }

    try {
      const res = await fetch(editId ? `${apiBase}/${editId}` : apiBase, {
        method: editId ? 'PUT' : 'POST',
        body: form,
      });

      if (!res.ok) {
        const err = await res.json();
        alert(JSON.stringify(err.errors || err.message || 'Error saving event'));
      } else {
        navigate('/events');
      }
    } catch (err) {
      alert('Network error: ' + err.message);
    }
  };

  return (
    <form className="container-fluid mt-4" onSubmit={handleSubmit}>
      <div className="mb-3">
        <input id="file-upload" type="file" name="event_img" onChange={handleChange} className="d-none" />
        <label htmlFor="file-upload" className="w-100 bg-dark text-white text-center d-flex align-items-center justify-content-center rounded cursor-pointer" style={{ height: '20rem', border: '1px solid #fff' }}>
          + Add event photo
        </label>
      </div>

      <div className="row mb-3">
        <div className="col-12 col-md-6 mb-2">
          <input name="title" value={formData.title} onChange={handleChange} placeholder="Title" className="form-control a placeholder-white" />
        </div>
        <div className="col-12 col-md-6 mb-2">
          <input name="organizer" value={formData.organizer} onChange={handleChange} placeholder="Organizer" className="form-control a placeholder-white" />
        </div>
      </div>

      <div className="row mb-3">
        <div className="col-12 col-md-6 mb-2">
          <input name="type" value={formData.type} onChange={handleChange} placeholder="Type" className="form-control a placeholder-white" />
        </div>
        <div className="col-12 col-md-6 mb-2">
          <input name="category" value={formData.category} onChange={handleChange} placeholder="Category" className="form-control a placeholder-white" />
        </div>
      </div>

      <div className="row mb-3">
        <div className="col-6 col-md-3 mb-2">
          <input type="date" name="start_day" value={formData.start_day} onChange={handleChange} className="form-control a" style={{ color: '#ffffff' }} />
        </div>
        <div className="col-6 col-md-3 mb-2">
          <input name="start_hour" value={formData.start_hour} onChange={handleChange} placeholder="Start Time" className="form-control a placeholder-white" />
        </div>
        <div className="col-6 col-md-3 mb-2">
          <input type="date" name="end_day" value={formData.end_day} onChange={handleChange} className="form-control a" style={{ color: '#ffffff' }} />
        </div>
        <div className="col-6 col-md-3 mb-2">
          <input name="end_hour" value={formData.end_hour} onChange={handleChange} placeholder="End Time" className="form-control a placeholder-white" />
        </div>
      </div>

      <div className="mb-3">
        <textarea name="description" value={formData.description} onChange={handleChange} placeholder="Description" rows={4} className="form-control a placeholder-white" />
      </div>

      <div className="mb-3">
        <input name="location" value={formData.location} onChange={handleChange} placeholder="Location (e.g. Nablus)" className="form-control a placeholder-white" />
      </div>

      <div className="mb-3">
        <button type="submit" className="btn btn-primary w-100">{editId ? 'Update' : 'Create'}</button>
      </div>
    </form>
  );
}

export default CreateEvent;