import React from 'react';
import { Navigate } from 'react-router-dom';
import { useAuth } from '../../context/UserContext'; 


export default function ProtectedRoute({ children }) {
  const { user } = useAuth();
  console.log('ProtectedRoute user:', user);
  return user ? children : <Navigate to="/login" replace />;
}