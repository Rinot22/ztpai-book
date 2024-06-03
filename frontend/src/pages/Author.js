import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import '../css/Author.css';
import authorimg from '../images/author.webp'
import { Header } from '../components/Header';

export const Author = () => {
  const { id } = useParams(); // Получение ID автора из URL
  const [author, setAuthor] = useState(null);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchAuthorDetail = async () => {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          throw new Error('No token found');
        }

        const response = await fetch(`http://localhost:8000/api/authors/${id}`, {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch author detail');
        }

        const data = await response.json();
        setAuthor(data);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchAuthorDetail();
  }, [id]);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!author) {
    return <p style={{ textAlign: 'center' }}>Loading...</p>;
  }

  return (
    <div>
      <Header />
      <div className="author-detail-container">
      <h1 className="author-name">{author.name}</h1>
      <div className="author-content">
        <img src={authorimg} alt={author.name} className="author-image" />
        <div className="author-details">
          <table>
            <tbody>
              <tr>
                <td><strong>Name</strong></td>
                <td>{author.name}</td>
              </tr>
              <tr>
                <td><strong>Published Books</strong></td>
                <td>
                  <ul>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  );
};
