import React from 'react';
import '../css/Registration.css';
import lib from '../images/library.png'

export const Registration = () => {
    return (
        <div className="registration-container">
            <div className="registration-form">
                <h2>Welcome to Quirky Quill Publishers</h2>
                <h1>Registration</h1>
                <form>
                    <div className="input-group">
                        <input placeholder='Email' type="email" required />
                    </div>
                    <div className="input-group">
                        <input placeholder='Password' type="password" required />
                    </div>
                    <div className="input-group">
                        <input placeholder='Confirm Password' type="password" required />
                    </div>
                    <div className="input-group">
                        <input placeholder='User Name' type="text" required />
                    </div>
                    <button type="submit">Register</button>
                </form>
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
            <div className="registration-image" style={{ backgroundImage: `url(${lib})` }}></div>
        </div>
    );
};
