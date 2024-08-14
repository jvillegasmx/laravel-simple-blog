import '@css/app.css';
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Welcome from '@comps/Welcome.jsx';
import About from '@comps/About.jsx';    
import Navbar from '@comps/Navbar.jsx';
import Blog from '@comps/Blog.jsx';
import Header from '@comps/Header.jsx';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import.meta.glob([
    '../images/**',
]);

let title = import.meta.env.VITE_APP_NAME;
let subTitle = import.meta.env.VITE_ORG;


ReactDOM
    .createRoot(document.getElementById('app'))
    .render(<Router>
       <Header />
        <Routes>
            <Route path="/" element={<Welcome title={title} subTitle={subTitle} />} />
            <Route path="/about" element={<About title={title} subTitle={subTitle} />} /> 
            <Route path="/blog/:url" element={<Blog />} />
        </Routes>
    </Router>); 


// alert('Hello, Vite!');