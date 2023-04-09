import React, { useState } from "react";
import NavAdmin from "./NavAdmin";
import next from "../../assets/next.png"
import Snackbar from '@mui/material/Snackbar';
import MuiAlert from '@mui/material/Alert';
import axios from "axios";


const Alert = React.forwardRef(function Alert(props, ref) {
  return <MuiAlert elevation={6} ref={ref} variant="filled" {...props} />;
});

export default function AddNewControler() {
  /*----------this state for show the access message----------*/
  const [open, setOpen] = React.useState(false);

  const handleClose = (event, reason) => {
    if (reason === 'clickaway') {
      return;
    }
    setOpen(false);
  };
   /*-------------------------end-----------------------------*/


   var curenteDate = new Date();
   const day=curenteDate.getDate()<10?`0${curenteDate.getDate()}`:curenteDate.getDate()
   const month = curenteDate.getMonth()<10?`0${curenteDate.getMonth()+1}`:curenteDate.getMonth()+1
   const year = curenteDate.getFullYear()
   const date=year+"/"+month+"/"+day

  const [dataControler , setDataControler] = useState({
    fullName:"",
    idCard:"",
    address:"",
    specialty:"",
    phoneNumber:"",
    email:"",
    dateStart:date
  })
  const [nextStep , setNextStep]=useState(false)

  // this function it's execute whene admin make changes in inputs field in the ferst step
  const handlInputChangeInStepOne =(e)=>{
    const name = e.target.name
    const value = e.target.value
    setDataControler((prev)=>({
      ...prev , [name]:value
    }))
  }

  // this execute whene admin click on button next step 
  const handlNextStep =(e)=>{
    e.preventDefault();
    if(dataControler.fullName !== "" && dataControler.idCard !== "" && dataControler.address !== "" && 
      dataControler.specialty !== "" && dataControler.phoneNumber !== "" && dataControler.email !== ""){
        setNextStep(true)
    }
  }

  // this state to store the username and password data
  const [dataLogin , setDataLogin] = useState({
    username:"",
    password:""
  })

  // this function it's execute whene admin make changes in inputs field in the last step
  const handlChangesInStepTwo=(e)=>{
    const name = e.target.name
    const value = e.target.value
    setDataLogin((prev)=>({
      ...prev , [name]:value , idCard:dataControler.idCard
    }))
  }

  // this to handl the error and the seccess
  const [dataReturn , setDataReturn] = useState(null)

  // this execute whene admin click on button add new controler
  const AddNewController= async (e)=>{
    e.preventDefault();
    await axios.post("http://127.0.0.1:8000/api/addControler",{dataControler:dataControler , dataLogin:dataLogin})
    .then((res)=>{
      setDataReturn(res.data)
    }).catch((err)=>{
      console.log(err)
    })
    setOpen(true);
    setNextStep(false)
  }

  return (
    <div>
      <NavAdmin />
      <div className="">
        <div className=" items-center flex flex-col">
          <div className=" flex flex-col gap-4 ">
            <div className=" text-white mt-2">
              <h1 className=" font-mono font-extrabold text-xl text-center">
                Add new Controlle
              </h1>
            </div>
            {
              nextStep !== true
              ?
                <form onSubmit={(e)=>handlNextStep(e)} action="post">
                  <div className=" md:w-96">
                    <div className="flex flex-col text-white mb-1">
                      <label htmlFor="Full_name" className="mb-1">Full Name : </label>
                      <input 
                        required 
                        type="text" 
                        id="Full_name" 
                        name="fullName" 
                        style={{"fontSize":"18px","color":"lightgray"}} 
                        className="bg-[#4B484C] rounded-md h-8  w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlInputChangeInStepOne(e)}
                      />
                    </div>
                    <div className="flex flex-col text-white  mb-1">
                      <label htmlFor="Id_Card" className="mb-1">Id Card : </label>
                      <input 
                        required 
                        type="text" 
                        id="Id_Card" 
                        name="idCard" 
                        style={{"fontSize":"18px","color":"lightgray"}} 
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlInputChangeInStepOne(e)}
                      />
                    </div>
                    <div className="flex flex-col text-white  mb-1">
                      <label htmlFor="Address" className="mb-1">Address : </label>
                      <input 
                        required 
                        type="text" 
                        id="Address" 
                        name="address" 
                        style={{"fontSize":"18px","color":"lightgray"}} 
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlInputChangeInStepOne(e)}
                      />
                    </div>
                    <div className="flex flex-col text-white  mb-1">
                      <label htmlFor="specialty" className="mb-1">Specialty : </label>
                      <select onChange={(e)=>handlInputChangeInStepOne(e)} defaultValue={'DEFAULT'} required className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2" name="specialty" id="specialty" style={{"fontSize":"20px","color":"lightgray"}}>
                        <option value="DEFAULT" disabled>...</option>
                        <option value="Electricite">Electricite</option>
                        <option value="Climatisation">Climatisation</option>
                        <option value="Ventilation">Ventilation</option>
                        <option value="Plomberie">Plomberie</option>
                      </select>
                    </div>
                    <div className="flex flex-col text-white  mb-1">
                      <label htmlFor="phone_number" className="mb-1">Phone number : </label>
                      <input 
                        required 
                        type="number" 
                        id="phone_number" 
                        name="phoneNumber" 
                        style={{"fontSize":"18px","color":"lightgray"}} 
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlInputChangeInStepOne(e)}
                      />
                    </div>

                    <div className="flex flex-col text-white">
                      <label htmlFor="email" className="mb-1">Email : </label>
                      <input 
                        required 
                        type="email" 
                        id="email" 
                        name="email" 
                        style={{"fontSize":"18px","color":"lightgray"}}
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlInputChangeInStepOne(e)}
                      />
                    </div>
                  </div>
                  <div className="mt-3">
                    <button className="bg-[#4774dc] hover:bg-[#4062af] px-6 py-2 text-sm rounded-lg text-white transition duration-300 flex items-end ">
                      Next Step <img src={next} alt="next icon" className="w-4 ml-1"/>
                    </button>
                  </div>
                </form>
              :
                <form className="mt-4" onSubmit={(e)=>AddNewController(e)} action="post">
                  <ul className="list-disc	ml-3 mb-4 text-xs text-[#d4ced6]">
                    <li>Please enter the username and the password for your worker</li>
                  </ul>
                  <div className=" md:w-96">
                    <div className="flex flex-col text-white mb-2">
                      <label htmlFor="username" className="mb-1">Username * </label>
                      <input 
                        required 
                        type="text" 
                        id="username" 
                        name="username" 
                        style={{"fontSize":"18px","color":"lightgray"}}
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlChangesInStepTwo(e)}
                      />
                    </div>
                    <div className="flex flex-col text-white">
                      <label htmlFor="password" className="mb-1">Password * </label>
                      <input 
                        required 
                        type="password" 
                        id="password" 
                        name="password" 
                        style={{"fontSize":"18px","color":"lightgray"}}
                        className="bg-[#4B484C] rounded-md h-8 w-auto focus:outline-none pl-2"
                        onChange={(e)=>handlChangesInStepTwo(e)}
                      />
                    </div>
                  </div>
                  <div className="mt-3">
                    <button className="bg-[#4774dc] hover:bg-[#4062af] px-6 py-2 text-sm rounded-lg text-white transition duration-300">
                      Add Controller
                    </button>
                  </div>
                </form>
              }
              {
                open !== false
                ?
                <Snackbar open={open} autoHideDuration={6000} onClose={handleClose}>
                  {
                    dataReturn.success
                    ?
                    <Alert onClose={handleClose} severity="success" sx={{ width: '100%' }}>
                      {dataReturn.message}
                    </Alert>
                    :
                    <Alert onClose={handleClose} severity="error" sx={{ width: '100%' }}>
                      {dataReturn.message}
                    </Alert>
                  }
                </Snackbar>
                :
                null
              }
          </div>
        </div>
      </div>
    </div>
  );
}
