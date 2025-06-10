import React, { useState } from 'react';
import {
  AppBar,
  Toolbar,
  Typography,
  InputBase,
  Button,
  IconButton,
  Box,
  Menu,
  MenuItem,
  useTheme,
  useMediaQuery,
  Drawer,
  List,
  ListItem,
  ListItemText,
} from '@mui/material';
import SearchIcon from '@mui/icons-material/Search';
import NotificationsIcon from '@mui/icons-material/Notifications';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import MenuIcon from '@mui/icons-material/Menu';
import LoginIcon from '@mui/icons-material/Login';
import { styled, alpha } from '@mui/material/styles';

const Search = styled('div')(({ theme }) => ({
  position: 'relative',
  borderRadius: theme.shape.borderRadius,
  backgroundColor: alpha(theme.palette.common.white, 0.15),
  '&:hover': {
    backgroundColor: alpha(theme.palette.common.white, 0.25),
  },
  marginRight: theme.spacing(2),
  marginLeft: theme.spacing(2),
  width: '100%',
  [theme.breakpoints.up('sm')]: {
    marginLeft: theme.spacing(3),
    width: 'auto',
    minWidth: '300px',
  },
}));

const SearchIconWrapper = styled('div')(({ theme }) => ({
  padding: theme.spacing(0, 2),
  height: '100%',
  position: 'absolute',
  pointerEvents: 'none',
  display: 'flex',
  alignItems: 'center',
  justifyContent: 'center',
}));

const StyledInputBase = styled(InputBase)(({ theme }) => ({
  color: 'inherit',
  width: '100%',
  '& .MuiInputBase-input': {
    padding: theme.spacing(1, 1, 1, 0),
    paddingLeft: `calc(1em + ${theme.spacing(4)})`,
    transition: theme.transitions.create('width'),
    width: '100%',
    [theme.breakpoints.up('md')]: {
      width: '100%',
    },
  },
}));

const StyledToolbar = styled(Toolbar)(({ theme }) => ({
  display: 'flex',
  justifyContent: 'space-between',
  alignItems: 'center',
  padding: theme.spacing(0, 2),
  [theme.breakpoints.up('sm')]: {
    padding: theme.spacing(0, 3),
  },
}));

const Navbar = () => {
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [anchorEl, setAnchorEl] = useState(null);

  const handleProfileMenuOpen = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleProfileMenuClose = () => {
    setAnchorEl(null);
  };

  const toggleMobileMenu = () => {
    setMobileMenuOpen(!mobileMenuOpen);
  };

  const mobileMenuItems = [
    { label: 'Sign Up', action: () => console.log('Sign Up clicked'), icon: <LoginIcon /> },
    { label: 'Notifications', action: () => console.log('Notifications clicked'), icon: <NotificationsIcon /> },
    { label: 'Admin', action: () => console.log('Admin clicked'), icon: <AccountCircleIcon /> },
  ];

  const renderMobileMenu = (
    <Drawer
      anchor="right"
      open={mobileMenuOpen}
      onClose={toggleMobileMenu}
      PaperProps={{
        sx: {
          backgroundColor: '#1a1a1a',
          width: 240,
        },
      }}
    >
      <List>
        {mobileMenuItems.map((item) => (
          <ListItem
            key={item.label}
            onClick={() => {
              item.action();
              toggleMobileMenu();
            }}
            sx={{
              color: 'white',
              '&:hover': {
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                color: '#8B5CF6',
              },
            }}
          >
            <IconButton sx={{ color: 'inherit', mr: 1 }}>
              {item.icon}
            </IconButton>
            <ListItemText primary={item.label} />
          </ListItem>
        ))}
      </List>
    </Drawer>
  );

  const renderDesktopMenu = (
    <Box sx={{ display: 'flex', alignItems: 'center', gap: 2 }}>
      <Button
        variant="contained"
        startIcon={<LoginIcon />}
        sx={{
          backgroundColor: '#8B5CF6',
          color: 'white',
          borderRadius: '20px',
          padding: '8px 24px',
          textTransform: 'none',
          fontWeight: 'bold',
          '&:hover': {
            backgroundColor: '#7c3aed',
          },
        }}
      >
        Sign up
      </Button>

      <IconButton 
        color="inherit"
        sx={{
          backgroundColor: 'rgba(255, 255, 255, 0.1)',
          '&:hover': {
            backgroundColor: 'rgba(139, 92, 246, 0.2)',
          },
        }}
      >
        <NotificationsIcon />
      </IconButton>

      <Button
        startIcon={<AccountCircleIcon />}
        onClick={handleProfileMenuOpen}
        sx={{
          color: 'white',
          backgroundColor: 'rgba(255, 255, 255, 0.1)',
          padding: '6px 16px',
          borderRadius: '20px',
          textTransform: 'none',
          '&:hover': {
            backgroundColor: 'rgba(139, 92, 246, 0.2)',
            color: '#8B5CF6',
          },
        }}
      >
        Admin
      </Button>

      <Menu
        anchorEl={anchorEl}
        open={Boolean(anchorEl)}
        onClose={handleProfileMenuClose}
        PaperProps={{
          sx: {
            backgroundColor: '#1a1a1a',
            mt: 1,
          },
        }}
      >
        <MenuItem onClick={handleProfileMenuClose} sx={{ color: 'white' }}>Profile</MenuItem>
        <MenuItem onClick={handleProfileMenuClose} sx={{ color: 'white' }}>Settings</MenuItem>
        <MenuItem onClick={handleProfileMenuClose} sx={{ color: 'white' }}>Logout</MenuItem>
      </Menu>
    </Box>
  );

  return (
    <AppBar position="fixed" sx={{ backgroundColor: '#1a1a1a', zIndex: theme.zIndex.drawer + 1 }}>
      <StyledToolbar>
        <Typography
          variant="h6"
          noWrap
          component="div"
          sx={{ 
            color: '#8B5CF6', 
            fontWeight: 'bold',
            fontSize: isMobile ? '1.2rem' : '1.5rem',
            minWidth: isMobile ? 'auto' : '150px',
          }}
        >
          my Ticket
        </Typography>

        {!isMobile && (
          <Search>
            <SearchIconWrapper>
              <SearchIcon />
            </SearchIconWrapper>
            <StyledInputBase
              placeholder="Search..."
              inputProps={{ 'aria-label': 'search' }}
            />
          </Search>
        )}

        <Box sx={{ display: 'flex', alignItems: 'center' }}>
          {isMobile ? (
            <IconButton
              color="inherit"
              edge="end"
              onClick={toggleMobileMenu}
              sx={{
                backgroundColor: 'rgba(255, 255, 255, 0.1)',
                '&:hover': {
                  backgroundColor: 'rgba(139, 92, 246, 0.2)',
                },
              }}
            >
              <MenuIcon />
            </IconButton>
          ) : (
            renderDesktopMenu
          )}
        </Box>
      </StyledToolbar>
      {renderMobileMenu}
    </AppBar>
  );
};

export default Navbar;