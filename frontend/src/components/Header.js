import React from 'react';
import { Search, Bell, User } from 'lucide-react';
import { Link } from 'react-router-dom';
import './sidebar.css'
const Header = () => {
  return (
   <header className="main-header">
  <div className="search-container">
    <div className="search-wrapper">
      <Search className="search-icon" size={20} />
      <input
        type="text"
        placeholder="Search..."
        className="search-input"
      />
    </div>
  </div>

  <div className="header-actions">
    <button className="icon-button">
      <Bell size={20} />
    </button>

    <div className="user-info">
      <span className="user-name">admin</span>
      <button className="user-avatar">
        <Link to="/signin">
          <User size={20} className="user-icon" />
        </Link>
      </button>
    </div>
  </div>
</header>

  );
};

export default Header; 