import React from 'react';
import { Container, Row, Col, Card, Image, Button } from 'react-bootstrap';
import '../css/Authors.css';
import { Header } from '../components/Header';
import { useQuery } from "@tanstack/react-query";
import { Fragment } from 'react';

const author = {
    name: 'John Doe',
    biography: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus. Donec bibendum purus eu nisi consequat, non facilisis justo viverra.',
    image: 'path/to/author-image.png',
    books: [
      { title: 'Book 1', cover: 'path/to/book-cover1.png' },
      { title: 'Book 2', cover: 'path/to/book-cover2.png' },
      { title: 'Book 3', cover: 'path/to/book-cover3.png' },
    ],
  };

export const Authors = () => {
    const {data, isLoading} = useQuery({ queryKey: ['authors'], queryFn: () => fetch("http://127.0.0.1:8000/api/books") })


    console.log(data)
    // 
    return (
        <div>
            <Header />
            {!isLoading && data.map((item, index) => {
                return <Fragment key={index}>
                    {JSON.stringify(item)}
                </Fragment>
            })}
            {/* <Container fluid className="author-container"> */}
      {/* <Row className="align-items-center mb-4">
        <Col md={4} className="text-center">
          <Image src={author.image} roundedCircle className="author-image" />
        </Col>
        <Col md={8}>
          <h1>{author.name}</h1>
          <p>{author.biography}</p>
        </Col>
      </Row>
      <h2 className="mb-4">Books by {author.name}</h2>
      <Row>
        {author.books.map((book, index) => (
          <Col md={4} key={index} className="mb-4">
            <Card className="book-card">
              <Card.Img variant="top" src={book.cover} className="book-cover" />
              <Card.Body>
                <Card.Title>{book.title}</Card.Title>
                <Button variant="primary">View Details</Button>
              </Card.Body>
            </Card>
          </Col>
        ))}
      </Row>
    </Container> */}
        </div>
    );
}