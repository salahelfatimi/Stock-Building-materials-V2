import { useState , useEffect , forwardRef } from "react";
import EditIcon from '@mui/icons-material/Edit';
import Skeleton from '@mui/material/Skeleton';
import Snackbar from '@mui/material/Snackbar';
import MuiAlert from '@mui/material/Alert';
import Modal from '@mui/material/Modal';
import Box from '@mui/material/Box';
import Nav from "./NavAdmin"
import axios from "axios";

// this for style model
const style = {
  position: 'absolute', top: '45%', left: '50%',
  transform: 'translate(-50%, -50%)',
  height:"auto" ,  bgcolor: 'background.paper',
  boxShadow: 24, p: 4,
  backgroundColor:"#26272C",
  color:"#fff",
  borderRadius:"5px"
};

const Alert = forwardRef(function Alert(props, ref) {
  return <MuiAlert elevation={6} ref={ref} variant="filled" {...props} />;
});

function MyAccount() {
  /*-------------------------this for moduls---------------------*/
  const [open, setOpen] = useState(false);
  const [open2, setOpen2] = useState(false);
  const [open3, setOpen3] = useState(false);
  const [open4, setOpen4] = useState(false);
  const handleOpen = () => setOpen(true);
  const handleOpen2 = () => setOpen2(true);
  const handleOpen3 = () => setOpen3(true);
  const handleClose = () =>{ setOpen(false) , setOpen2(false) , setOpen3(false) , setOpen4(false) , setErroreMsg(false)} 
  const [ErroreMsg, setErroreMsg] = useState(false);
  const [adminInformation , setAdminInformation] = useState([])
  // this state reloadInChanges it has no mean, just to reload the method taken() in evry change reloadInChanges
  const [reloadInChanges , setReloadInChanges] = useState([])
  /*-------------------------------end---------------------------*/
  /*--------------------------all functions here-----------------*/

  useEffect(()=>{
    axios.get('http://127.0.0.1:8000/api/getAdminInfo').then((response) => {
        setAdminInformation(response.data)
      }).catch((error)=> {
        console.log(error);
      });
  },[reloadInChanges])

  const EditName=(e)=>{
    e.preventDefault()
    var first_name = document.getElementById("first_name").value
    var last_name = document.getElementById("last_name").value
    if(first_name === "" || last_name === ""){
        setErroreMsg(true)
    }else{
        const newFullName = {first_name:first_name , last_name:last_name ,token:localStorage.getItem("AdminToken")}
        axios.post('http://127.0.0.1:8000/api/updateFullNameOfAdmin',newFullName).then((res) => {
          setReloadInChanges([...reloadInChanges , newFullName])
          handleClose()
          setErroreMsg(false)
        }).catch((error)=> {
          console.error(error);
        });
    }
  }

  const EditUsername=(e)=>{
    e.preventDefault()
    var username = document.getElementById("username").value
    if(username === ""){
        setErroreMsg(true)
    }else{
        const newUsername = {username:username,token:localStorage.getItem("AdminToken")}
        axios.post('http://127.0.0.1:8000/api/updateUsername',newUsername).then((res) => {
          setReloadInChanges([...reloadInChanges , newUsername])
          handleClose()
          setErroreMsg(false)
        }).catch((error)=> {
          console.log(error);
        });
    }
  }

  const EditPassword=(e)=>{
    e.preventDefault()
    var old_password = document.getElementById("old_password").value
    var new_password = document.getElementById("new_password").value
    if(old_password === ""|| new_password === ""|| old_password !== adminInformation[0]["password"]){
        setErroreMsg(true)
    }else{
      const newPassword = {password:new_password,token:localStorage.getItem("AdminToken")}
      axios.post('http://127.0.0.1:8000/api/updatePassword',newPassword).then((res) => {
        if(res.data.success){
          setReloadInChanges([...reloadInChanges , newPassword])
          handleClose()
          setErroreMsg(false)
          setOpen4(true)
        }else{
          alert("updating the password is field, try again")
        }
      }).catch((error)=> {
        console.log(error);
      });
    }
  }
  /*--------------------------end functions part-----------------*/
  
  if(adminInformation.length > 0){
    return (
      <>
      <Nav reloadInChanges={reloadInChanges}/>
      <div className=" bg-[#1F2025] w-2/4 m-auto text-white rounder-lg mt-7  px-4 py-7">
        <div className="mb-10">
          <h5 className="text-xl font-semibold">Personal information</h5>
          <span style={{"fontSize":"14px","fontWeight":"100"}}>Manage your personal information, here you can edit your fullname , username and password</span>
        </div>
        <div className="mb-4">
          <h6 className="text-sm font-semibold text-[#D8B5B5]">Account holder</h6>
          <p className="text-md font-medium mt-1"> 
            <span className="mr-2">{`${adminInformation[0]["ferst_name"]} ${adminInformation[0]["last_name"]}`}</span>
            <abbr title="edit"><button onClick={()=>handleOpen()}><EditIcon sx={{ fontSize: 17 }}/></button></abbr>
            <Modal open={open} onClose={handleClose} aria-labelledby="modal-modal-title" aria-describedby="modal-modal-description">
              <Box sx={style} className="md:w-1/2" >
                  <h6 className="text-xs">EDIT YOUR NAME</h6> 
                  {
                    ErroreMsg === true ? <div className="bg-[#f31c40] mt-2" style={{"fontSize":"18px","padding":"5px"}}>Not all the fields have been filled out correctly!</div> : null
                  } 
                  <form>
                      <div className="flex flex-col my-3">
                          <label className="mb-1" style={{"fontSize":"14px"}}>FIRST NAME *</label>
                          <input type="text" name="first_name" placeholder="Enter your first name" id="first_name" className="rounded focus:outline none bg-[#3C3D42] text-xs py-1 pl-2"/>
                      </div>
                      <div className="flex flex-col my-3">
                          <label className="mb-1" style={{"fontSize":"14px"}}>LAST NAME *</label>
                          <input type="text" name="last_name" placeholder="Enter your last name" id="last_name" className="rounded focus:outline none bg-[#3C3D42] text-xs py-1 pl-2"/>
                      </div>
                      <button onClick={(e)=>EditName(e)} className="bg-[#087285] hover:bg-[#0889a0] text-sm p-1 rounded-md px-2 transition duration-300">
                        Save changes
                      </button>
                  </form>
              </Box>
            </Modal>
          </p>
        </div>
        <div className="mb-4">
          <h6 className="text-sm font-semibold text-[#D8B5B5]">Username</h6>
          <p className="text-md font-medium mt-1">
           <span className="mr-2">{`${adminInformation[0]["username"]}`}</span> 
            <abbr title="edit"><button onClick={()=>handleOpen2()}><EditIcon sx={{ fontSize: 17 }}/></button></abbr>
            <Modal open={open2} onClose={handleClose} aria-labelledby="modal-modal-title" aria-describedby="modal-modal-description">
              <Box sx={style} className="md:w-1/2">
                  <h6 className="text-xs">EDIT YOUR USERNAME</h6> 
                  {
                    ErroreMsg === true ? <div className="bg-[#f31c40] mt-2" style={{"fontSize":"18px","padding":"5px"}}>Not all the fields have been filled out correctly!</div> : null
                  } 
                  <form>
                      <div className="flex flex-col my-3">
                          <label className="mb-1" style={{"fontSize":"14px"}}>USERNAME *</label>
                          <input type="text" name="username" placeholder="Enter your username" id="username" className="rounded focus:outline none bg-[#3C3D42] text-xs py-1 pl-2"/>
                      </div>
                      <button onClick={(e)=>EditUsername(e)} className="bg-[#087285] hover:bg-[#0889a0] text-sm p-1 rounded-md px-2 transition duration-300">
                        Save changes
                      </button>
                  </form>
              </Box>
            </Modal>
          </p>
        </div>
        <div>
          <h6 className="text-sm font-semibold text-[#D8B5B5]">Password</h6>
          <p className="text-md font-medium mt-1 flex itmes-center">
            <span>*************</span>
            <abbr title="edit" className="leading-none ml-2"><button onClick={(e)=>handleOpen3(true)}><EditIcon sx={{ fontSize: 17 }}/></button></abbr>
            <Modal open={open3} onClose={handleClose} aria-labelledby="modal-modal-title" aria-describedby="modal-modal-description">
              <Box sx={style} className="md:w-1/2">
                <h6 className="text-xs">EDIT YOUR PASSWORD</h6> 
                  {
                    ErroreMsg === true ? <div className="bg-[#f31c40] mt-2" style={{"fontSize":"18px","padding":"5px"}}>Failed to change your password, try again!</div> : null
                  } 
                  <form>
                      <div className="flex flex-col my-3">
                          <label className="mb-1" style={{"fontSize":"14px"}}>CURRENT PASSWORD *</label>
                          <input type="text" name="old_password" placeholder="Enter your current password" id="old_password" className="rounded focus:outline none bg-[#3C3D42] text-xs py-1 pl-2"/>
                      </div>
                      <div className="flex flex-col my-3">
                          <label className="mb-1" style={{"fontSize":"14px"}}>NEW PASSWORD *</label>
                          <input type="text" name="new_password" placeholder="Enter your new password" id="new_password" className="rounded focus:outline none bg-[#3C3D42] text-xs py-1 pl-2"/>
                      </div>
                      <button onClick={(e)=>EditPassword(e)} className="bg-[#087285] hover:bg-[#0889a0] text-sm p-1 rounded-md px-2 transition duration-300">
                        Save changes
                      </button>
                  </form>
              </Box>
            </Modal>
          </p>
        </div>
      </div>
      {
        open4 !== false
        ?
        <Snackbar open={open4} autoHideDuration={6000} onClose={handleClose}>
          <Alert onClose={handleClose} severity="success" sx={{ width: '100%' }}>
            the password is updated successfully
          </Alert>
        </Snackbar>
        :
        null
      }
      </>
    )
  }else{
    return(
      <>
      <Nav />
      <div className="w-2/3 m-auto rounder-lg mt-7 h-96">
        <Skeleton variant="rectangular" sx={{ bgcolor: '#1F2025' }} animation="wave" width={"100%"} height={"100%"} />
      </div>
      </>
    )
  }
}

export default MyAccount