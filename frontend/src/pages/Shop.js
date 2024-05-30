import React from 'react';
import { Container, Row, Col, Form, Image } from 'react-bootstrap';
import '../css/Shop.css';
import { Header } from '../components/Header';

export const Shop = () => {
  return (
    <div>
        <Header />
        <Container className="shop-container">
      <div className="breadcrumb">
        Home &gt; Shop
      </div>
      <Row>
        <Col md={3}>
          <h5>Sort By</h5>
          <Form.Control as="select" className="mb-4">
            <option>Default sorting</option>
            <option>Sort by popularity</option>
            <option>Sort by average rating</option>
            <option>Sort by latest</option>
            <option>Sort by price: low to high</option>
            <option>Sort by price: high to low</option>
          </Form.Control>
          <h5 className="mt-4">Genres</h5>
          <Form.Check type="checkbox" label="Fantasy" />
          <Form.Check type="checkbox" label="Thriller" />
          <Form.Check type="checkbox" label="Sci-Fi" />
          <Form.Check type="checkbox" label="Biography" />
          <Form.Check type="checkbox" label="Mystery" />
          <Form.Check type="checkbox" label="Romance" />
        </Col>
        <Col md={9}>
          <Row>
            {[1, 2, 3, 4, 5, 6].map((book, index) => (
              <Col md={4} key={index} className="mb-4">
                <Image src="path/to/book-image.png" thumbnail className="shop-book" />
              </Col>
            ))}
          </Row>
        </Col>
      </Row>
      <Row className="mt-4">
        <Col>
          <h2>Bestsellers</h2>
          <div className="bestsellers">
            <Image src="path/to/book-image.png" thumbnail className="bestseller-book" />
            <Image src="path/to/book-image.png" thumbnail className="bestseller-book" />
            <Image src="path/to/book-image.png" thumbnail className="bestseller-book" />
          </div>
        </Col>
      </Row>
    </Container>
    </div>
  );
};
