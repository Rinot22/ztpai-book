import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../css/Authors.css'; // Подключение стилей

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
        setAuthors(data);
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
    <div className="authors-container">
      <h1 className="authors-title">All Authors</h1>
      <ul className="authors-list">
        {authors.map(author => (
          <li key={author.id} className="authors-list-item">
            <Link to={`/authors/${author.id}`}>
              <img src={`path/to/${author.image}`} alt={author.name} className="authors-list-image" />
              <p>{author.name}</p>
            </Link>
          </li>
        ))}
      </ul>
    </div>
  );
};
