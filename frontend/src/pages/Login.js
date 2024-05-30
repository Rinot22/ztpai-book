import React from 'react';
import '../css/Login.css';
import library from '../images/library.png'; // Ensure the image is in the src directory

export const Login = () => {
    return (
        <div className="login-container">
            <div className="login-form">
                <h2>Welcome back to<br/>Quirky Quill Publishers</h2>
                <h1>Login</h1>
                <form>
                    <div className="input-group">
                        <input placeholder='Email' type="email" required />
                    </div>
                    <div className="input-group">
                        <input placeholder='Password' type="password" required />
                    </div>
                    <div className="options">
                        <div>
                            <input type="checkbox" id="rememberMe" />
                            <label htmlFor="rememberMe">Remember me</label>
                        </div>
                        <a href="/registration">Forget Password?</a>
                    </div>
                    <button type="submit">Login</button>
                </form>
                <p>Don’t have an account? <a href="/registration">Get Started</a></p>
            </div>
            <div className="login-image" style={{ backgroundImage: `url(${library})` }}></div>
        </div>
    );
};
