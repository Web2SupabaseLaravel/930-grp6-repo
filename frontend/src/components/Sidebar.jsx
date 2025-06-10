import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { LayoutDashboard, Ticket, Users, Calendar } from 'lucide-react';

const navItems = [
  { 
    name: 'Dashboard', 
    icon: LayoutDashboard, 
    path: '/dashboard' 
  },
  { 
    name: 'Tickets', 
    icon: Ticket, 
    path: '/ticket',
    children: [
      { name: 'Ticket Inventory', path: '/ticket/inventory' }
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
    <aside className="w-64 h-screen bg-dark-navy fixed left-0 top-0 overflow-y-auto">
      <div className="p-6">
        <Link to="/" className="flex items-center space-x-2">
          <span className="text-accent-purple font-bold text-xl">My Ticket</span>
        </Link>
      </div>

      <nav className="px-4 pb-6">
        {navItems.map((item) => {
          const isActive = location.pathname === item.path || 
                         (item.children && item.children.some(child => location.pathname === child.path));

          return (
            <div key={item.name} className="mb-2">
              <Link
                to={item.path}
                className={`flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors ${
                  isActive
                    ? 'bg-accent-purple bg-opacity-20 text-accent-purple'
                    : 'text-gray-400 hover:bg-card-bg'
                }`}
              >
                <item.icon size={20} />
                <span className="font-medium">{item.name}</span>
              </Link>

              {item.children && (
                <div className="ml-6 mt-1 space-y-1">
                  {item.children.map((child) => {
                    const isChildActive = location.pathname === child.path;
                    return (
                      <Link
                        key={child.name}
                        to={child.path}
                        className={`block px-4 py-2 rounded-md text-sm transition-colors ${
                          isChildActive
                            ? 'bg-accent-purple bg-opacity-10 text-accent-purple'
                            : 'text-gray-400 hover:bg-card-bg'
                        }`}
                      >
                        {child.name}
                      </Link>
                    );
                  })}
                </div>
              )}
            </div>
          );
        })}
      </nav>
    </aside>
  );
};

export default Sidebar;
