import React, { useState, useEffect } from 'react';
import { useNavigate, useLocation } from 'react-router-dom';
import "./CreateEvent.css";
import { MapContainer, TileLayer, Marker, useMapEvents } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl:
    'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon-2x.png',
  iconUrl:
    'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
  shadowUrl:
    'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
});
function DraggableMarker({ position, onChangePosition }) {
  const [draggable, setDraggable] = useState(true);
  const [pos, setPos] = useState(position);

  const eventHandlers = {
    dragend(e) {
      const marker = e.target;
      const newPos = marker.getLatLng();
      setPos(newPos);
      onChangePosition(newPos);
    },
  };

  return (
    <Marker
      draggable={draggable}
      eventHandlers={eventHandlers}
      position={pos}
    ></Marker>
  );
}
const initialFormData = {
  title: '', type: '',organizer:'', category: '', description: '',
  event_img: '', revenue: '', start_day: '', end_day: '',
  start_hour: '', end_hour: '', location: '',point_of_sales:'',
      revenueLocation: {  lat: 32.2211, lng: 35.2544  },
    posLocation: { lat: 32.2211, lng: 35.2544 },
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
      if (!res.ok) throw new Error('Failed to fetch event');
      const data = await res.json();
      const event = data.data;
      setFormData({
        title: event.title || '',
        type: event.type || '',
        organizer:event.organizer||'',
        category: event.category || '',
        description: event.description || '',
        event_img: event.event_img || '',
        revenue: event.revenue?.toString() || '',
        start_day: event.start_day || '',
        end_day: event.end_day || '',
        start_hour: event.start_hour || '',
        end_hour: event.end_hour || '',
        location: event.location || '',
        point_of_sales: '',
      });
    } catch (err) {
      console.error(err);
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const payload = {
      ...formData,
      revenue: formData.revenue ? parseFloat(formData.revenue) : null,
    };

    try {
      const res = await fetch(editId ? `${apiBase}/${editId}` : apiBase, {
        method: editId ? 'PUT' : 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
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
    <label
      htmlFor="file-upload"
      className="w-100 bg-dark text-white text-center d-flex align-items-center justify-content-center rounded cursor-pointer"
      style={{ height: '20rem', border: '1px solid #fff' }}
    >
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

  <div className="row mb-3">
    <div className="col-12 col-md-6 mb-2">
      <input name="revenue" value={formData.revenue} onChange={handleChange} placeholder="Revenue" className="form-control a placeholder-white" />
    </div>
    <div className="col-12 col-md-6 mb-2">
      <input name="point_of_sales" value={formData.point_of_sales} onChange={handleChange} placeholder="Point of Sales" className="form-control a placeholder-white" />
    </div>
  </div>

  <div className="row mb-3">
    <div className="col-12 col-lg-6 mb-3">
      <div className="bg-secondary a" style={{ height: '250px', borderRadius: '8px', width: '100%' }}>
        <MapContainer center={formData.revenueLocation} zoom={13} style={{ height: '100%', width: '100%' }}>
          <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
          <DraggableMarker position={formData.revenueLocation} onChangePosition={(pos) => setFormData((prev) => ({ ...prev, revenueLocation: pos }))} />
        </MapContainer>
      </div>
    </div>

    <div className="col-12 col-lg-6 mb-3">
      <div className="bg-secondary a" style={{ height: '250px', borderRadius: '8px', width: '100%' }}>
        <MapContainer center={formData.posLocation} zoom={13} style={{ height: '100%', width: '100%' }}>
          <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
          <DraggableMarker position={formData.posLocation} onChangePosition={(pos) => setFormData((prev) => ({ ...prev, posLocation: pos }))} />
        </MapContainer>
      </div>
    </div>
  </div>
</form>
);
}

export default CreateEvent;
