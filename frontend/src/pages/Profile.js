import React from 'react';
import { Container, Row, Col, Form, Button, Image, Card } from 'react-bootstrap';
import '../css/Profile.css';
import { Header } from '../components/Header';

export const Profile = () => {
  return (
    <>
        <Header />
        <Container className="profile-container">
      <h1 className="profile-title">My Profile</h1>
      <Row>
        <Col md={3} className="text-center">
          <Image src="path/to/avatar.png" roundedCircle className="profile-avatar" />
          <Button variant="link" className="change-avatar-btn">Change Avatar</Button>
        </Col>
        <Col md={9}>
          <Form>
            <Row>
              <Col md={6}>
                <Form.Group controlId="formFirstName">
                  <Form.Label>First Name</Form.Label>
                  <Form.Control type="text" placeholder="Monika" />
                </Form.Group>
              </Col>
              <Col md={6}>
                <Form.Group controlId="formLastName">
                  <Form.Label>Last Name</Form.Label>
                  <Form.Control type="text" placeholder="Lewicki" />
                </Form.Group>
              </Col>
            </Row>
            <Row>
              <Col md={6}>
                <Form.Group controlId="formPhone">
                  <Form.Label>Phone</Form.Label>
                  <Form.Control type="text" placeholder="+48 562 198 129" />
                </Form.Group>
              </Col>
              <Col md={6}>
                <Form.Group controlId="formEmail">
                  <Form.Label>Email</Form.Label>
                  <Form.Control type="email" placeholder="monika.l@mail.com" />
                </Form.Group>
              </Col>
            </Row>
            <Button variant="secondary" className="mt-3">Change Personal Information</Button>
          </Form>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <h2>Shipping Address</h2>
          <Form>
            <Row>
              <Col md={6}>
                <Form.Group controlId="formCity">
                  <Form.Label>City</Form.Label>
                  <Form.Control type="text" placeholder="Krakow" />
                </Form.Group>
              </Col>
              <Col md={6}>
                <Form.Group controlId="formAddress">
                  <Form.Label>Address</Form.Label>
                  <Form.Control type="text" placeholder="UL. Grodzka 25/12A" />
                </Form.Group>
              </Col>
            </Row>
            <Button variant="secondary" className="mt-3">Change Shipping Information</Button>
          </Form>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <h2>Published Books</h2>
          <div className="published-books">
            <Image src="path/to/book.png" thumbnail className="published-book" />
            <Image src="path/to/book.png" thumbnail className="published-book" />
            <Image src="path/to/book.png" thumbnail className="published-book" />
          </div>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <h2>Order History</h2>
          <Card className="order-history-card">
            <Card.Body>
              <Card.Title>April 13, 2024</Card.Title>
              <Card.Text>
                IPSUM CONSEQUAT NISL VEL <span className="float-right">32$</span>
              </Card.Text>
              <Card.Text>
                IPSUM CONSEQUAT NISL VEL <span className="float-right">32$</span>
              </Card.Text>
            </Card.Body>
          </Card>
          <Card className="order-history-card">
            <Card.Body>
              <Card.Title>November 27, 2024</Card.Title>
              <Card.Text>
                IPSUM CONSEQUAT NISL VEL <span className="float-right">32$</span>
              </Card.Text>
              <Card.Text>
                IPSUM CONSEQUAT NISL VEL <span className="float-right">32$</span>
              </Card.Text>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </Container>
    </>
  );
};
