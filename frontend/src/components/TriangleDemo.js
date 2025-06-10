import React from 'react';
import { Container, Grid, Box, Typography } from '@mui/material';
import Triangle from './Triangle';

const TriangleDemo = () => {
  return (
    <Container maxWidth="md" sx={{ mt: 4 }}>
      <Typography variant="h4" gutterBottom sx={{ color: 'white', mb: 4 }}>
        Responsive Triangles Demo
      </Typography>

      <Grid container spacing={4}>
        {/* Different directions */}
        <Grid item xs={12}>
          <Typography variant="h6" sx={{ color: 'white', mb: 2 }}>
            Different Directions
          </Typography>
          <Grid container spacing={2}>
            <Grid item xs={3}>
              <Triangle direction="up" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle direction="right" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle direction="down" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle direction="left" maxWidth="100px" />
            </Grid>
          </Grid>
        </Grid>

        {/* Different colors */}
        <Grid item xs={12}>
          <Typography variant="h6" sx={{ color: 'white', mb: 2 }}>
            Different Colors
          </Typography>
          <Grid container spacing={2}>
            <Grid item xs={3}>
              <Triangle color="#FF5733" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle color="#33FF57" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle color="#3357FF" maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle color="#F033FF" maxWidth="100px" />
            </Grid>
          </Grid>
        </Grid>

        {/* Different sizes */}
        <Grid item xs={12}>
          <Typography variant="h6" sx={{ color: 'white', mb: 2 }}>
            Different Sizes
          </Typography>
          <Grid container spacing={2} alignItems="center">
            <Grid item xs={3}>
              <Triangle maxWidth="50px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle maxWidth="75px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle maxWidth="100px" />
            </Grid>
            <Grid item xs={3}>
              <Triangle maxWidth="125px" />
            </Grid>
          </Grid>
        </Grid>

        {/* Responsive example */}
        <Grid item xs={12}>
          <Typography variant="h6" sx={{ color: 'white', mb: 2 }}>
            Responsive Example (resize window)
          </Typography>
          <Grid container spacing={2}>
            <Grid item xs={12} sm={6} md={3}>
              <Box sx={{ p: 2, border: '1px solid #8B5CF6', borderRadius: 1 }}>
                <Triangle maxWidth="100%" />
              </Box>
            </Grid>
          </Grid>
        </Grid>
      </Grid>
    </Container>
  );
};

export default TriangleDemo; 