import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../css/Authors.css';
import authorimg from '../images/author.webp'
import { Header } from '../components/Header';

export const Authors = () => {
  const [authors, setAuthors] = useState([]);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchAuthors = async () => {
      try {
        const token = localStorage.getItem('token');
        const response = await fetch('http://127.0.0.1:8000/api/authors', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch authors');
        }

        const data = await response.json();
        setAuthors(data['hydra:member']);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchAuthors();
  }, []);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!authors.length) {
    return <p style={{ textAlign: 'center' }}>Loading...</p>;
  }

  return (
    <div>
      <Header />
      <div className="authors-list-container">
        <h1 className="authors-list-title">All Authors</h1>
        <div className="authors-list">
          {authors.map(author => (
            <div key={author.id} className="author-card">
              <img src={authorimg} alt={author.name} className="author-image" />
              <div className="author-content">
                <h2 className="author-name">{author.name}</h2>
                <Link to={`/authors/${author.id}`} className="author-read-more">Read More</Link>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};
