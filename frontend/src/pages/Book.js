import React from 'react';
import { Container, Row, Col, Form, Button, Image } from 'react-bootstrap';
import '../css/Book.css';
import { Header } from '../components/Header';

export const Book = () => {
  return (
    <div>
      <Header />
      <Container className="product-detail-container">
      <div className="breadcrumb">
        Home &gt; Shop &gt; eBook &gt; ipsum consequat nisl vel
      </div>
      <h1 className="product-title">IPSUM CONSEQUAT NISL VEL</h1>
      <Row>
        <Col md={6}>
          <Image src="path/to/book-image.png" className="product-image" />
        </Col>
        <Col md={6}>
          <div className="product-price">$47</div>
          <Form.Control type="number" defaultValue={1} min="1" className="quantity-input" />
          <ul className="product-details">
            <li><strong>Genre:</strong> Fantasy</li>
            <li><strong>Product type:</strong> Print Book</li>
            <li><strong>Author:</strong> C.S. Lewis</li>
            <li><strong>Pages:</strong> 500</li>
          </ul>
          <Button variant="primary" className="add-to-cart-btn">Add to Cart</Button>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <p className="product-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <h2>Similar Books</h2>
          <div className="similar-books">
            <Image src="path/to/book-image.png" thumbnail className="similar-book" />
            <Image src="path/to/book-image.png" thumbnail className="similar-book" />
            <Image src="path/to/book-image.png" thumbnail className="similar-book" />
          </div>
        </Col>
      </Row>
    </Container>
    </div>
  );
};
