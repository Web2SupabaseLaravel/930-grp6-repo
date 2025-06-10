import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Layout from './components/Layout';
import Dashboard from './pages/Dashboard';
import EventsList from './components/events/EventsList';
import CreateEvent from './components/events/CreateEvent';
import HumansCRUD from './components/humans/Human';
import AdminCRUD from './components/admins/Admin';
import OrganizerCRUD from './components/organizers/Organizer';
import AttendeeCRUD from './components/attendees/Attendee';
import TicketInventory from './components/ticket/TicketInventory';
import SignUp from './components/signup/signup'; 
import Signin from './components/signin/signin'; 
import EventDetailsPage from './components/eventdetailes/eventdetailes'; 
import './App.css';

function App() {
  return (
    <Router>
      <Layout>
        <Routes>
          <Route path="/" element={<Dashboard />} />
          <Route path="/tickets" element={<div>Tickets Page</div>} />
          <Route path="/organizers" element={<div>Organizers Page</div>} />
          <Route path="/events" element={<EventsList />} />
          <Route path="/events/create" element={<CreateEvent />} />
          <Route path="/humans" element={<HumansCRUD />} />
          <Route path="/admins" element={<AdminCRUD />} />
          <Route path="/organizers" element={<OrganizerCRUD />} />
          <Route path="/attendees" element={<AttendeeCRUD />} />
          <Route path="/ticket/inventory" element={<TicketInventory />} />
          <Route path="/eventdetails/:eventId" element={<EventDetailsPage />} />
          <Route path="/signup" element={<SignUp />} />
          <Route path="/signin" element={<Signin />} />
        </Routes>
      </Layout>
    </Router>
  );
}

export default App;
