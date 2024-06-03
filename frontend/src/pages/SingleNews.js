import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import '../css/SingleNews.css';
import { Header } from '../components/Header';
import book from '../images/book.png'

export const SingleNews = () => {
  const { id } = useParams();
  const [news, setNews] = useState(null);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchNewsDetail = async () => {
      try {
        const token = localStorage.getItem('token');
        const response = await fetch(`http://localhost:8000/api/news/${id}`, {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch news detail');
        }

        const data = await response.json();
        setNews(data);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchNewsDetail();
  }, [id]);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!news) {
    return <p style={{ textAlign: 'center' }}>Loading...</p>;
  }

  const formatDate = (dateString) => {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return new Date(dateString).toLocaleDateString(undefined, options);
  };

  return (
    <div>
        <Header />
        <div className="news-detail-container">
      <h1 className="news-title">{news.title}</h1>
      <div className="news-content">
        <div className="news-details">
          <table>
            <tbody>
              <tr>
                <td><strong>Title</strong></td>
                <td>{news.title}</td>
              </tr>
              <tr>
                <td><strong>Published Date</strong></td>
                <td>{formatDate(news.publicationDate)}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div className="news-body">
        <h2>Content</h2>
        <p>{news.content}</p>
      </div>
    </div>
    </div>
  );
};
