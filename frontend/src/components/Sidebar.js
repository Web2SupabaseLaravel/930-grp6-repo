import React from 'react';
import { Box, List, ListItem, ListItemText, useTheme, useMediaQuery } from '@mui/material';
import { Link, useLocation } from 'react-router-dom';

const menuItems = [
  { text: 'dashboard', path: '/dashboard' },
  { text: 'tickets', path: '/create-ticket' },
  { text: 'organizers', path: '/organizers' },
  { text: 'events', path: '/events' },
];

const Sidebar = () => {
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));
  const location = useLocation();

  return (
    <Box
      sx={{
        backgroundColor: '#1a1a1a',
        borderRight: '2px solid #8B5CF6',
        height: isMobile ? 'auto' : '100vh',
        position: isMobile ? 'static' : 'fixed',
        width: isMobile ? '100%' : '200px',
        top: isMobile ? 'auto' : '64px', // Height of navbar
      }}
    >
      <List
        sx={{
          display: isMobile ? 'flex' : 'block',
          justifyContent: 'space-around',
          padding: 0,
        }}
      >
        {menuItems.map((item) => (
          <ListItem
            key={item.text}
            component={Link}
            to={item.path}
            sx={{
              color: 'white',
              backgroundColor: location.pathname === item.path ? 'rgba(139, 92, 246, 0.1)' : 'transparent',
              '&:hover': {
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                color: '#8B5CF6',
              },
              padding: isMobile ? '8px' : '16px',
              width: isMobile ? 'auto' : '100%',
              borderLeft: location.pathname === item.path ? '4px solid #8B5CF6' : 'none',
            }}
          >
            <ListItemText 
              primary={item.text}
              sx={{
                '& .MuiListItemText-primary': {
                  fontSize: isMobile ? '0.875rem' : '1rem',
                  color: location.pathname === item.path ? '#8B5CF6' : 'inherit',
                  fontWeight: location.pathname === item.path ? 'bold' : 'normal',
                },
              }}
            />
          </ListItem>
        ))}
      </List>
    </Box>
  );
};

export default Sidebar; 