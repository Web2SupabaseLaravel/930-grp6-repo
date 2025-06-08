import React, { useEffect, useState } from 'react';

function Attendees() {
  const [attendees, setAttendees] = useState([]);
  const [formData, setFormData] = useState({ human_id: '' });

  const fetchAttendees = async () => {
    const res = await fetch('/api/attendees');
    const data = await res.json();
    setAttendees(data);
  };

  useEffect(() => {
    fetchAttendees();
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await fetch('/api/attendees', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData),
    });
    setFormData({ human_id: '' });
    fetchAttendees();
  };

  return (
    <div>
      <h2>Attendees</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="number"
          placeholder="Human ID"
          value={formData.human_id}
          onChange={(e) => setFormData({ human_id: e.target.value })}
        />
        <button type="submit">Add Attendee</button>
      </form>

      <ul>
        {attendees.map(attendee => (
          <li key={attendee.attendee_id}>
            Attendee ID: {attendee.attendee_id} (Human: {attendee.human_id})
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Attendees;
