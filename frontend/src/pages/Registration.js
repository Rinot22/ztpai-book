import React, { useState } from 'react';
import '../css/Registration.css';
import lib from '../images/library.png';

export const Registration = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [repeatedPassword, setConfirmedPassword] = useState('');
    const [username, setUsername] = useState('');
    const [error, setError] = useState('');

    const handleRegister = async (e) => {
        e.preventDefault();

        if (password !== repeatedPassword) {
            setError('Passwords do not match');
            return;
        }

        try {
            const response = await fetch('http://localhost:8000/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password, repeatedPassword, username }),
            });

            if (!response.ok) {
                throw new Error('Failed to register');
            }

            const data = await response.json();
            localStorage.setItem('token', data.token);
            setError('');
        } catch (error) {
            setError(error.message);
        }
    };

    return (
        <div className="registration-container">
            <div className="registration-form">
                <h2>Welcome to Quirky Quill Publishers</h2>
                <h1>Registration</h1>
                <form onSubmit={handleRegister}>
                    <div className="input-group">
                        <input
                            placeholder='Email'
                            type="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <input
                            placeholder='Password'
                            type="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <input
                            placeholder='Confirm Password'
                            type="password"
                            value={repeatedPassword}
                            onChange={(e) => setConfirmedPassword(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <input
                            placeholder='User Name'
                            type="text"
                            value={username}
                            onChange={(e) => setUsername(e.target.value)}
                            required
                        />
                    </div>
                    <button type="submit"><a href='/'>Register</a></button>
                </form>
                {error && <p style={{ color: 'red' }}>{error}</p>}
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
            <div className="registration-image" style={{ backgroundImage: `url(${lib})` }}></div>
        </div>
    );
};
