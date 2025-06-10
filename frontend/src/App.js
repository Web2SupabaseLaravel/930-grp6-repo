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
import CreateTicketAndEmail from './components/ticket/CreateTicketAndEmail';
import SignUp from './components/signup/Signup'; 
import Signin from './components/signin/Signin'; 
import './App.css';

const Tickets = () => <div>Tickets Page</div>;
const Organizers = () => <div>Organizers Page</div>;

function App() {
  return (
    <Router>
      <Layout>
        <Routes>
          <Route path="/" element={<Dashboard />} />
          <Route path="/tickets" element={<Tickets />} />
          <Route path="/organizers" element={<Organizers />} />
          <Route path="/events" element={<EventsList />} />
          <Route path="/humans" element={<HumansCRUD />} />
          <Route path="/admins" element={<AdminCRUD />} />
          <Route path="/organizers" element={<OrganizerCRUD />} />
          <Route path="/attendees" element={<AttendeeCRUD />} />
          <Route path="/events/create" element={<CreateEvent/>}/>
          <Route path="/ticket/inventory" element={<TicketInventory/>}/>
          <Route path="/ticket/create" element={<CreateTicketAndEmail/>}/>
          <Route path="/create-ticket" element={<CreateTicketAndEmail/>}/>
          <Route path="/signup" element={<SignUp />} />
          <Route path="/signin" element={<Signin />} />
        </Routes>
      </Layout>
    </Router>
  );
}

export default App;
