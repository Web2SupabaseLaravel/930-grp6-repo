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
  FormControl,
  Select,
  MenuItem,
  Grid,
  useTheme,
  useMediaQuery,
  Stepper,
  Step,
  StepLabel,
} from '@mui/material';

const CreateTicketAndEmail = () => {
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));
  const [activeStep, setActiveStep] = useState(0);

  // Ticket state
  const [ticketType, setTicketType] = useState('paid');
  const [ticketClass, setTicketClass] = useState('normal');
  const [ticketFormData, setTicketFormData] = useState({
    event: '',
    quantity: '',
    price: '',
    ticketType: '',
    sales: '',
    row: '',
    seatRange: '',
    description: '',
  });

  // Email state
  const [recipientType, setRecipientType] = useState('all');
  const [emailFormData, setEmailFormData] = useState({
    subject: '',
    message: '',
  });

  const handleTicketSubmit = async (e) => {
    e.preventDefault();
    try {
      // Here you would make an API call to create the ticket
      const ticketData = { ...ticketFormData, ticketType, ticketClass };
      console.log('Creating ticket:', ticketData);
      // If successful, move to next step
      setActiveStep(1);
    } catch (error) {
      console.error('Error creating ticket:', error);
      alert('Failed to create ticket. Please try again.');
    }
  };

  const handleEmailSubmit = async (e) => {
    e.preventDefault();
    try {
      // Here you would make an API call to send the email
      const emailData = { ...emailFormData, recipientType };
      console.log('Sending email:', emailData);
      // If successful, show success message
      alert('Ticket created and email sent successfully!');
      // Reset form
      setActiveStep(0);
      setTicketFormData({
        event: '',
        quantity: '',
        price: '',
        ticketType: '',
        sales: '',
        row: '',
        seatRange: '',
        description: '',
      });
      setEmailFormData({
        subject: '',
        message: '',
      });
    } catch (error) {
      console.error('Error sending email:', error);
      alert('Failed to send email. Please try again.');
    }
  };

  const handleTicketChange = (e) => {
    const { name, value } = e.target;
    setTicketFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const handleEmailChange = (e) => {
    const { name, value } = e.target;
    setEmailFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const steps = ['Create Ticket', 'Send Email'];

  return (
    <Container maxWidth={isMobile ? 'xs' : 'md'} sx={{ mt: isMobile ? 2 : 4 }}>
      <Stepper activeStep={activeStep} sx={{ mb: 4 }}>
        {steps.map((label) => (
          <Step key={label}>
            <StepLabel sx={{ 
              '& .MuiStepLabel-label': { color: 'white' },
              '& .MuiStepIcon-root': { color: '#8B5CF6' },
              '& .MuiStepIcon-text': { fill: 'white' }
            }}>
              {label}
            </StepLabel>
          </Step>
        ))}
      </Stepper>

      {activeStep === 0 ? (
        <>
          <Typography variant={isMobile ? 'h5' : 'h4'} component="h1" gutterBottom sx={{ color: 'white' }}>
            Create Ticket
          </Typography>

          <Box component="form" onSubmit={handleTicketSubmit} sx={{ mt: 3 }}>
            <Grid container spacing={2}>
              {/* Radio Groups */}
              <Grid item xs={12} sm={6}>
                <RadioGroup
                  row={isMobile}
                  value={ticketType}
                  onChange={(e) => setTicketType(e.target.value)}
                >
                  <FormControlLabel
                    value="paid"
                    control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
                    label="Paid"
                    sx={{ color: 'white', mr: isMobile ? 4 : 2 }}
                  />
                  <FormControlLabel
                    value="free"
                    control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
                    label="Free"
                    sx={{ color: 'white' }}
                  />
                </RadioGroup>
              </Grid>

              <Grid item xs={12} sm={6}>
                <RadioGroup
                  row={isMobile}
                  value={ticketClass}
                  onChange={(e) => setTicketClass(e.target.value)}
                >
                  <FormControlLabel
                    value="normal"
                    control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
                    label="Normal"
                    sx={{ color: 'white', mr: isMobile ? 4 : 2 }}
                  />
                  <FormControlLabel
                    value="vip"
                    control={<Radio sx={{ color: 'white', '&.Mui-checked': { color: '#8B5CF6' } }} />}
                    label="VIP"
                    sx={{ color: 'white' }}
                  />
                </RadioGroup>
              </Grid>

              {/* Event Field */}
              <Grid item xs={12}>
                <TextField
                  fullWidth
                  label="Event"
                  name="event"
                  value={ticketFormData.event}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    input: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              {/* Quantity and Price */}
              <Grid item xs={12} sm={6}>
                <TextField
                  fullWidth
                  label="Quantity"
                  name="quantity"
                  type="number"
                  value={ticketFormData.quantity}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    input: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              <Grid item xs={12} sm={6}>
                <TextField
                  fullWidth
                  label="Price"
                  name="price"
                  type="number"
                  value={ticketFormData.price}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    input: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              {/* Sales Type */}
              <Grid item xs={12}>
                <FormControl fullWidth>
                  <Select
                    value={ticketFormData.sales}
                    name="sales"
                    onChange={handleTicketChange}
                    displayEmpty
                    sx={{
                      color: 'white',
                      '& .MuiOutlinedInput-notchedOutline': {
                        borderColor: 'rgba(255, 255, 255, 0.23)'
                      },
                      '&:hover .MuiOutlinedInput-notchedOutline': {
                        borderColor: '#8B5CF6'
                      },
                      '&.Mui-focused .MuiOutlinedInput-notchedOutline': {
                        borderColor: '#8B5CF6'
                      },
                      '& .MuiSelect-icon': { color: 'white' }
                    }}
                  >
                    <MenuItem value="">Select Sales Type</MenuItem>
                    <MenuItem value="online">Online</MenuItem>
                    <MenuItem value="offline">Offline</MenuItem>
                  </Select>
                </FormControl>
              </Grid>

              {/* Row and Seat Range */}
              <Grid item xs={12} sm={6}>
                <TextField
                  fullWidth
                  label="Row"
                  name="row"
                  value={ticketFormData.row}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    input: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              <Grid item xs={12} sm={6}>
                <TextField
                  fullWidth
                  label="Seat (Range)"
                  name="seatRange"
                  value={ticketFormData.seatRange}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    input: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              {/* Description */}
              <Grid item xs={12}>
                <TextField
                  fullWidth
                  label="Description"
                  name="description"
                  multiline
                  rows={4}
                  value={ticketFormData.description}
                  onChange={handleTicketChange}
                  sx={{
                    '& .MuiOutlinedInput-root': {
                      '& fieldset': { borderColor: 'rgba(255, 255, 255, 0.23)' },
                      '&:hover fieldset': { borderColor: '#8B5CF6' },
                      '&.Mui-focused fieldset': { borderColor: '#8B5CF6' },
                    },
                    textarea: { color: 'white' },
                    '& label': { color: 'gray' }
                  }}
                />
              </Grid>

              <Grid item xs={12}>
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
                  Create Ticket and Continue
                </Button>
              </Grid>
            </Grid>
          </Box>
        </>
      ) : (
        <>
          <Typography variant={isMobile ? 'h5' : 'h4'} component="h1" gutterBottom sx={{ color: 'white' }}>
            Send Email to Attendees
          </Typography>

          <Box component="form" onSubmit={handleEmailSubmit} sx={{ mt: 3 }}>
            <TextField
              fullWidth
              label="Subject"
              name="subject"
              value={emailFormData.subject}
              onChange={handleEmailChange}
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
              value={emailFormData.message}
              onChange={handleEmailChange}
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

            <Grid container spacing={2}>
              <Grid item xs={12} sm={6}>
                <Button
                  onClick={() => setActiveStep(0)}
                  variant="outlined"
                  fullWidth
                  sx={{
                    color: '#8B5CF6',
                    borderColor: '#8B5CF6',
                    '&:hover': {
                      borderColor: '#7C3AED',
                    },
                    py: 1.5,
                  }}
                >
                  Back to Ticket
                </Button>
              </Grid>
              <Grid item xs={12} sm={6}>
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
              </Grid>
            </Grid>
          </Box>
        </>
      )}
    </Container>
  );
};

export default CreateTicketAndEmail; 