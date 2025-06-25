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

  <div className=" p-3 rounded border border-secondary" style={{ backgroundColor: ' #121317', color: 'white' }}>

    <div className=" rounded p-3 mb-3">

      <div className="row mb-3">
        <div className="col-md-5 mb-3 mb-md-0">
          <img
            src={event.event_img}
            alt="Event"
            className="img-fluid rounded"
            style={{ height: 200, objectFit: 'cover', width: '100%' }}
          />
        </div>
        <div className="col-md-7">
          <h2>{event.title}</h2>
          <p style={{ maxWidth: '100%' }}>
            {event.description || 'No description provided.'}
          </p>
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

    <div className="row mb-3">
      <div className="col-md-6 mb-2">
        <div className="border border-secondary rounded p-3 text-center h-100">
          <h5>Revenue</h5>
          <p>{event.revenue || 0} USD</p>
        </div>
      </div>
      <div className="col-md-6 mb-2">
        <div className="border border-secondary rounded p-3 text-center h-100">
          <h5>Tickets Left</h5>
          <p>{event.tickets_left || 0}</p>
        </div>
      </div>
    </div>
  </div>
<div className="mt-4 p-4  text-white rounded ">
  <h5 className="mb-4">Recent Sales</h5>

  <div className="overflow-x-auto">
    <table className="min-w-full text-sm text-left">
      <thead>
        <tr style={{ backgroundColor: '#121317', color: 'white' }}>
          <th className="py-3 px-4">Order ID</th>
          <th className="py-3 px-4">Customer Name</th>
          <th className="py-3 px-4">Date</th>
          <th className="py-3 px-4">Quantity</th>
          <th className="py-3 px-4">Refund</th>
        </tr>
      </thead>
      <tbody className="text-white">
        <tr>
          <td colSpan="5" className="pt-3">
            <div className="border border-secondary rounded p-3 flex justify-between items-center gap-4 bg-[#121317]">
              <span className="w-1/5">#11223344</span>
              <span className="w-1/5">Lorelai Gilmore</span>
              <span className="w-1/5">31/08/2024 07:00 AM</span>
              <span className="w-1/5 font-semibold">4 Pcs</span>
              <span className="w-1/5 text-red-400">No</span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
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
