import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { LayoutDashboard, Ticket, Users, Calendar } from 'lucide-react';
import { ConfirmationNumberIcon } from '@mui/icons-material';

const navItems = [
  { 
    name: 'Dashboard', 
    icon: LayoutDashboard, 
    path: '/' 
  },
  { 
    name: 'Tickets', 
    icon: Ticket, 
    path: '/tickets',
    children: [
      { name: 'Inventory', path: '/ticket/inventory' },
      { name: 'Create Ticket', path: '/create-ticket' }
    ]
  },
  { 
    name: 'Organizers', 
    icon: Users, 
    path: '/organizers' 
  },
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

  return (
    <div className="w-64 h-screen bg-dark-navy fixed left-0 top-0 p-4">
      <div className="mb-8">
        <Link to="/" className="flex items-center space-x-2">
          <span className="text-accent-purple font-bold text-xl">My Ticket</span>
        </Link>
      </div>

      <nav className="space-y-2">
        {navItems.map((item) => {
          const isActive = location.pathname === item.path || location.pathname.startsWith(item.path + '/');
          return (
            <div key={item.name}>
              <Link
                to={item.path}
                className={`flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors ${
                  isActive
                    ? 'bg-accent-purple bg-opacity-20 text-accent-purple'
                    : 'text-gray-400 hover:bg-card-bg'
                }`}
              >
                <item.icon size={20} />
                <span>{item.name}</span>
              </Link>

              {item.children && (
                <div className="ml-8 mt-1 space-y-1">
                  {item.children.map((child) => {
                    const isChildActive = location.pathname === child.path;
                    return (
                      <Link
                        key={child.name}
                        to={child.path}
                        className={`block text-sm px-3 py-2 rounded-md transition-colors ${
                          isChildActive
                            ? 'bg-accent-purple bg-opacity-10 text-accent-purple'
                            : 'text-gray-400 hover:bg-card-bg'
                        }`}
                      >
                        <span className="flex items-center space-x-2">
                          <span className="w-2 h-2 bg-accent-purple rounded-full"></span>
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
  );
};

export default Sidebar;
