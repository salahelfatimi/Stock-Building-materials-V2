import React, { useState } from "react";
import Nav from "./NavAdmin";
import BlocTable from "./BlocTable"

export default function BlocPage() {
  const [searchNmame, setSearchName] = useState("");
  
  return (
    <div>
      <Nav />
      <div>
        <div className="p-2  ">
          <section className="pb-2">
            <div className="flex   gap-3">
              <div>
                <input
                  className="bg-[#3C3D42] pl-2 h-9 rounded-xl sm:w-64  focus:outline none p-1 text-white text-xs"
                  type="text"
                  onChange={(e) => setSearchName(e.target.value)}
                  placeholder="Search for bloc ... "
                />
              </div>
            </div>
          </section>
          <BlocTable searchnmame={searchNmame}/>
        </div>
      </div>
    </div>
  );
}
