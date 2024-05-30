import React, {useState} from 'react';
import '../css/Login.css';
import library from '../images/library.png';

export const Login = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');

    const handleSubmit = async (e) => {
        e.preventDefault();
        
        setError('');

        try {
            const response = await fetch('http://localhost:8000/api/login_check', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email: email, password: password }),
            });

            if (!response.ok) {
                throw new Error('Invalid credentials');
            }

            const data = await response.json();
            localStorage.setItem('token', data.token); 

            console.log('Logged in successfully', data.token);
        } catch (error) {
            setError(error.message);
        }
    };


    return (
        <div className="login-container">
            <div className="login-form">
                <h2>Welcome back to<br/>Quirky Quill Publishers</h2>
                <h1>Login</h1>
                <form onSubmit={handleSubmit}>
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
                    <div className="options">
                        <div>
                            <input type="checkbox" id="rememberMe" />
                            <label htmlFor="rememberMe">Remember me</label>
                        </div>
                        <a href="/register">Forget Password?</a>
                    </div>
                    <button type="submit"><a href='/'>Login</a></button>
                </form>
                {error && <p style={{ color: 'red' }}>{error}</p>}
                <p>Don’t have an account? <a href="/register">Get Started</a></p>
            </div>
            <div className="login-image" style={{ backgroundImage: `url(${library})` }}></div>
        </div>
    );
};
