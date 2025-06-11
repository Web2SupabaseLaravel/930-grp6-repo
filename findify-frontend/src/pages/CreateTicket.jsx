import React from 'react';
import { Form, Button, Row, Col } from 'react-bootstrap';

function CreateTicket() {
  return (
    <div className="text-white w-100" style={{ backgroundColor: '#000', minHeight: '100vh' }}>
      <Form className="w-100 p-4 p-md-5" style={{ backgroundColor: '#111' }}>
        <h3 className="mb-4">Create Ticket</h3>

        <Row className="mb-3">
          <Col md={6}>
            <Form.Check inline label="Paid" name="paidFree" type="radio" id="paid" />
            <Form.Check inline label="Free" name="paidFree" type="radio" id="free" />
          </Col>
          <Col md={6}>
            <Form.Check inline label="Normal" name="ticketLevel" type="radio" id="normal" />
            <Form.Check inline label="VIP" name="ticketLevel" type="radio" id="vip" />
          </Col>
        </Row>

        <Form.Group className="mb-3">
          <Form.Label>Event</Form.Label>
          <Form.Control type="text" placeholder="Event name" />
        </Form.Group>

        <Row className="mb-3">
          <Col md={6}>
            <Form.Label>Quantity</Form.Label>
            <Form.Control type="number" placeholder="e.g. 100" />
          </Col>
          <Col md={6}>
            <Form.Label>Price</Form.Label>
            <Form.Control type="number" placeholder="e.g. 50" />
          </Col>
        </Row>

        <Row className="mb-3">
          <Col md={6}>
            <Form.Label>Ticket Type</Form.Label>
            <Form.Control type="text" placeholder="e.g. Regular, VIP" />
          </Col>
          <Col md={6}>
            <Form.Label>Sales</Form.Label>
            <Form.Select>
              <option>Select Sales Channel</option>
              <option>Online</option>
              <option>Box Office</option>
            </Form.Select>
          </Col>
        </Row>

        <Row className="mb-3">
          <Col md={6}>
            <Form.Label>Row</Form.Label>
            <Form.Control type="text" placeholder="e.g. A" />
          </Col>
          <Col md={6}>
            <Form.Label>Seat (Range)</Form.Label>
            <Form.Control type="text" placeholder="e.g. 1-20" />
          </Col>
        </Row>

        <Form.Group className="mb-3">
          <Form.Label>Description</Form.Label>
          <Form.Control as="textarea" rows={3} placeholder="Ticket details..." />
        </Form.Group>

        <Button
          variant="primary"
          type="submit"
          className="w-100 mt-3"
          style={{ backgroundColor: '#9b59b6', border: 'none' }}
        >
          Create Ticket
        </Button>
      </Form>
    </div>
  );
}

export default CreateTicket;
