import React from "react"
import ReactDom  from "react-dom"
import  App from "./components/App"
import { BrowserRouter } from "react-router-dom"
import  "./css/bootstrap.css"
import {  Provider  }  from "react-redux"
import {  createStore, applyMiddleware  }  from "redux"
import  rootReducer from "./reducer/rootReducer.js"
import  thunk from "redux-thunk"


const store = createStore(rootReducer, applyMiddleware(thunk) )              
window.store = store



var root = document.querySelector("#root")




ReactDom.render(
     <BrowserRouter >
        <Provider store = {store} >
          <App /> 
        </Provider>
     </BrowserRouter >,
     root
)