import React, { useState } from 'react';
import { Container, Row, Col, Form, Button, Image } from 'react-bootstrap';
import '../css/Cart.css';
import { Header } from '../components/Header';

export const Cart = () => {
  const [cart, setCart] = useState([
    { id: 1, name: "IPSUM CONSEQUAT NISL VEL", price: 47, quantity: 2 },
    { id: 2, name: "IPSUM CONSEQUAT NISL VEL", price: 47, quantity: 2 }
  ]);

  const handleQuantityChange = (id, quantity) => {
    setCart(cart.map(item => item.id === id ? { ...item, quantity: quantity } : item));
  };

  const handleRemove = (id) => {
    setCart(cart.filter(item => item.id !== id));
  };

  const total = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);

  return (
    <>
        <Header />
        <Container className="shopping-cart-container">
      <h1 className="shopping-cart-title">Shopping Cart</h1>
      {cart.map(item => (
        <Row key={item.id} className="product-row align-items-center mb-3">
          <Col md={2}>
            <Image src="path/to/image.png" thumbnail />
          </Col>
          <Col md={4}>
            <h5 className="product-name">{item.name}</h5>
          </Col>
          <Col md={2}>
            <Form.Control 
              type="number" 
              value={item.quantity} 
              onChange={(e) => handleQuantityChange(item.id, parseInt(e.target.value))} 
              min="1" 
              className="quantity-input"
            />
          </Col>
          <Col md={2}>
            <h5 className="product-price">${item.price}</h5>
          </Col>
          <Col md={2}>
            <h5 className="product-total">${item.price * item.quantity}</h5>
          </Col>
        </Row>
      ))}
      <Row>
        <Col md={{ span: 4, offset: 8 }} className="total-row">
          <h3>Total: ${total}</h3>
        </Col>
      </Row>
      <Row className="buttons-row">
        <Col md={6}>
          <Button variant="secondary" block>Continue Shopping</Button>
        </Col>
        <Col md={6}>
          <Button variant="primary" block>Buy and Pay</Button>
        </Col>
      </Row>
      <Row className="my-4">
        <Col md={6}>
          <Form.Group controlId="formName">
            <Form.Label>Name</Form.Label>
            <Form.Control type="text" placeholder="Enter your name" />
          </Form.Group>
        </Col>
        <Col md={6}>
          <Form.Group controlId="formSurname">
            <Form.Label>Surname</Form.Label>
            <Form.Control type="text" placeholder="Enter your surname" />
          </Form.Group>
        </Col>
      </Row>
      <Row className="my-4">
        <Col md={6}>
          <Form.Group controlId="formPhone">
            <Form.Label>Phone</Form.Label>
            <Form.Control type="text" placeholder="Enter your phone number" />
          </Form.Group>
        </Col>
        <Col md={6}>
          <Form.Group controlId="formEmail">
            <Form.Label>Email</Form.Label>
            <Form.Control type="email" placeholder="Enter your email" />
          </Form.Group>
        </Col>
      </Row>
      <Row className="my-4">
        <Col md={6}>
          <Form.Group controlId="formCity">
            <Form.Label>City</Form.Label>
            <Form.Control type="text" placeholder="Enter your city" />
          </Form.Group>
        </Col>
        <Col md={6}>
          <Form.Group controlId="formAddress">
            <Form.Label>Address</Form.Label>
            <Form.Control type="text" placeholder="Enter your address" />
          </Form.Group>
        </Col>
      </Row>
    </Container>
    </>
  );
};
