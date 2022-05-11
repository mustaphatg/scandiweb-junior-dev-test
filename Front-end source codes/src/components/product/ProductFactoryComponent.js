import React from "react"
import { BookForm, DVDForm, FurnitureForm } from "./forms.js"                   




// used this key : value object so as to prevent 
// the use of if/else


export const ProductForms  = {
     Book : BookForm,
     DVD : DVDForm,
     Furniture : FurnitureForm
}




const ProductFactory = props => {
    
    const { productType , register , errors} = props
    
    //console.log(productType)
    
    const Form = ProductForms[productType]
    
    if(Form){
         return <Form  errors= { errors }   register={register} />
    }
    
    return null
    
}



export default ProductFactory