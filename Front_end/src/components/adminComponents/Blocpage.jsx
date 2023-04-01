import React, { useState } from "react";
import Nav from "./NavAdmin";
import BlocTable from "./BlocTable"

export default function BlocPage() {
  const [searchNmame, setSearchName] = useState("");
  const [searchbloc, setSearchbloc] = useState("");
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
              {/* <div className="flex gap-4 items-center">
                <select
                  defaultValue="all_bloc"
                  onChange={(e) => setSearchbloc(e.target.value)}
                  className="bg-[#3C3D42] p-3  h-9 sm:w-44 text-center rounded-xl font-mono  font-medium focus:outline none  text-white text-xs"
                >
                  <option value="all_bloc">All Bloc</option>
                  <option value="1">1</option>
                </select>
              </div> */}
            </div>
          </section>
          <BlocTable searchnmame={searchNmame}/>
        </div>
      </div>
    </div>
  );
}
