import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Home } from '../pages/Home';
import { Login } from '../pages/Login';
import { Cart } from '../pages/Cart';
import { Profile } from '../pages/Profile';
import { Shop } from '../pages/Shop';
import { News } from '../pages/News';
import { Authors } from '../pages/Authors';
import { Author } from '../pages/Author';
import { Registration } from '../pages/Registration'
import { Book } from '../pages/Book';
import { SingleNews } from '../pages/SingleNews'; 

export const AppRouter = () => {
    return (
        <Router>
            <Routes>
                <Route path='/' element={<Home/>}/>
                <Route path='/shop' element={<Shop/>}/>
                <Route path='/news' element={<News/>}/>
                <Route path='/authors/:id' element={<Author/>}/>
                <Route path='/authors' element={<Authors/>}/>
                <Route path='/login' element={<Login/>}/>
                <Route path='/register' element={<Registration/>}/>
                <Route path='/profile' element={<Profile/>}/>
                <Route path='/books/:id' element={<Book/>}/>
                <Route path='/cart' element={<Cart/>}/>
                <Route path='news/:id' element={<SingleNews/>}/>
            </Routes>
        </Router>
    );
}


