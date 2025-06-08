import React, { useEffect, useState } from 'react';

function Organizers() {
  const [organizers, setOrganizers] = useState([]);
  const [formData, setFormData] = useState({ human_id: '' });

  const fetchOrganizers = async () => {
    const res = await fetch('/api/organizers');
    const data = await res.json();
    setOrganizers(data);
  };

  useEffect(() => {
    fetchOrganizers();
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await fetch('/api/organizers', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData),
    });
    setFormData({ human_id: '' });
    fetchOrganizers();
  };

  return (
    <div>
      <h2>Organizers</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="number"
          placeholder="Human ID"
          value={formData.human_id}
          onChange={(e) => setFormData({ human_id: e.target.value })}
        />
        <button type="submit">Add Organizer</button>
      </form>

      <ul>
        {organizers.map(organizer => (
          <li key={organizer.organizer_id}>
            Organizer ID: {organizer.organizer_id} (Human: {organizer.human_id})
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Organizers;
