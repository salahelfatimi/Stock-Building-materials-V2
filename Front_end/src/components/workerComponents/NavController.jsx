import Navcontr from "../../assets/Navcontr.png";
import logout from "../../assets/logout.png"
import { useNavigate } from "react-router-dom";


export default function Nav({fullName , speciality}) {
  const navigate = useNavigate();

  const Logout=()=>{
    localStorage.removeItem("WorkerToken")
    localStorage.removeItem("id")
  }

  return (
    <div className="p-4 relative ">
      <div className="w-full bg-[#1F2025] p-3 rounded-lg flex justify-between items-center">
        <div className="flex gap-4">
          <div className=" flex items-center">
            <img
              src={Navcontr}
              alt=""
              className="w-12 sm:block hidden  bg-[#93FBA4] rounded-full"
            />
          </div>
          <div className="flex flex-col text-white">
            <span className="font-mono font-bold">
              {fullName}
            </span>
            <span className="font-mono font-thin text-[#84858b]">{speciality}</span>
          </div>
        </div>
        <div className="flex">
          <a href="/">
          <button onClick={()=>Logout()} className="bg-[#6e92e8] text-white w-full gap-1 justify-between	 p-2 rounded-md flex items-center font-medium hover:bg-[#4774dc] transition duration-300">
            <span className="md:block hidden">Logout</span>
            <img src={logout} alt="" className="w-6  "/>
          </button>
          </a>
        </div>
      </div>
    </div>
  );
}
