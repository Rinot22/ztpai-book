import React, { Fragment } from "react";
import { Header } from "../components/Header";
import { useQuery } from "@tanstack/react-query";

export const Authors = () => {
    const {data, isLoading} = useQuery({ queryKey: ['authors'], queryFn: () => fetch("http://127.0.0.1:8000/api/books") })

    console.log(data)
    // 
    return (
        <div>
            <Header />
            {!isLoading && data.map((item, index) => {
                return <Fragment key={index}>
                    {JSON.stringify(item)}
                </Fragment>
            })}
        </div>
    );
}