import React, { useEffect, useState } from 'react';
import { Pencil, Trash } from 'lucide-react';

const TicketInventory = () => {
  const [tickets, setTickets] = useState([]);

  const dummyTickets = [
    {
      id: 1,
      type: "VIP",
      price: 150.00,
      quantity: 100,
      sold: 75,
      start_date: "2025-06-01",
      end_date: "2025-06-10",
    },
    {
      id: 2,
      type: "General Admission",
      price: 50.00,
      quantity: 300,
      sold: 220,
      start_date: "2025-06-01",
      end_date: "2025-06-10",
    },
    {
      id: 3,
      type: "Student",
      price: 25.00,
      quantity: 150,
      sold: 50,
      start_date: "2025-06-01",
      end_date: "2025-06-10",
    },
  ];

  useEffect(() => {
    fetch('http://localhost:8000/api/ticket')
      .then(res => res.json())
      .then(data => {
        if (data && data.data) {
          setTickets(data.data);
        } else {
          setTickets(dummyTickets);
        }
      })
      .catch(err => {
        console.error('Error fetching tickets:', err);
        setTickets(dummyTickets);
      });
  }, []);

  const handleDelete = async (id) => {
    if (!window.confirm('Are you sure you want to delete this ticket?')) return;

    try {
      await fetch(`http://localhost:8000/api/tickets/${id}`, { method: 'DELETE' });
      setTickets(prev => prev.filter(ticket => ticket.id !== id));
    } catch (err) {
      alert('Error deleting ticket.');
    }
  };

  const handleEdit = (id) => {
    console.log('Edit ticket with ID:', id);
  };

  return (
<div className="p-4 text-white">
  <h2 className="text-xl font-semibold mb-4 text-accent-purple">Ticket Inventory</h2>

  <div className="w-full overflow-x-auto rounded-lg border border-gray-700">
    <table className="min-w-[700px] w-full text-sm">
      <thead className="bg-dark-navy text-accent-purple">
        <tr>
          <th className="p-3 text-left border-b border-gray-700">Type</th>
          <th className="p-3 text-left border-b border-gray-700">Price</th>
          <th className="p-3 text-left border-b border-gray-700">Quantity</th>
          <th className="p-3 text-left border-b border-gray-700">Sold</th>
          <th className="p-3 text-left border-b border-gray-700">Remaining</th>
          <th className="p-3 text-left border-b border-gray-700">Start Date</th>
          <th className="p-3 text-left border-b border-gray-700">End Date</th>
          <th className="p-3 text-center border-b border-gray-700">Actions</th>
        </tr>
      </thead>
      <tbody>
        {tickets.map(ticket => (
          <tr key={ticket.id} className="hover:bg-card-bg transition-colors border-t border-gray-700">
            <td className="p-3">{ticket.type}</td>
            <td className="p-3">${ticket.price}</td>
            <td className="p-3">{ticket.quantity}</td>
            <td className="p-3">{ticket.sold}</td>
            <td className="p-3">{ticket.quantity - ticket.sold}</td>
            <td className="p-3">{ticket.start_date}</td>
            <td className="p-3">{ticket.end_date}</td>
            <td className="p-3 flex items-center justify-center space-x-2">
              <button
                onClick={() => handleEdit(ticket.id)}
                className="p-1 rounded hover:bg-accent-purple/20 text-green-400"
                title="Edit"
              >
                <Pencil size={16} />
              </button>
              <button
                onClick={() => handleDelete(ticket.id)}
                className="p-1 rounded hover:bg-accent-purple/20 text-red-400"
                title="Delete"
              >
                <Trash size={16} />
              </button>
            </td>
          </tr>
        ))}
        {tickets.length === 0 && (
          <tr>
            <td colSpan="8" className="p-4 text-center text-gray-400">
              No tickets found.
            </td>
          </tr>
        )}
      </tbody>
    </table>
  </div>
</div>

  );
};

export default TicketInventory;
