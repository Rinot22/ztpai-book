import React, { useEffect, useState } from 'react';
import { Container, Row, Col, Form, Button, Image } from 'react-bootstrap';
import '../css/Book.css';
import { Header } from '../components/Header';
import { useParams } from 'react-router';
import bookcov from '../images/book_cover.jpg';
import { LoadingSpinner } from '../components/LoadingSpinner';

export const Book = () => {
  const {id} = useParams();
  const [book, setBook] = useState(null);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchBook = async () => {
      try {
        const token = localStorage.getItem('token');
        const response = await fetch(`http://localhost:8000/api/books/${id}`, {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if(!response.ok) {
          throw new Error('Failed to fetch book');
        }

        const data = await response.json();
        setBook(data);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchBook();
  }, [id]);

  if(!book) {
    return <LoadingSpinner />;
  }

  return (
    <div>
      <Header />
      <Container className="product-detail-container">
      <h1 className="book-title">{book.title}</h1>
        <Row>
          <Col md={6}>
            <img src={bookcov} className="book-image" />
          </Col>
          <Col md={6}>
            <div className="book-price">${book.price.toFixed(2)}</div>
            <Form.Control type="number" defaultValue={1} min="1" className="quantity-input" />
            <ul className="book-details">
              <p><strong>Genre:</strong> {book.categories.map(c => c.category.categoryName).join(', ')}</p>
              <p><strong>Author:</strong> {book.bookAuthors.map(ba => ba.author.name).join(', ')}</p>
              <p><strong>Publication Date:</strong> {new Date(book.publicationDate).toLocaleDateString()}</p>
              <p><strong>Description:</strong> {book.description}</p>
            </ul>
            <Button variant="primary" className="add-to-cart-btn">Add to Cart</Button>
          </Col>
        </Row>
    </Container>
    </div>
  );
};
