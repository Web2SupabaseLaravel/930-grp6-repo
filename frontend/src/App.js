import React from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';

import Layout from './components/Layout';

// Create a dark theme
const darkTheme = createTheme({
  palette: {
    mode: 'dark',
    primary: {
      main: '#8B5CF6',
    },
    background: {
      default: '#1a1a1a',
      paper: '#1a1a1a',
    },
  },
});

// Placeholder components with more detailed content
const Dashboard = () => (
  <div className="bg-card-bg rounded-lg p-6">
    <h1 className="text-2xl font-bold text-white mb-4">Dashboard</h1>
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div className="bg-dark-navy p-4 rounded-lg">
        <h2 className="text-accent-purple font-semibold mb-2">Total Tickets</h2>
        <p className="text-2xl text-white">150</p>
      </div>
      <div className="bg-dark-navy p-4 rounded-lg">
        <h2 className="text-accent-purple font-semibold mb-2">Active Events</h2>
        <p className="text-2xl text-white">12</p>
      </div>
      <div className="bg-dark-navy p-4 rounded-lg">
        <h2 className="text-accent-purple font-semibold mb-2">Total Revenue</h2>
        <p className="text-2xl text-white">$15,000</p>
      </div>
    </div>
  </div>
);

const TicketInventory = () => (
  <div className="bg-card-bg rounded-lg p-6">
    <h1 className="text-2xl font-bold text-white mb-4">Ticket Inventory</h1>
    <div className="space-y-4">
      {[1, 2, 3].map((ticket) => (
        <div key={ticket} className="bg-dark-navy p-4 rounded-lg flex justify-between items-center">
          <div>
            <h3 className="text-white font-semibold">Ticket #{ticket}</h3>
            <p className="text-gray-400">Event Name {ticket}</p>
          </div>
          <span className="text-accent-purple">$99</span>
        </div>
      ))}
    </div>
  </div>
);

const Organizers = () => (
  <div className="bg-card-bg rounded-lg p-6">
    <h1 className="text-2xl font-bold text-white mb-4">Organizers</h1>
    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
      {[1, 2, 3, 4].map((organizer) => (
        <div key={organizer} className="bg-dark-navy p-4 rounded-lg">
          <h3 className="text-white font-semibold">Organizer {organizer}</h3>
          <p className="text-gray-400">Events: {organizer * 2}</p>
        </div>
      ))}
    </div>
  </div>
);

const Events = () => (
  <div className="bg-card-bg rounded-lg p-6">
    <h1 className="text-2xl font-bold text-white mb-4">Events</h1>
    <div className="space-y-4">
      {[1, 2, 3].map((event) => (
        <div key={event} className="bg-dark-navy p-4 rounded-lg">
          <h3 className="text-white font-semibold">Event {event}</h3>
          <p className="text-gray-400">Date: March {event + 10}, 2024</p>
          <p className="text-accent-purple mt-2">Tickets Available: {event * 50}</p>
        </div>
      ))}
    </div>
  </div>
);

const CreateEvent = () => (
  <div className="bg-card-bg rounded-lg p-6">
    <h1 className="text-2xl font-bold text-white mb-4">Create Event</h1>
    <form className="space-y-4">
      <div>
        <label className="block text-gray-400 mb-2">Event Name</label>
        <input type="text" className="w-full bg-dark-navy p-2 rounded-lg text-white" />
      </div>
      <div>
        <label className="block text-gray-400 mb-2">Date</label>
        <input type="date" className="w-full bg-dark-navy p-2 rounded-lg text-white" />
      </div>
      <button type="submit" className="bg-accent-purple text-white px-4 py-2 rounded-lg">
        Create Event
      </button>
    </form>
  </div>
);

function App() {
  return (
    <ThemeProvider theme={darkTheme}>
      <CssBaseline />
      <Router>
        <Layout>
          <Routes>
            {/* Redirect root to dashboard */}
            <Route path="/" element={<Navigate to="/dashboard" replace />} />
            
            {/* Main routes */}
            <Route path="/dashboard" element={<Dashboard />} />
            
            {/* Ticket routes */}
            <Route path="/ticket/inventory" element={<TicketInventory />} />
            
            {/* Organizer routes */}
            <Route path="/organizers" element={<Organizers />} />
            
            {/* Event routes */}
            <Route path="/events" element={<Events />} />
            <Route path="/events/create" element={<CreateEvent />} />

            {/* Fallback for unknown routes */}
            <Route path="*" element={<Navigate to="/dashboard" replace />} />
          </Routes>
        </Layout>
      </Router>
    </ThemeProvider>
  );
}

export default App;