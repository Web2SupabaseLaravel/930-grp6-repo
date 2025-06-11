import React from 'react';
import { Routes, Route } from 'react-router-dom';
import MainLayout from './layout/MainLayout';
import CreateTicket from './pages/CreateTicket';
import Tickets from './pages/Tickets';
import Human from './pages/Human';

function App() {
  return (
    <Routes>
      <Route path="/" element={<MainLayout />}>
        <Route index element={<CreateTicket />} />
        <Route path="tickets" element={<Tickets />} />
        <Route path="humans" element={<Human />} />
      </Route>
    </Routes>
  );
}

export default App;
