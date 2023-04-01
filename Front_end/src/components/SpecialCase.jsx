import { Link, useNavigate } from "react-router-dom";
import LogoutRoundedIcon from '@mui/icons-material/LogoutRounded';
import RedoRoundedIcon from '@mui/icons-material/RedoRounded';

function SpecialCase({who}) {
    const navigate = useNavigate();

    const AdminLogout=()=>{
        localStorage.removeItem("AdminToken")
        navigate("/")
        window.location.reload()
    }
    const WorkerLogout=()=>{
        localStorage.removeItem("WorkerToken")
        localStorage.removeItem("id")
         navigate("/")
        window.location.reload()
    }
    return (
        <div className=" flex  justify-center items-center h-60 text-white p-4">
            <div className=" space-y-8 ">
                <div>
                    {
                        who === "worker"
                        ?
                        <>
                            <h1 className=" text-center font-extrabold font-mono text-3xl">
                                This location `/` is empty
                            </h1>
                            <div className="flex items-center justify-evenly mt-10">
                                <button onClick={()=>WorkerLogout()} className="flex items-center bg-[#6e92e8] text-white p-2 rounded-md font-medium hover:bg-[#4774dc] transition duration-300">
                                    Logout
                                    <LogoutRoundedIcon style={{"fontSize":"28px" , "marginLeft":"5px"}} />
                                </button>
                                <Link to={`/worker/#${localStorage.getItem("id")}`} className="flex items-center bg-[#93FBA4] hover:bg-[#62ef7a] text-black p-2 rounded-md font-medium transition duration-300">
                                    <button>
                                        Go back
                                        <RedoRoundedIcon style={{"fontSize":"28px" , "marginLeft":"5px"}}/>
                                    </button>
                                </Link>
                            </div>
                        </>
                        :
                        <>
                            <h1 className=" text-center font-extrabold font-mono text-3xl">
                                This location `/` is empty
                            </h1>
                            <div className="flex items-center justify-evenly mt-10">
                                <button onClick={()=>AdminLogout()} className="flex items-center bg-[#6e92e8] text-white p-2 rounded-md font-medium hover:bg-[#4774dc] transition duration-300">
                                    Logout
                                    <LogoutRoundedIcon style={{"fontSize":"28px" , "marginLeft":"5px"}} />
                                </button>
                                <Link to="/admin" className="flex items-center bg-[#93FBA4] hover:bg-[#62ef7a] text-black p-2 rounded-md font-medium transition duration-300">
                                    <button>
                                        Go back
                                        <RedoRoundedIcon style={{"fontSize":"28px" , "marginLeft":"5px"}}/>
                                    </button>
                                </Link>
                            </div>
                        </>
                    }
                </div>
            </div>
        </div>
  )
}

export default SpecialCase