import React, {useState} from "react"
import ProductFactory from "./product/ProductFactoryComponent.js"
import  { useForm }  from "react-hook-form"
import  { saveProduct } from "../actions/product.js"
import { useNavigate } from "react-router-dom"
import {  useDispatch }  from "react-redux"
import {  useSelector }  from "react-redux"

const AddProduct = props => {
    
    const navigate = useNavigate()
    const dispatch = useDispatch()
    
    
    // react hook form
    const {register, handleSubmit, formState: { errors } }  = useForm()
    
    
    
    // product type ( default product type for select tag )
    const [product_type, setProductType] = useState("")
    
    
    
    // any error returned by the server conserning the product
    const [ product_error, setProductError ] = useState(null)
    
    
    
    
    // ProductTypeChanged
    const ProductTypeChanged = (event) => {
         var type = event.target.value
         setProductType(type)   // change product_type            
         console.log("Switched to" , type)
        
    }
    
   
   
   
      // submit product  form
    const submitForm = (data) => {
         
         data = { ...data, product_type }
         
         saveProduct(data)
         .then(response => {
              var data = response.data
              navigate(-1)
         })
         .catch(error => {
              var data = error.response.data
              setProductError(data.message)
         })
          
    }
   
   
   
   
    
   //  cancel button
   const onCancelClicked= () => {
       navigate(-1)
   }
    
    
    
    return (
        <>
        
          <nav className="header">
                <div className="brand">
                    <a href="" >Product List</a>
                </div>
                
                <div className="actions">
                    <button onClick={ handleSubmit(submitForm) } className="btn btn-outline-success">Save</button >
                    <button onClick={onCancelClicked} className="btn btn-outline-secondary" >Cancel</button >
                </div>
           </nav>
        
        
            <div className="container mt-5" >
            
               <form id="product_form" onSubmit={ handleSubmit(submitForm) } className="container-fluid" >                  
                    
                    
                    { product_error &&  <div className="text-danger text-center"> { product_error } </div> }
                    
                    
                    <div className="form-group row flex-wrap">
                         <label className="col-4" >SKU</label>
                         <input { ...register("sku", { required : true } ) }  id="sku" className="col form-control"  />
                         {errors.sku && <p className="error" >Please, submit required data</p>}
                    </div>
                    
                      
                    <div className="form-group row">
                         <label className="col-4" >NAME</label>
                         <input {  ...register("name", { required : true  } ) } id="name" className="col form-control"  />
                           {errors.name && <p className="error" >Please, submit required data </p>}
                    </div>
                    
                    <div className="form-group row">
                         <label  className="col-4" >PRICE ($) </label>
                         <input { ...register("price", { required : true })} id="price" type="number" className="col form-control" />
                           {errors.price && <p className="error" >Please, submit required data </p>}
                    </div>
                    
                    <div className="form-group row">
                         <label className="col-4" > Type Switcher</label>
                         <select { ...register("product_type", { required : true }) } value={product_type} onChange={ProductTypeChanged} id="productType" className="col form-control" >                                           
                              <option value="">Type Switcher</option>
                              <option>DVD</option>
                              <option>Book</option>
                              <option>Furniture</option>
                         </select>
                           {errors.product_type && <p className="error" >Please, submit required data</p>}
                    </div>
                    
                    
                    <ProductFactory register={register} errors={errors} productType={product_type}  />
                         
                    
               </form>
               
            </div>
        </>
    )
}



export default AddProduct