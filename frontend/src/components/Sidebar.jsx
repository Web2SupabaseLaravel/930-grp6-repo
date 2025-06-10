import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { LayoutDashboard, Ticket, Users, Calendar } from 'lucide-react';

const navItems = [
<<<<<<< HEAD
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
=======

  { name: 'Dashboard', icon: LayoutDashboard, path: '/' },
  { name: 'Tickets', icon: Ticket, path: '/ticket' ,
    children:[{name:'TicketInventory',path:'/ticket/inventory'}]
  },
  { name: 'Organizers', icon: Users, path: '/organizers' },
>>>>>>> event-repo/main
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
<<<<<<< HEAD
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
=======
    <div className="w-64 h-screen bg-dark-navy fixed left-0 top-0 p-4">
      <div className="mb-8">
        <Link to="/" className="flex items-center space-x-2">
          <span className="text-accent-purple font-bold text-xl">my Ticket</span>
        </Link>
      </div>

      <nav className="space-y-2">
        {navItems.map((item) => {
const isActive = location.pathname === item.path || location.pathname.startsWith(item.path + '/');
          return (
            <div key={item.name}>
>>>>>>> event-repo/main
              <Link
                to={item.path}
                className={`flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors ${
                  isActive
                    ? 'bg-accent-purple bg-opacity-20 text-accent-purple'
                    : 'text-gray-400 hover:bg-card-bg'
                }`}
              >
                <item.icon size={20} />
<<<<<<< HEAD
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
=======
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
>>>>>>> event-repo/main
                    );
                  })}
                </div>
              )}
            </div>
          );
        })}
      </nav>
<<<<<<< HEAD
    </aside>
=======
    </div>
>>>>>>> event-repo/main
  );
};

export default Sidebar;
