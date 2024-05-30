import React from 'react';
import { Container, Row, Col, Card, Button, Image } from 'react-bootstrap';
import '../css/News.css';
import { Header } from '../components/Header';

const newsArticles = [
  {
    title: 'Article 1',
    summary: 'Summary of article 1.',
    image: 'path/to/image1.png',
    date: '2024-05-30',
  },
  {
    title: 'Article 2',
    summary: 'Summary of article 2.',
    image: 'path/to/image2.png',
    date: '2024-05-29',
  },
];

export const News = () => {
  return (
    <div>
        <Header />
        <Container fluid className="news-container">
      <h1 className="news-title">Latest News</h1>
      <Row>
        {newsArticles.map((article, index) => (
          <Col md={4} key={index} className="mb-4">
            <Card className="news-card">
              <Card.Img variant="top" src={article.image} className="news-image" />
              <Card.Body>
                <Card.Title>{article.title}</Card.Title>
                <Card.Text>{article.summary}</Card.Text>
                <Button variant="primary">Read More</Button>
              </Card.Body>
              <Card.Footer className="text-muted">{article.date}</Card.Footer>
            </Card>
          </Col>
        ))}
      </Row>
    </Container>
    </div>
  );
};
