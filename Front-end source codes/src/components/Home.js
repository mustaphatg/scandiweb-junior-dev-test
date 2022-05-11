import React, {useState, useEffect} from "react"
import {  useSelector , useDispatch } from "react-redux"
import {  fetchPoducts , deleteProduct }  from "../actions/product.js"
import { Link   } from "react-router-dom"
import Product from "./Product.js"



const Home = props => {
    
    const dispatch = useDispatch()
    
    
    const product_list = useSelector( state => state.products.product_list )                       
    //console.log(product_list)
    
    
    // product selection list for mass deletiom
    const id_list = useSelector(state => state.products.product_selection_list)
    
    
    
    useEffect(() => {
        dispatch( fetchPoducts() )
    }, [])
    
    
    
    
    // mass deletion
    const massDelete = () => {
         id_list.forEach(function(id, index){
              dispatch( deleteProduct(id) )
         })
    }
    
    
    return (
        <>
          
          <nav className="header">
                <div className="brand">
                    <a href="/" >Product List</a>
                </div>
                
                <div className="actions">
                    <Link to="/add-product"  className="btn btn-outline-primary shadow-sm" >ADD</Link>
                    <button onClick={massDelete} id="delete-product-btn" className="btn btn-outline-danger shadow-sm" >MASS DELETE</button>                      
                </div>
           </nav>
        
          <div className="container mt-5">
               <div className="row">
                     {  
                         product_list.map((product, index) => <Product key={product.id} data={product} />  )              
                     }
               </div>
          </div>
        </>
    )
}



export default Home