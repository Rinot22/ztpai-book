import React from 'react';
import { Container, Row, Col, Button, Image, Carousel } from 'react-bootstrap';
import '../css/Home.css';
import { Header } from '../components/Header';
import lib from '../images/library.png'
import bookcov1 from '../images/book_cover.jpg'
import bookcov2 from '../images/book_cover2.jpg'
import bookcov3 from '../images/book_cover3.webp'
import { Link } from 'react-router-dom';

export const Home = () => {
  return (
    <div>
        <Header />
        <Container fluid className="homepage-container">
      <Row className="hero-section">
        <Col md={6} className="text-center">
          <h1>Booooooooks</h1>
          <p>Discover a wide variety of books from new arrivals, bestsellers, and pre-orders.</p>
          <Link to={`/shop`}><Button variant="primary">Browse Now</Button></Link>
        </Col>
        <Col md={6}>
          <Image src={lib} fluid />
        </Col>
      </Row>

      {/* <CarouselSection title="New arrivals" books={[bookcov1, bookcov2, bookcov3, bookcov1]} />
      <CarouselSection title="Bestsellers" books={[bookcov1, bookcov2, bookcov3, bookcov1]} />
      <CarouselSection title="Pre-orders" books={[bookcov1, bookcov2, bookcov3, bookcov1]} /> */}
    </Container>
    </div>
  );
};

// const CarouselSection = ({ title, books }) => (
//   <Row className="mt-4">
//     <Col>
//       <h2>{title}</h2>
//       <Carousel>
//         {books.map((book, index) => (
//           <Carousel.Item key={index}>
//             <Image src={book} thumbnail className="carousel-book" />
//           </Carousel.Item>
//         ))}
//       </Carousel>
//     </Col>
//   </Row>
// );
