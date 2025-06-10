import React from 'react';
import { Box, useTheme, useMediaQuery } from '@mui/material';
import Navbar from './Navbar';
import Sidebar from './Sidebar';

const Layout = ({ children }) => {
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));

  return (
    <Box sx={{ backgroundColor: '#1a1a1a', minHeight: '100vh' }}>
      <Navbar />
      <Box sx={{ display: 'flex', flexDirection: isMobile ? 'column' : 'row' }}>
        <Sidebar />
        <Box
          component="main"
          sx={{
            flexGrow: 1,
            marginLeft: isMobile ? 0 : '200px', // Width of sidebar
            marginTop: isMobile ? 0 : '64px', // Height of navbar
            padding: '20px',
            width: isMobile ? '100%' : 'calc(100% - 200px)',
          }}
        >
          {children}
        </Box>
      </Box>
    </Box>
  );
};

export default Layout; 