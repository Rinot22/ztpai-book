import React from 'react';
import { Container, Row, Col, Button, Image, Carousel } from 'react-bootstrap';
import '../css/Home.css';
import { Header } from '../components/Header';
import lib from '../images/library.png'

export const Home = () => {
  return (
    <div>
        <Header />
        <Container fluid className="homepage-container">
      <Row className="hero-section">
        <Col md={6} className="text-center">
          <h1>Booooooooks</h1>
          <p>Discover a wide variety of books from new arrivals, bestsellers, and pre-orders.</p>
          <Button variant="primary">Browse Now</Button>
        </Col>
        <Col md={6}>
          <Image src={lib} fluid />
        </Col>
      </Row>

      <CarouselSection title="New arrivals" books={["book1.png", "book2.png", "book3.png", "book4.png"]} />
      <CarouselSection title="Bestsellers" books={["book5.png", "book6.png", "book7.png", "book8.png"]} />
      <CarouselSection title="Pre-orders" books={["book9.png", "book10.png", "book11.png", "book12.png"]} />
      
      <Row className="mt-4">
        <Col>
          <h2>All books</h2>
          <Row>
            {[...Array(12).keys()].map((_, index) => (
              <Col md={3} key={index} className="mb-4">
                <Image src={`path/to/book${index + 1}.png`} thumbnail className="all-books" />
              </Col>
            ))}
          </Row>
          <div className="text-center">
            <Button variant="primary">Load more</Button>
          </div>
        </Col>
      </Row>
    </Container>
    </div>
  );
};

const CarouselSection = ({ title, books }) => (
  <Row className="mt-4">
    <Col>
      <h2>{title}</h2>
      <Carousel>
        {books.map((book, index) => (
          <Carousel.Item key={index}>
            <Image src={`path/to/${book}`} thumbnail className="carousel-book" />
          </Carousel.Item>
        ))}
      </Carousel>
    </Col>
  </Row>
);
