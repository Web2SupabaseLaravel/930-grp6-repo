import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

function EventDetailsPage() {
  const { eventId } = useParams();
  const [event, setEvent] = useState(null);
  const [locationName, setLocationName] = useState('');

  useEffect(() => {
    if (!eventId) return;

    async function fetchEvent() {
      try {
        const response = await fetch(`http://localhost:8000/api/events/${eventId}`, {
          headers: {
            'Accept': 'application/json',
          },
        });
        if (!response.ok) throw new Error('Failed to load event');

        const result = await response.json();
        const eventInfo = result.data || result;

        eventInfo.event_img = `http://localhost:8000${eventInfo.event_img}`;
        setEvent(eventInfo);

        if (eventInfo.location?.lat && eventInfo.location?.lng) {
          const name = await getLocationName(eventInfo.location.lat, eventInfo.location.lng);
          setLocationName(name);
        } else {
          setLocationName(eventInfo.location || 'N/A');
        }

      } catch (error) {
        console.error('Failed to load event details:', error);
      }
    }

    fetchEvent();
  }, [eventId]);

  if (!event) return <p className="text-white">Loading event details...</p>;

  return (
    <div className="container my-4 text-white">
      <div className="p-3 rounded border border-secondary" style={{ backgroundColor: '#121317' }}>
        <div className="row mb-3">
          <div className="col-md-5">
            <img src={event.event_img} alt="Event" className="img-fluid rounded" style={{ height: 200, objectFit: 'cover', width: '100%' }} />
          </div>
          <div className="col-md-7">
            <h2>{event.title}</h2>
            <p>{event.description || 'No description provided.'}</p>
          </div>
        </div>

        <div className="row">
          <div className="col-md-4 mb-2">
            <div className="border border-secondary rounded p-3 h-100">
              <strong>Ticket Price:</strong><br />
              {event.ticket_price || 'N/A'}
            </div>
          </div>
          <div className="col-md-4 mb-2">
            <div className="border border-secondary rounded p-3 h-100">
              <strong>Start:</strong><br />
              {event.start_day} {event.start_hour}
            </div>
          </div>
          <div className="col-md-4 mb-2">
            <div className="border border-secondary rounded p-3 h-100">
              <strong>Location:</strong><br />
              {locationName || 'N/A'}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

async function getLocationName(lat, lng) {
  const apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';
  const res = await fetch(
    `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=${apiKey}`
  );
  const data = await res.json();
  if (data.status === 'OK') {
    return data.results[0].formatted_address;
  }
  return 'Unknown location';
}

export default EventDetailsPage;
