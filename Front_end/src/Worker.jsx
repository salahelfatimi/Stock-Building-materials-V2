import React from "react";
import {  Route, Routes } from "react-router-dom";
import ChoseProject from "./components/workerComponents/ChoseProject";
import ControllerPage from "./components/workerComponents/ControllerPage";
export default () => {
  return (
    <div>
      <div>
        <Routes>
          <Route path="*" element={<ChoseProject />} />
          <Route path="/controller-panel" element={<ControllerPage />} />
        </Routes>
      </div>
    </div>
  );
};
