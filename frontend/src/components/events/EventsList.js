import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

function EventsList() {
  const apiBase = 'http://localhost:8000/api/events';
  const [events, setEvents] = useState([]);
  const navigate = useNavigate();

  const loadEvents = async () => {
    try {
      const res = await fetch(apiBase);
      if (!res.ok) throw new Error('Failed to load events');
      const data = await res.json();
      setEvents(data.data || []);
    } catch (err) {
      console.error(err);
    }
  };

  const deleteEvent = async (id) => {
    if (!window.confirm('Delete this event?')) return;
    try {
      await fetch(`${apiBase}/${id}`, { method: 'DELETE' });
      loadEvents();
    } catch (err) {
      alert('Failed to delete event: ' + err.message);
    }
  };

  useEffect(() => {
    loadEvents();
  }, []);

  return (
    <div className="p-4 text-white">
      <div className="flex justify-between items-center mb-6">
        <h2 className="text-xl font-bold text-accent-purple">Events List</h2>
        <button
          onClick={() => navigate('/events/create')}
          className="bg-accent-purple text-white px-4 py-2 rounded hover:bg-accent-purple/80 transition"
        >
          + Add Event
        </button>
      </div>

      <div className="space-y-4">
        {events.length > 0 ? (
          events.map((event) => (
            <div key={event.event_id} className="bg-card-bg border border-gray-700 rounded-lg p-4 shadow hover:shadow-lg transition">
              <div className="flex justify-between items-center">
                <div>
                  <h3 className="text-lg font-semibold text-accent-purple">{event.title}</h3>
                  <p className="text-gray-400 text-sm">{event.category}</p>
                </div>

                <div className="space-x-2">
                  <button
                    onClick={() => navigate(`/eventdetails/${event.event_id}`)}  // ✅ الصحيح
                      className="text-sm px-3 py-1 rounded bg-green-600 hover:bg-green-500 transition"
                                                                                                   >
                        Event Details
                  </button>
                  <button
                    onClick={() => navigate(`/events/create?id=${event.event_id}`)}
                    className="text-sm px-3 py-1 rounded bg-blue-600 hover:bg-blue-500 transition"
                  >
                    Edit
                  </button>
                  <button
                    onClick={() => deleteEvent(event.event_id)}
                    className="text-sm px-3 py-1 rounded bg-red-600 hover:bg-red-500 transition"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          ))
        ) : (
          <p className="text-gray-400">No events found.</p>
        )}
      </div>
    </div>
  );
}

export default EventsList;
