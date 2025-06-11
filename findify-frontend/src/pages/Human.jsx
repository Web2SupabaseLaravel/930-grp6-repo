import React from 'react';
import { Table, Container, Badge } from 'react-bootstrap';

function Human() {
  return (
    <Container className="bg-dark text-white p-4 rounded mt-4">
      <h3 className="mb-4">People Management</h3>

      <Table striped bordered hover variant="dark" responsive>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Ahmad Ali</td>
            <td>ahmad@example.com</td>
            <td>Attendee</td>
            <td><Badge bg="success">Active</Badge></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Leila Hani</td>
            <td>leila@example.com</td>
            <td>Organizer</td>
            <td><Badge bg="warning">Pending</Badge></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Admin Qusai</td>
            <td>admin@example.com</td>
            <td>Admin</td>
            <td><Badge bg="danger">Suspended</Badge></td>
          </tr>
        </tbody>
      </Table>
    </Container>
  );
}

export default Human;
