import React from "react"
import { Routes, Route } from "react-router-dom"
import Home  from "./Home.js"
import AddProduct  from "./AddProduct.js"
import "./App.css"


const App = props => {
    
    return (
        <>
          <Routes>
               <Route path="/" element= { <Home />  }  />                     
               <Route path="/add-product" element= { <AddProduct />  }  />                     
          </Routes>
            
        </>
    )
}



export default App