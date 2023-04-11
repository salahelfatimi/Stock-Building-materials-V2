import AllControlesTable from "./AllControlesTable";
import React, { useState } from "react";
import Nav from "./NavAdmin";

export default function AllControlersPage() {
  const [searchName, setSearchName] = useState("");
  const [searchdate, setSearchdate] = useState("");
  
  var curenteDate = new Date();
  const month = curenteDate.getMonth()<10?`0${curenteDate.getMonth()+1}`:curenteDate.getMonth()+1
  const year = curenteDate.getFullYear()
  const date=year+"-"+month

  return (
    <div className=" ">
      <Nav />
      <div className="p-2  ">
        <section className="pb-2">
          <div className="flex  sm:justify-end gap-2">
            <div>
              <input
                className="bg-[#3C3D42]  h-9 rounded-xl sm:w-64 w-36 focus:outline none pl-2 text-white text-xs"
                type="text"
                onChange={(e) => setSearchName(e.target.value)}
                placeholder="Search for ..."
              />
            </div>
            <div className="flex  items-center">
              <input  type="month" id="start" name="start" min="2022-01" max={date} onChange={(e)=>setSearchdate(e.target.value)}  className="bg-[#3C3D42]  h-9 sm:w-60 text-center rounded-xl font-mono  font-medium focus:outline none  text-white text-xs"/>
            </div>
          </div>
        </section>
        <div className=" ">
          <AllControlesTable searchName={searchName} searchdate={searchdate}  />
        </div>
      </div>
    </div>
  );
}
