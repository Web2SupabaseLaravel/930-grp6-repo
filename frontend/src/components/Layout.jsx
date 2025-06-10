import React from 'react';
import Sidebar from './Sidebar';
import Header from './Header';

const Layout = ({ children }) => {
  return (
<<<<<<< HEAD
    <div className="flex min-h-screen bg-dark-navy">
      <Sidebar />
      <div className="flex-1">
        <Header />
        <main className="p-6 ml-64 mt-16">
          <div className="max-w-7xl mx-auto">
            {children}
          </div>
        </main>
      </div>
=======
    <div className="min-h-screen bg-dark-navy">
      <Sidebar />
      <Header />
      <main className="ml-64 pt-16 p-6">
        {children}
      </main>
>>>>>>> event-repo/main
    </div>
  );
};

export default Layout; 