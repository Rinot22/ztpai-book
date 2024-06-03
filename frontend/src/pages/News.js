import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../css/News.css';
import { Header } from '../components/Header';

export const News = () => {
  const [newsList, setNewsList] = useState([]);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchNewsList = async () => {
      try {
        const token = localStorage.getItem('token');

        const response = await fetch('http://localhost:8000/api/news', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch news list');
        }

        const data = await response.json();
        setNewsList(data['hydra:member']);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchNewsList();
  }, []);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!newsList.length) {
    return <p style={{ textAlign: 'center' }}>Loading...</p>;
  }

  return (
    <div>
      <Header />
      <div className="news-list-container">
        <h1 className="news-list-title">Latest News</h1>
        <div className="news-list">
          {newsList.map(news => (
            <div key={news.id} className="news-card">
              <div className="news-content">
                <h2 className="news-title">{news.title}</h2>
                <p className="news-description">{news.description}</p>
                <Link to={`/news/${news.id}`} className="news-read-more">Read More</Link>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};
