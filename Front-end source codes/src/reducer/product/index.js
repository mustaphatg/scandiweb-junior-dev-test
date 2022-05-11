
import {    
     DELETE_PRODUCTS, SET_PRODUCT_DATA, SELECT_PRODUCT,  UN_SELECT_PRODUCT                        
} from "../../types"


const init = {
    product_list : [],
    product_selection_list : []
}




function productReducer(state = init, action){
    
    
    const {  type, payload  } = action
    
    // SET_PRODUCT_DATA
    if(type === SET_PRODUCT_DATA ){
        return  {
            ...state,
            product_list : [ ...payload.data]
        }
    }
    
    
    // SELECT_PRODUCT
    if(type === SELECT_PRODUCT ){
        return {
            ...state,
            product_selection_list : [ ...state.product_selection_list, payload.id ]
        }
    
    }
    
    
    
    // UN_SELECT_PRODUCT
    if(type === UN_SELECT_PRODUCT ){
        
        // get index of product id
        var index = state.product_selection_list.indexOf(payload.id)
        
        // remove 
        var list = state.product_selection_list
        list.splice(index, 1)
        
        return {
            ...state,
            product_selection_list : list
        }
    }
    
    
    
    
    
    return state
    
}


export default productReducer