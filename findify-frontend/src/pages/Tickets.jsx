import React from 'react';
import { Table, Container } from 'react-bootstrap';

function Tickets() {
  return (
    <Container className="bg-dark text-white p-4 rounded mt-4">
      <h3 className="mb-4">Tickets</h3>

      <Table striped bordered hover variant="dark" responsive>
        <thead>
          <tr>
            <th>#</th>
            <th>Event</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Row</th>
            <th>Seat</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Tech Conference</td>
            <td>VIP</td>
            <td>50</td>
            <td>$100</td>
            <td>A</td>
            <td>1-50</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Music Fest</td>
            <td>Regular</td>
            <td>100</td>
            <td>$30</td>
            <td>B</td>
            <td>10-110</td>
          </tr>
        </tbody>
      </Table>
    </Container>
  );
}

export default Tickets;
