import React, { useState } from "react"
import { useDispatch } from "react-redux"
import { addToSelected, removeFromSelected } from "../actions/product.js"
import  ProductAttribute from "./product/ProductAttribute.js"



const Product = props => {

    const data = props.data
    const { id, name, sku, price} = data



    const dispatch = useDispatch()

    const [isSelected, setIsSelected] = useState(false)


    // function to select product and add it to the " selected global list for mass deletion "
    const selectProduct = () => {
        
        setIsSelected(function(selected) {
            var flag = !selected

            if (flag) {
                dispatch( addToSelected(id) )    // add to global list
            } else {
                dispatch( removeFromSelected(id) )     // remove fron global list
            }

            return flag
        })
    }


     

    return (
        <>
            <div className="col-12 col-md-3 my-2">
               
                <div className="border rounded p-3">
                   
                    <div className="flex justify-content-start my-1">
                        <input className="delete-checkbox" type="checkbox" checked={isSelected} onChange={selectProduct} />                 
                    </div>
                    
                    <div className="product-info w-100  text-center" >
                         <span  > { sku } </span>
                         <span> { name } </span>
                         <span> { price } $</span>
                         <ProductAttribute data={data} />
                    </div>
                    
                </div>
                
            </div> 
        </>
    )
}



export default Product