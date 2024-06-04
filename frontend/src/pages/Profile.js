import React, { useState, useEffect } from 'react';
import '../css/Profile.css';
import { Header } from '../components/Header';
import { LoadingSpinner } from '../components/LoadingSpinner';
import { Link } from 'react-router-dom';

export const Profile = () => {
  const [profile, setProfile] = useState(null);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchProfile = async () => {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          throw new Error('No token found');
        }

        const response = await fetch('http://localhost:8000/api/user', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error('Failed to fetch profile');
        }

        const data = await response.json();
        setProfile(data);
      } catch (error) {
        setError(error.message);
      }
    };

    fetchProfile();
  }, []);

  if (error) {
    return <p style={{ color: 'red', textAlign: 'center' }}>{error}</p>;
  }

  if (!profile) {
    return <LoadingSpinner />;
  }

  return (
    <div>
      <Header />
      <div className="profile-container">
        <h1 className="profile-title">My Profile</h1>
        <div className="profile-section">
          <div className="profile-avatar-container">
            <img src={profile.avatar || "path/to/default-avatar.png"} alt="Avatar" className="profile-avatar" />
            <button className="change-avatar-btn">Change Avatar</button>
          </div>
          <div className="profile-info">
            <form>
              <div className="form-group">
                <label htmlFor="formEmail">Email</label>
                <input type="email" id="formEmail" defaultValue={profile.email} />
              </div>
              <button type="button" className="btn">Change Personal Information</button>
            </form>
          </div>
          <div>
            <Link to={`/cart`}>Your cart</Link>
          </div>
        </div>
      </div>
    </div>
  );
};
