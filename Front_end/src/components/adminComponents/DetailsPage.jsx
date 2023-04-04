import React, { useState } from "react";
import Nav from "./NavAdmin";
import DetailsPageTable from "./DetailsPageTable"
import EngineeringOutlinedIcon from '@mui/icons-material/EngineeringOutlined';
import LocationOnOutlinedIcon from '@mui/icons-material/LocationOnOutlined';
import MailOutlineRoundedIcon from '@mui/icons-material/MailOutlineRounded';
import WorkHistoryIcon from '@mui/icons-material/WorkHistory';
import {  useLocation } from "react-router-dom";
import PhoneIcon from '@mui/icons-material/Phone';
import axios from "axios";

export default function DetailsPage() {
 
  const [show, setShow] = useState(false);
  const [searchdate, setSearchdate] = useState("");
  const [searchbloc, setSearchbloc] = useState("");
  const [workerDetails , setWorkerDetails] = React.useState([])
  const [error , setError] = useState(false)
  const location = useLocation();
  
 
  const id = {id:parseInt(location.hash.slice(1))}
  const blocName = new URLSearchParams(location.search).get('bloc')

  React.useEffect(()=>{
    axios.post("http://127.0.0.1:8000/api/getControlerInfo",id).then(res=>{
      if(res.data.message === 'good'){
        setWorkerDetails(res.data.controlerinfo)
      }
    }).catch(err=>{
      console.error(err)
    })
  },[])

  var curenteDate = new Date();
  const month = curenteDate.getMonth()<10?`0${curenteDate.getMonth()+1}`:curenteDate.getMonth()+1
  const year = curenteDate.getFullYear()
  const date=year+"-"+month


 
    return (
      <div>
        <Nav />
        <div className="p-2">
          <section className="pb-2 flex flex-col md:items-center space-y-1 md:space-y-0 md:flex-row md:justify-between gap-2">
            <div className="flex items-center gap-4">
              <div className={blocName!==null ? "hidden":""}>
                <select defaultValue="all_bloc"  onChange={(e) => setSearchbloc(e.target.value)} className="bg-[#3C3D42] p-3  h-9 sm:w-64 text-center rounded-xl font-mono  font-medium focus:outline none  text-white text-xs ">
                  <option value=''>All Bloc</option>
                  {
                    workerDetails['daysworked']?.map((ele,index)=>(
                      <option value={ele.blocName} key={index}>{ele.blocName}</option>
                    ))
                  }
                </select>
              </div>
              <div className="flex gap-4 items-center">
              <input  type="month" id="start" name="start" min="2022-01" max={date} onChange={(e)=>setSearchdate(e.target.value)}  className="bg-[#3C3D42] p-3  h-9 sm:w-64 text-center rounded-xl font-mono  font-medium focus:outline none  text-white text-xs"/>
              </div>
            </div>
            <div>
            <button onClick={() => setShow(!show)} className="flex gap-1 items-center ">
                <span className="text-center font-mono font-extrabold text-white uppercase hover:text-[#b1b5ca]">
                  {workerDetails?.fullName}
                </span>
              </button>
              <div className={`absolute right-4  mt-4  bg-[#4C4D53] py-6 rounded-lg z-40  ${ show == false ? "hidden" : "block"}`}>
                <div className="space-y-1 px-3">
                  <div className="flex gap-2 items-center">
                      <PhoneIcon style={{'fontSize':"25px","marginRight":"5px","color":"#fff"}}/>
                      <span className="font-mono  text-white">
                        <span className="font-semibold">Phone:</span>  {workerDetails?.phoneNum}
                      </span>
                  </div>
                  <div className="flex gap-2 items-center">
                    <MailOutlineRoundedIcon style={{'fontSize':"25px","marginRight":"5px","color":"#fff"}}/>
                    <span className="font-mono  text-white">
                    <span className="font-semibold">Email:</span>  {workerDetails?.email}
                    </span>
                  </div>
                  <div className="flex gap-2 items-center">
                    <LocationOnOutlinedIcon style={{'fontSize':"25px","marginRight":"5px","color":"#fff"}}/>
                    <span className="font-mono  text-white">
                    <span className="font-semibold">Address:</span>  {workerDetails?.Address}
                    </span>
                  </div>
                  <div className="flex gap-2 items-center">
                    <EngineeringOutlinedIcon style={{'fontSize':"25px","marginRight":"5px","color":"#fff"}}/>
                    <span className="font-mono  text-white">
                    <span className="font-semibold">Specialty:</span>  {workerDetails?.speciality}
                    </span>
                  </div>
                  <div className="flex gap-2 items-center">
                    <WorkHistoryIcon style={{'fontSize':"25px","marginRight":"5px","color":"#fff"}}/>
                    <span className="font-mono  text-white">
                    <span className="font-semibold">Date start work:</span>  {workerDetails?.dateStart}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <DetailsPageTable searchbloc={searchbloc}  searchdate={searchdate}/>
        </div>
      </div>
    );
  }

