import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Form, Image, Card } from 'react-bootstrap';
import '../css/Shop.css';
import { Header } from '../components/Header';
import bookcov from '../images/book_cover.jpg'

export const Shop = () => {
  const [books, setBooks] = useState([]);
  const [categories, setCategories] = useState([]);
  const [selectedCategories, setSelectedCategories] = useState([]);
  const [sortOption, setSortOption] = useState('');
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchBooks = async () => {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          throw new Error('No token found');
        }

        const response = await fetch('http://localhost:8000/api/books', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch books');
        }

        const data = await response.json();
        setBooks(data['hydra:member']); // Извлечение книг из 'hydra:member'
      } catch (error) {
        setError(error.message);
      }
    };

    const fetchCategories = async () => {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          throw new Error('No token found');
        }

        const response = await fetch('http://localhost:8000/api/categories', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch categories');
        }

        const data = await response.json();
        setCategories(data['hydra:member']); // Извлечение категорий из 'hydra:member'
      } catch (error) {
        setError(error.message);
      }
    };

    fetchBooks();
    fetchCategories();
  }, []);

  const handleCategoryChange = (e) => {
    const { value, checked } = e.target;
    setSelectedCategories(prevSelectedCategories =>
      checked
        ? [...prevSelectedCategories, value]
        : prevSelectedCategories.filter(category => category !== value)
    );
  };

  const handleSortChange = (e) => {
    setSortOption(e.target.value);
  };

  const sortBooks = (books) => {
    switch (sortOption) {
      case 'priceLowToHigh':
        return books.sort((a, b) => a.price - b.price);
      case 'priceHighToLow':
        return books.sort((a, b) => b.price - a.price);
      default:
        return books;
    }
  };

  const filteredBooks = selectedCategories.length > 0
    ? books.filter(book =>
        book.categories.some(c => selectedCategories.includes(c.category.id.toString()))
      )
    : books;

  const sortedBooks = sortBooks(filteredBooks);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!books.length) {
    return <p style={{ textAlign: 'center' }}>Loading...</p>;
  }

  return (
    <div>
      <Header />
      <Container className="shop-container">
        <Row>
          <Col md={3}>
            <h5>Sort By</h5>
            <Form.Control as="select" className="mb-4" onChange={handleSortChange}>
              <option value="">Default sorting</option>
              <option value="latest">Sort by latest</option>
              <option value="priceLowToHigh">Sort by price: low to high</option>
              <option value="priceHighToLow">Sort by price: high to low</option>
            </Form.Control>
            <h5 className="mt-4">Genres</h5>
            {categories.map(category => (
              <Form.Check
                key={category.id}
                type="checkbox"
                label={category.categoryName} // Убедитесь, что API возвращает поле categoryName для категории
                value={category.id}
                onChange={handleCategoryChange}
              />
            ))}
          </Col>
          <Col md={9}>
            <Row>
              {sortedBooks.map((book, index) => (
                <Col md={4} key={index} className="mb-4">
                  <Card className="book-card">
                    <Card.Img variant="top" src={bookcov} className="shop-book" />
                    <Card.Body>
                      <Card.Title>{book.title}</Card.Title>
                      <Card.Text>{book.description}</Card.Text>
                      <Card.Text><strong>Price:</strong> ${book.price}</Card.Text>
                      <Card.Text><strong>Authors:</strong> {book.authors.map(a => a.author.name).join(', ')}</Card.Text>
                      <Card.Text><strong>Categories:</strong> {book.categories.map(c => c.category.categoryName).join(', ')}</Card.Text>
                    </Card.Body>
                  </Card>
                </Col>
              ))}
            </Row>
          </Col>
        </Row>
        <Row className="mt-4">
        </Row>
      </Container>
    </div>
  );
};
