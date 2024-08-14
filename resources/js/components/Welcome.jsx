import logo from '@images/logo.png';
import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';

export default function Welcome({title, subTitle}) {

    //CALL API TO RETRIEVE DATA
    // Add pagination


    const [data, setData] = useState({ articles: [] });
    const [loading, setLoading] = useState(true);
     const location = useLocation();

        useEffect(() => {
            const queryParams = new URLSearchParams(location.search);
            const page = queryParams.get('page') || 1;
            setLoading(true);
            axios.get(`/api/v1/articles?page=${page}`).then((response) => {
                setData(response.data);
                setLoading(false)
            });
        }, [location.search]);
    
        //RENDER DATA
        return (<>
           
            
            <div className="mt-16 ">
                {loading ? (
                    <p>Loading...</p>
                ) : (
                    data.articles.map((article) => (

                        <article className="flex flex-col space-y-2 xl:space-y-0 mt-8" key={`${article.url}`} >
                            <dl>
                                <dt className="sr-only">Publicado</dt>
                                <dd className="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                    <time dateTime=""> {article.created_at}</time>
                                </dd>
                            </dl>
                            <div className="space-y-3">
                            
                                <h2 className="text-2xl font-bold leading-8 tracking-tight">
                                    <a className="text-gray-900 dark:text-gray-100" href={`/blog/${article.url}`} >{article.title}</a>
                                </h2>
                                <div className="flex flex-wrap">
                                {article.short_content}
                                    
                                </div>
                                <div className="prose max-w-none text-gray-500 dark:text-gray-400">
                                    <p></p>
                                </div>
                                <div className="space-y-3">
                                </div>
                                <a href={`/blog/${article.url}`} className="text-gray-900 underline dark:text-gray-400" >
                                    Sigue Leyendo
                                </a>
                            </div>

                            
                            
                        </article>



                       
                    ))
                )}
            </div>

            <div className="flex justify-center space-x-2 pt-4">
                <button
                    onClick={() => handlePageChange(data.page - 1)}
                    disabled={data.page <= 1}
                    className="px-4 py-2 bg-gray-300 rounded disabled:opacity-50"
                >
                    Previous
                </button>
                <span className="px-4 py-2 bg-gray-300 rounded disabled:opacity-50">Page {data.page} of {data.totalPages}</span>
                <button
                    onClick={() => handlePageChange(data.page + 1)}
                    disabled={data.page >= data.totalPages}
                    className="px-4 py-2 bg-gray-300 rounded disabled:opacity-50"
                >
                    Next
                </button>
            </div>

        </>);
   
};