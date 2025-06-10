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
} from '@mui/material';

const CreateTicket = () => {
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));

  const [ticketType, setTicketType] = useState('paid');
  const [ticketClass, setTicketClass] = useState('normal');
  const [formData, setFormData] = useState({
    event: '',
    quantity: '',
    price: '',
    ticketType: '',
    sales: '',
    row: '',
    seatRange: '',
    description: '',
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ ...formData, ticketType, ticketClass });
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  return (
    <Container maxWidth={isMobile ? 'xs' : 'md'} sx={{ mt: isMobile ? 2 : 4 }}>
      <Typography variant={isMobile ? 'h5' : 'h4'} component="h1" gutterBottom sx={{ color: 'white' }}>
        Create Ticket
      </Typography>

      <Box component="form" onSubmit={handleSubmit} sx={{ mt: 3 }}>
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
              value={formData.event}
              onChange={handleChange}
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
              value={formData.quantity}
              onChange={handleChange}
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
              value={formData.price}
              onChange={handleChange}
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

          {/* Ticket Type and Sales */}
          <Grid item xs={12} sm={6}>
            <TextField
              fullWidth
              label="Ticket Type"
              name="ticketType"
              value={formData.ticketType}
              onChange={handleChange}
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
            <FormControl fullWidth>
              <Select
                value={formData.sales}
                name="sales"
                onChange={handleChange}
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
              value={formData.row}
              onChange={handleChange}
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
              value={formData.seatRange}
              onChange={handleChange}
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
              value={formData.description}
              onChange={handleChange}
              multiline
              rows={4}
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

          {/* Submit Button */}
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
                mt: 2
              }}
            >
              Create Ticket
            </Button>
          </Grid>
        </Grid>
      </Box>
    </Container>
  );
};

export default CreateTicket;