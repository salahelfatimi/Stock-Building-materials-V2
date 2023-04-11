import Controler from "../../assets/Controller.png";
import building from "../../assets/buildings.png";
import { NavLink} from "react-router-dom";
import React from "react";

export default function OptionsPage() {
  return (
    <div className="px-4  container mx-auto">
      <div className="grid  grid-cols-1 md:grid-cols-2 py-1 md:h-screen items-center gap-20">
        <NavLink to={"../AllControlers"}   className=" bg-[#1F2025] hover:bg-[#313239] transition duration-300 space-y-10 py-28   rounded-lg shadow-2xl ">
          <div className="w-52 m-auto">
            <img src={Controler} alt="" />
          </div>
          <div className=" text-center text-white font-mono font-extrabold text-3xl">
            <span>Controller</span>
          </div>
        </NavLink>
        <NavLink to={"../Blocpage"}   className=" bg-[#1F2025] hover:bg-[#313239] transition duration-300 space-y-10 py-28 rounded-lg shadow-2xl ">
          <div className="w-52 m-auto">
            <img src={building} alt="" />
          </div>
          <div className=" text-center text-white font-mono font-extrabold text-3xl">
            <span>Apartment complex</span>
          </div>
        </NavLink>
      </div>
    </div>
  );
}
