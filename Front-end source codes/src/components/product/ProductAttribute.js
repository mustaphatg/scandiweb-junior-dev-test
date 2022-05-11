import React from "react"


const ProductAttribute = props => {
    
    const { data } = props
    
    return (
        <>
            { data.weight && <span >Weight : { data.weight }KG </span> }            
            { data.size && <span >Size : { data.size } MB</span> }            
            { data.height && <span >Dimensions : {data.height}x{data.width}x{data.length} </span> }            
        </>
    )
}



export default ProductAttribute