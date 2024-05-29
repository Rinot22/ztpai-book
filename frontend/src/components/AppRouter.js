import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from '../pages/Home';
import Shop from '../pages/Shop';
import News from '../pages/News';
import Authors from '../pages/Authors';
import Login from '../pages/Login';

export const AppRouter = () => {
    return (
        <Router>
            <Routes>
                <Route path='/' element={<Home/>}/>
                <Route path='/shop' element={<Shop/>}/>
                <Route path='/news' element={<News/>}/>
                <Route path='/authors' element={<Authors/>}/>
                <Route path='/login' element={<Login/>}/>
            </Routes>
        </Router>
    );
}


