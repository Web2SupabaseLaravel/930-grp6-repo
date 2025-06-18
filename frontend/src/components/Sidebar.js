import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { LayoutDashboard, Ticket, Users, Calendar,setIsOpen } from 'lucide-react';
import './sidebar.css'
import { useState } from 'react'
const navItems = [

  { name: 'Dashboard', icon: LayoutDashboard, path: '/' },
  { name: 'Tickets', icon: Ticket, path: '/ticket' ,
    children:[{name:'TicketInventory',path:'/ticket/inventory'}]
  },
  { name: 'Organizers', icon: Users, path: '/organizers' },
  {
    name: 'Events',
    icon: Calendar,
    path: '/events',
    children: [
      { name: 'Create Event', path: '/events/create' },
    ],
  },
];

const Sidebar = () => {
  const location = useLocation();
const [isOpen, setIsOpen] = useState(false);
  return (
  
  <>
     
      <button
        className="sidebar-toggle"
        onClick={() => setIsOpen(!isOpen)}
      >
        ☰
      </button>

      <div className={`sidebar ${isOpen ? 'open' : ''}`}>
        <div className="sidebar-header">
          <Link to="/" className="sidebar-brand">
            <span className="brand-text">my Ticket</span>
          </Link>
        </div>

        <nav className="sidebar-nav">
          {navItems.map((item) => {
            const isActive =
              location.pathname === item.path ||
              location.pathname.startsWith(item.path + '/');

            return (
              <div key={item.name} className="sidebar-item">
                <Link
                  to={item.path}
                  className={`sidebar-link ${isActive ? 'active' : ''}`}
                >
                  <item.icon size={20} />
                  <span>{item.name}</span>
                </Link>

                {item.children && (
                  <div className="sidebar-submenu">
                    {item.children.map((child) => {
                      const isChildActive = location.pathname === child.path;
                      return (
                        <Link
                          key={child.name}
                          to={child.path}
                          className={`submenu-link ${
                            isChildActive ? 'active-child' : ''
                          }`}
                        >
                          <span className="submenu-item">
                            <span className="dot" />
                            <span>{child.name}</span>
                          </span>
                        </Link>
                      );
                    })}
                  </div>
                )}
              </div>
            );
          })}
        </nav>
      </div>
    </>


  );
};

export default Sidebar;
