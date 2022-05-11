import axios from "axios"

import {
    DELETE_PRODUCTS,
    SET_PRODUCT_DATA,
    SELECT_PRODUCT,
    UN_SELECT_PRODUCT    
} from "../types"





const link = ""




/*

  fetch & set products

*/
export function setProductData(data) {
    return {
        type: SET_PRODUCT_DATA,
        payload: { data }
    }
}



export function fetchPoducts() {
    
    return dispatch => {
        
        axios.get(link+"/api/product/all")
        .then(products => {
             //console.log(products)
            dispatch( setProductData(products.data) )
        })
        .catch(er => console.log()  )
        
    }
}




// save product
export function saveProduct(data){
     
    // return dispatch => {
          
     return axios.post(link+"/api/product/store", data)
          
          
     //}

}


/*    ////////////////////////                  */









/*

    Add & remove from global selection list

*/

export function addToSelected(id){
    return {
        type : SELECT_PRODUCT,
        payload : { id }
    }
}


export function removeFromSelected(id){
    return {
        type : UN_SELECT_PRODUCT,
        payload : { id }
    }
}

/*    ////////////////////////                  */













/*

    Delete product

*/


// set 




//delete product
export function deleteProduct(id){

     return dispatch => {
      
        axios.get(link+"/api/product/delete?id="+id)
        .then(products => {
             //console.log(products)
             console.log("remove ", id)
             
             removeFromSelected(id)
            dispatch( fetchPoducts() )                      
        })
        .catch(er => console.log(er) )
        
    }
}



