import React from 'react';
import { Box } from '@mui/material';
import { styled } from '@mui/material/styles';

// Styled component for the triangle container
const TriangleContainer = styled(Box)(({ theme, direction = 'up', color = '#8B5CF6' }) => {
  // Base styles for the triangle container
  const baseStyles = {
    position: 'relative',
    width: '100%',
    height: 0,
    paddingBottom: '100%', // Makes it responsive while maintaining aspect ratio
  };

  // Direction-specific styles for the triangle
  const directionStyles = {
    '&::after': {
      content: '""',
      position: 'absolute',
      width: 0,
      height: 0,
      border: 'solid transparent',
      borderWidth: direction === 'left' || direction === 'right' ? '50% 86.6%' : '86.6% 50%',
      ...(direction === 'up' && {
        borderBottomColor: color,
        bottom: 0,
        left: '50%',
        transform: 'translateX(-50%)',
      }),
      ...(direction === 'down' && {
        borderTopColor: color,
        top: 0,
        left: '50%',
        transform: 'translateX(-50%)',
      }),
      ...(direction === 'left' && {
        borderRightColor: color,
        right: 0,
        top: '50%',
        transform: 'translateY(-50%)',
      }),
      ...(direction === 'right' && {
        borderLeftColor: color,
        left: 0,
        top: '50%',
        transform: 'translateY(-50%)',
      }),
    },
  };

  return {
    ...baseStyles,
    ...directionStyles,
  };
});

const Triangle = ({ 
  direction = 'up',
  color = '#8B5CF6',
  maxWidth = '100px',
  ...props 
}) => {
  return (
    <TriangleContainer
      direction={direction}
      color={color}
      sx={{
        maxWidth,
        ...props.sx
      }}
      {...props}
    />
  );
};

// Example usage:
// <Triangle direction="up" color="#8B5CF6" maxWidth="100px" />
// <Triangle direction="down" color="red" maxWidth="50px" />
// <Triangle direction="left" color="blue" maxWidth="75px" />
// <Triangle direction="right" color="green" maxWidth="150px" />

export default Triangle; 