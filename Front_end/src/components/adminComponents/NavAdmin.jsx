import CircularProgress, {circularProgressClasses} from '@mui/material/CircularProgress';
import ArrowBackIosNewRoundedIcon from '@mui/icons-material/ArrowBackIosNewRounded';
import { NavLink , useNavigate  } from "react-router-dom";
import { useState ,useRef, useEffect } from "react";
import adduser from "../../assets/add-user.png";
import setting from "../../assets/setting.png";
import logout from "../../assets/logout.png";
import user from "../../assets/user.png";
import Box from '@mui/material/Box';
import axios from "axios";

// Inspired by the former Facebook spinners.
function FacebookCircularProgress(props) {
  return (
    <Box sx={{ position: 'relative' }}>
      <CircularProgress
        variant="determinate"
        sx={{
          color: (theme) =>
            theme.palette.grey[theme.palette.mode === 'light' ? 200 : 800],
        }}
        size={25}
        thickness={4}
        {...props}
        value={100}
      />
      <CircularProgress
        variant="indeterminate"
        disableShrink
        sx={{
          color: (theme) => (theme.palette.mode === 'light' ? '#1a90ff' : '#308fe8'),
          animationDuration: '550ms',
          position: 'absolute',
          left: 0,
          [`& .${circularProgressClasses.circle}`]: {
            strokeLinecap: 'round',
          },
        }}
        size={25}
        thickness={4}
        {...props}
      />
    </Box>
  );
}

export default function Nav({reloadInChanges}) {
  const [show, setShow] = useState(false);
  const [adminInfo , setAdminInfo] = useState([])
  const navigate = useNavigate();

  // this function execute whene you click on Back button
  const goBackMethod = () => {
    navigate(-1);
  };

  // get admin information from db
  useEffect(()=>{
    axios.get('http://127.0.0.1:8000/api/getAdminInfo').then((response) => {
        setAdminInfo(response.data)
      }).catch((error)=> {
        console.log(error);
      });
  },[reloadInChanges])

  // this for open and close the drop down 
  const ref = useRef(null);
  const handleClickOutside = (event) => {
    if (ref.current && !ref.current.contains(event.target)) {
      // if The user clicked outside the component
      setShow(false);
    }
  };

  useEffect(() => {
    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  return (
    
    <div className="p-2 relative ">
      <div className="w-full bg-[#1F2025] p-3 rounded-lg flex justify-between items-center">
        <div className="flex md:gap-7 gap-4 items-center">
          <div className="flex  items-center text-center ">
            <NavLink onClick={goBackMethod} className="md:block hidden">
              <div className=" flex items-center justify-center bg-[#3C3D42] rounded-full py-2 px-2 transition duration-700 ease-in-out">
                <ArrowBackIosNewRoundedIcon className="text-white" fontSize="15px" />
                <span className=" text-white font-mono ">Back</span>
              </div>  
            </NavLink>
          </div>
          <div className="flex flex-col text-white">
            {
            adminInfo.length > 0
            ?
              <NavLink to="../MyAccount">
                <span className="font-mono font-bold ">{`${adminInfo[0]["ferst_name"]} ${adminInfo[0]["last_name"]}`}</span>
              </NavLink>
            :
              <span className="font-mono font-bold "><FacebookCircularProgress /></span>
            }
            <span className="font-mono font-thin text-[#84858b]">Administrator</span>
          </div>
        </div>
        <div className="flex">
          <button onClick={()=>setShow(!show)} >
            <img src={setting} alt="" className="w-12 " />
          </button>
          <div ref={ref}
            className={`absolute right-10 sm:-bottom-40 -bottom-36   bg-[#4C4D53] py-6 rounded-lg z-40  ${
              show == false ? "hidden" : "block"
            }`}
          >
            <NavLink to="../MyAccount" className="flex items-center gap-2 px-6 py-1 mb-1 hover:bg-[#696b73]">
              <img src={user} alt="" className="w-6" />
              <span className="text-center font-mono font-bold text-white sm:text-xl">My Account</span>
            </NavLink>
            
            <NavLink to={"../AddNewControler"} className="flex items-center gap-2 px-6 py-1 mb-1 hover:bg-[#696b73]">
              <img src={adduser} alt="" className="w-6" />
              <span className="text-center font-mono font-bold text-white sm:text-xl">Add new controler</span>
            </NavLink>
            <a href="/" onClick={()=>localStorage.removeItem("AdminToken")} className="flex items-center gap-2 px-6 py-1 hover:bg-[#696b73]">
              <img src={logout} alt="" className="w-6" />
              <span className="text-center font-mono font-bold text-white sm:text-xl">Logout</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  );
}
