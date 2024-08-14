import React, { useEffect, useState } from 'react';
import { useParams, useLocation,useNavigate } from 'react-router-dom';
import axios from 'axios';

export default function Blog() {

    const title = 'Blog';
    const subTitle = 'Welcome to the blog page';
    const  {url} = useParams();
    const location = useLocation();
    const queryParams = new URLSearchParams(location.search);
    const [data, setData] = useState({});
    const [loading, setLoading] = useState(true);
    //get article data trought ajax vcall 

    console.log(url);

    useEffect(() => {
        //call api to retrieve data /article/{url}
        setLoading(true);
        axios.get(`/api/v1/article/${url}`).then((response) => {
            console.log(response.data);
            setData(response.data);
            setLoading(false);
        });
    }, [url ]);


    console.log(data);

    const navigate = useNavigate();

    const handleBackClick = () => {
        navigate(-1)
    };


    return (<>
       <div className="max-w-full			 mx-auto  ">
                {loading ? (
                    <p>Loading...</p>
                ) : (
                    <>
                       <div className="flex justify-left text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white mt-6">
                            {data.article.title}
                        </div>
                        <dl className="flex justify-left text-2xl">
                            <dt className="sr-only">Publicado</dt>
                            <dd className="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                <time dateTime="2023-08-05T00:00:00.000Z">{data.article.published_at}  </time>
                            </dd>
                        </dl>
                        <div className="flex flex-wrap  text-gray-900 dark:text-gray-400">
                            
                            
                        </div>
                        
                        <div className="mt-4 ">
                                <article className="flex flex-col space-y-2 xl:space-y-0 mt-4">
                                    
                                    <div className="space-y-3">
                                    </div>
                                
                                    <div className="prose max-w-none text-gray-900 dark:text-gray-900">
                                    <div dangerouslySetInnerHTML={{ __html: data.article.content }} />
                                    </div>
                                    <div className="space-y-3">
                                    </div>
                                
                                    
                                </article>                                    
                        </div>

                        <div className="flex justify-center space-x-2 pt-4">
                            <button onClick={handleBackClick} className="px-4 py-2 bg-gray-300 rounded disabled:opacity-50">
                                Back to Blog
                            </button>

                          
                        </div>


                    </>
                )}




                
        </div>
       
    </>);
};