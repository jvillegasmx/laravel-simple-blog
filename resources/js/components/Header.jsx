
import React from 'react';
import { Link } from 'react-router-dom';
export default function Header({}) {
    return ( <div className="text-center pt-10">
        <div className="flex justify-center text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">
            <a href="/" className="text-gray-900  dark:text-gray-400" >iEdux</a>
        </div>
    </div>);
};