import React from 'react';
import { Search, Bell, User } from 'lucide-react';
import { Link } from 'react-router-dom';

const Header = () => {
  return (
    <header className="h-16 bg-dark-navy fixed top-0 right-0 left-64 px-6 flex items-center justify-between z-10">
      <div className="flex-1 max-w-xl">
        <div className="relative">
          <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
          <input
            type="text"
            placeholder="Search..."
            className="w-full pl-10 pr-4 py-2 bg-card-bg rounded-lg text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-purple"
          />
        </div>
      </div>
      
      <div className="flex items-center space-x-6">
        <button className="text-gray-400 hover:text-white">
          <Bell size={20} />
        </button>
        
        <Link 
          to="/signup" 
          className="px-4 py-2 bg-accent-purple hover:bg-accent-purple-dark text-white rounded-lg transition-colors"
        >
          Sign up
        </Link>
        
        <div className="flex items-center space-x-4">
          <span className="text-sm text-gray-200">admin</span>
          <button className="w-8 h-8 rounded-full bg-card-bg flex items-center justify-center">
            <Link to="/signin">
              <User size={20} className="text-gray-400 hover:text-white transition-colors" />
            </Link>
          </button>
        </div>
      </div>
    </header>
  );
};

export default Header; 