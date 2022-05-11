import React from "react"




export const BookForm = props => {
    
const {  register, errors} = props
    
    return (
        <>
                   
               <div className="form-group row">
                    <label className="col-4" >Weight (KG)</label>
                    <input  { ...register("weight", { required : true })}  type="number" id="weight" className="col form-control"  />           
                      {errors.weight && <p className="error" >Please, submit required data</p>}
                      <small className="form-text text-info w-100 text-center" >Please, provide weight</small>
               </div>
        </>
    )
}







export const DVDForm = props => {
    
    const {  register, errors} = props
    
    return (
        <>
                   
               <div className="form-group row">
                    <label className="col-4" >Size (MB)</label>
                    <input  { ...register("size", { required : true })} type="number" id="size" className="col form-control" />              
                      {errors.size && <p className="error" >Please, submit required data</p>}
                      <small className="form-text text-info w-100 text-center" >Please, provide size</small>
               </div>
        </>
    )
}









export const FurnitureForm = props => {
    
    const {  register, errors} = props
    
    return (
        <>
                   
               <div className="form-group row">
                    <label className="col-4" >Height (CM)</label>
                    <input  { ...register("height", { required : true })} type="number" id="height" className="col form-control"  />  
                      {errors.height && <p className="error" >Please, submit required data</p>}
                    <small className="form-text text-info w-100 text-center" >Please, provide height</small>
               </div>
               
               <div className="form-group row">
                    <label className="col-4" >Width (CM)</label>
                    <input  { ...register("width", { required : true })}  type="number" id="width" className="col form-control" />  
                    <small className="form-text text-info w-100 text-center" >Please, provide width</small>
                    {errors.width && <p className="error" >Please, submit required data</p>}
               </div>
               
               <div className="form-group row">
                    <label className="col-4" >Length (CM)</label>
                    <input  { ...register("length", { required : true })} type="number" id="length" className="col form-control"  />    
                    <small className="form-text text-info w-100 text-center" >Please, provide length</small>
                    {errors.length && <p className="error" >Please, submit required data</p>}
               </div>
        </>
    )
}

