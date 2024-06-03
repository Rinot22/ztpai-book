import React, { useState, useEffect } from 'react';
import '../css/Profile.css';
import { Header } from '../components/Header';
import { LoadingSpinner } from '../components/LoadingSpinner';

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

        const response = await fetch('http://localhost:8000/api/users', {
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
        </div>
        <div className="profile-section">
          <h2>Shipping Address</h2>
          <form>
            <div className="form-group">
              <label htmlFor="formCity">City</label>
              <input type="text" id="formCity" defaultValue={profile.shippingAddress.city} />
            </div>
            <div className="form-group">
              <label htmlFor="formAddress">Address</label>
              <input type="text" id="formAddress" defaultValue={profile.shippingAddress.address} />
            </div>
            <button type="button" className="btn">Change Shipping Information</button>
          </form>
        </div>
        <div className="profile-section">
          <h2>Order History</h2>
          {profile.orderHistory.map((order, index) => (
            <div key={index} className="order-history-card">
              <h3>{new Date(order.date).toLocaleDateString()}</h3>
              {order.items.map((item, itemIndex) => (
                <p key={itemIndex}>
                  {item.name} <span className="float-right">{item.price}$</span>
                </p>
              ))}
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};
