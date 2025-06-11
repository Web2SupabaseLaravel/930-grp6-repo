import React from 'react';
import { Container, Nav, Navbar } from 'react-bootstrap';
import { Outlet, Link } from 'react-router-dom';

function MainLayout() {
  return (
    <div className="d-flex flex-column flex-md-row" style={{ minHeight: '100vh', width: '100vw', backgroundColor: '#000' }}>
      {/* Sidebar */}
      <div className="bg-dark text-white p-3" style={{ width: '220px', minHeight: '100vh' }}>
        <h4 className="text-white mb-4">my Ticket</h4>
        <Nav className="flex-column">
          <Nav.Link as={Link} to="/" className="text-white">Dashboard</Nav.Link>
          <Nav.Link as={Link} to="/tickets" className="text-white">Tickets</Nav.Link>
          <Nav.Link as={Link} to="/events" className="text-white">Events</Nav.Link>
          <Nav.Link as={Link} to="/humans" className="text-white">Humans</Nav.Link>
        </Nav>
      </div>

      {/* Main Content */}
      <div className="flex-grow-1 d-flex flex-column" style={{ backgroundColor: '#000', width: '100%' }}>
        {/* Top Navbar */}
        <Navbar bg="dark" variant="dark" className="px-3">
          <Container fluid className="justify-content-between">
            <input
              type="text"
              placeholder="search"
              className="form-control form-control-sm bg-secondary text-white border-0"
              style={{ maxWidth: '200px' }}
            />
            <div>
              <Link to="/signup" className="btn btn-outline-light btn-sm me-2">Sign Up</Link>
              <Link to="/admin" className="btn btn-outline-light btn-sm">Admin</Link>
            </div>
          </Container>
        </Navbar>

        {/* Outlet content full width */}
        <div className="w-100 flex-grow-1" style={{ backgroundColor: '#000' }}>
          <Outlet />
        </div>
      </div>
    </div>
  );
}

export default MainLayout;
