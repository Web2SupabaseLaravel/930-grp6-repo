import React, { useState } from 'react';
import {
  Container,
  Typography,
  TextField,
  RadioGroup,
  FormControlLabel,
  Radio,
  Button,
  Box,
} from '@mui/material';

const SendEmail = () => {
  const [recipientType, setRecipientType] = useState('all');
  const [formData, setFormData] = useState({
    subject: '',
    message: '',
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    // Handle email submission here
    console.log({ ...formData, recipientType });
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  return (
    <Container maxWidth="md" sx={{ mt: 4 }}>
      <Typography variant="h4" component="h1" gutterBottom sx={{ color: 'white' }}>
        Send Email to Attendees
      </Typography>

      <Box component="form" onSubmit={handleSubmit} sx={{ mt: 3 }}>
        <TextField
          fullWidth
          label="Subject"
          name="subject"
          value={formData.subject}
          onChange={handleChange}
          sx={{ 
            mb: 3, 
            input: { color: 'white' }, 
            '& label': { color: 'gray' },
            '& .MuiOutlinedInput-root': {
              '& fieldset': {
                borderColor: 'gray',
              },
              '&:hover fieldset': {
                borderColor: '#8B5CF6',
              },
              '&.Mui-focused fieldset': {
                borderColor: '#8B5CF6',
              },
            },
          }}
        />

        <TextField
          fullWidth
          label="Message"
          name="message"
          value={formData.message}
          onChange={handleChange}
          multiline
          rows={6}
          sx={{ 
            mb: 3, 
            textarea: { color: 'white' }, 
            '& label': { color: 'gray' },
            '& .MuiOutlinedInput-root': {
              '& fieldset': {
                borderColor: 'gray',
              },
              '&:hover fieldset': {
                borderColor: '#8B5CF6',
              },
              '&.Mui-focused fieldset': {
                borderColor: '#8B5CF6',
              },
            },
          }}
        />

        <Box sx={{ mb: 3 }}>
          <RadioGroup
            value={recipientType}
            onChange={(e) => setRecipientType(e.target.value)}
          >
            <FormControlLabel
              value="all"
              control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
              label="All attendees"
              sx={{ color: 'white' }}
            />
            <FormControlLabel
              value="specific"
              control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
              label="Specific attendees"
              sx={{ color: 'white' }}
            />
          </RadioGroup>
        </Box>

        <Button
          type="submit"
          variant="contained"
          fullWidth
          sx={{
            backgroundColor: '#8B5CF6',
            '&:hover': {
              backgroundColor: '#7C3AED',
            },
            py: 1.5,
          }}
        >
          Send Email
        </Button>
      </Box>
    </Container>
  );
};

export default SendEmail;