import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from 'axios';

export default function Login() {
  const navigate = useNavigate();
  const [loginData , setLoginData] =useState({ username:"", password:"" });
  const [valid , setValid] = useState(true)
  const [error , setError] = useState({ "username" : '' , "password"  : ''})

  const handlChange=(e)=>{
    const name=e.target.name;
    const value=e.target.value;
    setLoginData((prev)=>(
      {...prev , [name]:value}
    ))
  }

  function handelSbmite(){

    const form = document.forms[0]
    if(form.username.value==='' || form.password.value===''){
      if(form.username.value===''){
        setError({'username':'enter your username '})
      }else if(form.password.value===''){
        setError({'password':'enter your password '})
      }
    }
   
    axios.post("http://127.0.0.1:8000/api/login",loginData).then((res)=>{
      if(res.data.success === false){
        setValid(false)
      }
      else{
        setValid(true)
        if(res.data.whoLogged === "admin"){
          navigate("/admin")
          localStorage.setItem("AdminToken",res.data.token)
          window.location.reload()
        }else if(res.data.whoLogged === "controler"){
          navigate(`/worker/#${res.data.idControler}`)
          localStorage.setItem("WorkerToken",res.data.token)
          localStorage.setItem("id",res.data.idControler)
          window.location.reload()
        }
      }
    }).catch((err)=>{
      console.log(err)
    })
  }

  return (
    <div className=" flex  justify-center items-center h-screen text-white p-4">
      <div className=" space-y-4 ">
     
        <div>
          <h1 className=" text-center font-extrabold font-mono text-3xl">
            Login
          </h1>
        </div>
        {
          valid === false 
          ?
            <ul  className=" bg-[#f31c40] px-10 py-2  rounded-md font-semibold text-center">
              <li>incorrect username or password<span className=" block ">try again</span></li>
            </ul>
          : 
            null
        }
       
        <form  className="space-y-4">
          <div>
            <label htmlFor="username" className=" text-lg font-mono ">
              Username :
            </label>
            <input
              onChange={(e)=>handlChange(e)}
              type="text"
              id="username"
              name="username"
              className="bg-[#4B484C] w-full h-10 rounded-md pl-2 focus:outline-none"
              autoComplete="off"
              required
            />
             <div>{error.username}</div>
          </div>
          <div>
            <label htmlFor="password" className=" text-lg font-mono ">
              Password :
            </label>

            <input
              onChange={(e)=>handlChange(e)}
              type="password"
              id="password"
              name="password"
              className="bg-[#4B484C] w-full h-10 rounded-md pl-2 focus:outline-none"
              required
            />
           <div>{error.password}</div>
          </div>
        </form>
        <div className="float-right">
            <button onClick={handelSbmite} 
              className="bg-[#93FBA4] hover:bg-[#62ef7a] text-black py-2 px-8 rounded-md text-base font-medium transition duration-300">
              Login
            </button>
          </div>
      </div>
    </div>
  );
}
