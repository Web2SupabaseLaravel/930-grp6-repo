import React from 'react';
import Sidebar from './Sidebar';
import Header from './Header';
import './sidebar.css'
const Layout = ({ children }) => {
  return (
    <div className="layout-container">
  <Sidebar />
  <Header />
  <main className="main-content">
    {children}
  </main>
</div>

  );
};

export default Layout; 