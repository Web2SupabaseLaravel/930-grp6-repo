import React from 'react';
import { Link, Outlet } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

const Layout = () => {
  return (
    <div className="d-flex" style={{ minHeight: '100vh', background: '#111' }}>
      {/* Sidebar */}
      <div className="bg-dark p-3" style={{ width: '200px' }}>
        <h4 className="text-white">my Ticket</h4>
        <nav className="nav flex-column mt-4">
          <Link className="nav-link text-white" to="/dashboard">dashboard</Link>
          <Link className="nav-link text-white" to="/tickets">tickets</Link>
          <Link className="nav-link text-white" to="/organizers">organizers</Link>
          <Link className="nav-link text-white" to="/events">events</Link>
        </nav>
      </div>

      {/* Main content */}
      <div className="flex-grow-1 bg-black text-white">
        {/* Top navbar */}
        <div className="d-flex justify-content-between align-items-center p-3 border-bottom border-secondary">
          <input
            type="text"
            placeholder="search"
            className="form-control w-25"
            style={{ background: '#222', color: 'white', border: 'none' }}
          />
          <div className="d-flex align-items-center gap-3">
            <button className="btn btn-purple text-white" style={{ backgroundColor: '#a855f7' }}>
              sign up
            </button>
            <span>user</span>
          </div>
        </div>

        {/* Page content */}
        <div className="p-4">
          <Outlet />
        </div>
      </div>
    </div>
  );
};

export default Layout;
