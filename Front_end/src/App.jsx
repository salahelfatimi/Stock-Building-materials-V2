import React from "react";
import Worker from "./Worker";
import Admin from "./Admin";
import {  Route, Routes } from "react-router-dom";
import Login from "./components/Login";
import SpecialCase from "./components/SpecialCase";

function App() {
  return (
    <div >
      
        {/* <Routes>
            <Route path="/admin/*" element={<Admin />} />
            <Route exact path="/worker/*" element={<Worker />} />
            <Route exact path="*" element={<Login />} />
          </Routes> */}
      {
        localStorage.getItem("AdminToken")
        ?
          <Routes>
            <Route path="/admin/*" element={<Admin />} />
            <Route path="/" element={<SpecialCase who="admin"/>} />
          </Routes>
        :
          localStorage.getItem("WorkerToken")
          ?
            <Routes>
              <Route exact path="/worker/*" element={<Worker />} />
              <Route exact path="/" element={<SpecialCase who="worker" />} />
            </Routes>
          :
            <Routes>
              <Route exact path="/*" element={<Login />} />
            </Routes>
      }
    </div>
  );
}

export default App;
