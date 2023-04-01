import Nav from './NavController'
import { Button } from '@mui/material';
import CheckCircleOutlineRoundedIcon from '@mui/icons-material/CheckCircleOutlineRounded';
import { useLocation } from 'react-router-dom';
import { useEffect, useState } from 'react';
import modify from "../../assets/write.png"
import enter from "../../assets/enter.png"
import axios from "axios";
import * as React from 'react';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';

    function createData(name,Quantity_Completed, The_remaining_quantity, Number_of_Persons) {
        return { name,Quantity_Completed, The_remaining_quantity, Number_of_Persons };
    }

////////////////////////////////////////////////////////////////////////////////////////////// style for inputs/////////////////////////////////////////////////////////////////////////////////////////
const InputStyle = 'bg-[#4B484C] rounded-sm focus:outline none p-1 text-white text-xs text-center'

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

function ControllerPage() {
    const [fullName , setFullName] = useState("")
    const [speciality , setSpeciality] = useState("")
    const [bloc , setBloc] = useState("")
    const [blocentre , setBlocentre] = useState(false)
    const [Modify , setModify] = useState(false)
    const [validDone , setValideDone] = useState(false)
    // state have designation
    const [designation , setDesignation] = useState([])
    //arraye have donne of input par desenation
    const [items , setItems] = useState([])
    const [addDataOfBuildingMaterial , setAddDataOfBuildingMaterial] = useState(false)

/////////////////////////////////////////////////////////////////////////////////////////get id of controler he had login ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    const location = useLocation();
    const id = {id:parseInt(location.hash.slice(1))}
    useEffect(()=>{
        axios.post("http://127.0.0.1:8000/api/controlerDetails",id).then((res)=>{
            setFullName(res.data.fullName)
            setSpeciality(res.data.speciality)
        }).catch((err)=>{
            console.log(err)
        })
    },[id])
    
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

///////////////////////////////////////////////////////////////////////////////// create the curent date///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

     var curenteDate = new Date();
     const day=curenteDate.getDate()<10?`0${curenteDate.getDate()}`:curenteDate.getDate()
     const month = curenteDate.getMonth()<10?`0${curenteDate.getMonth()+1}`:curenteDate.getMonth()+1
     const year = curenteDate.getFullYear()
     const date=year+"/"+month+"/"+day

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

/////////////////////////////////////////////////////////////////////////////////////////validation////////////////////////////////////////////////////////////////////////////////////

    const validation = (e)=>{
        if(eachItem.designation!==""){
            //appned in array items
            setItems(items => [...items,eachItem] );

            //empty setEachItem 
            setEachItem({idControler:id.id,dateValidation:date,designation:"",Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0,blocName:bloc})
            setAddDataOfBuildingMaterial(!addDataOfBuildingMaterial)
        } 
    }
    
/////////////////////////////////////////////////////////////insert data that entered by worker to database////////////////////////////////////////////////////////////////////////////////////////////////////// 
    useEffect(()=>{
        if(items.length !== 0){
            axios.post("http://127.0.0.1:8000/api/ajouteDesignation",items)
            .then(res=>{
                window.location.reload()
            })
            .catch(err=>{
                console.log(err)
            })
        }
    },[addDataOfBuildingMaterial])

///////////////////////////////////////////////////serach of controler if valide////////////////////////////////////////////////////////////////////////////////////////////
    useEffect(()=>{
    
        axios.post("http://127.0.0.1:8000/api/serachControlerValide",{"date":date,"id":id.id}).then((res)=>{
            setValideDone(res.data.success)
        }).catch((err)=>{
            console.log(err)
        })

    },[date,id])
    
//////////////////////////////////////////////////////////////////// obejet par input of designation/////////////////////////////////////////////////////////////////////////////////////////
    const [eachItem , setEachItem] = useState({blocName:bloc,idControler:id.id,dateValidation:date,designation:"",Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0})
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

///////////////////////////////////////////////////get desenation from database////////////////////////////////////////////////////////////////////////////////////////////
    useEffect(()=>{
        if(speciality !== ""){
            axios.post("http://localhost/project_atlass/getDesignation.php",{speciality:speciality}).then((res)=>{
                setDesignation(res.data.designationName)
            }).catch((err)=>{
                console.log(err)
            })
        }
    },[speciality])

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    // ba9ii m3aha
    // const arraydes=designation?.map((ele)=>({blocName:bloc,idControler:id.id,dateValidation:date,designation:ele.designationName,Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0}))
    // console.log(arraydes)

        // const arraydes=designation?.map((ele)=>({blocName:bloc,idControler:id.id,dateValidation:date,designation:ele.designationName,Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0}))
    
        // console.log(arraydes)

///////////////////////////////////////////////// on change input function //////////////////////////////////////////////////////////////////////////////////////////////////// // 
    const handlChange=(e)=>{
        // get name designation
        const designationName = e.target.id

        //serach if designation is found in array
        const serach = items.map((ele)=>{
        if(ele.designation==designationName){
            return true
        }})
        
        // insert value in first time
        if(eachItem.designation==""){
            setEachItem((prev)=>(
                {...prev , [e.target.name] : e.target.value ,designation:designationName,blocName:bloc}
            ))
        }
        else if (designationName==eachItem.designation){
            /// if not existe in  array 
            if (serach==false){
                setEachItem((prev)=>(
                    {...prev , [e.target.name] : e.target.value ,designation:designationName,blocName:bloc}
            ))}
            else{
                //find old date
                const olddonne=items.find((ele)=>ele.designation ==designationName)
                
                //save old date to update 
                if(olddonne!=undefined){
                setEachItem({idControler:id.id,dateValidation:date,designation:"",Quantity_Completed:olddonne.Quantity_Completed,The_remaining_quantity:olddonne.The_remaining_quantity,Number_of_Persons:olddonne.Number_of_Persons,blocName:bloc})
                }
                
                //updtaing array 
                setItems( items.filter((ele)=>
                ele.designation !==designationName
                ))

                // whene have same desitination we need too insert new objet of the same designation
                setEachItem((prev)=>(
                    {...prev , [e.target.name] : e.target.value ,designation:designationName,blocName:bloc}
                ))
            }
        }
        else if(designationName!=eachItem.designation  ){ //insert objet in items and get empty setEachItem
            //appned in array items
            setItems(items => [...items,eachItem] );

            //empty setEachItem 
            setEachItem({idControler:id.id,dateValidation:date,designation:"",Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0,blocName:bloc})
            setEachItem((prev)=>(
                {...prev , [e.target.name] : e.target.value ,designation:designationName,blocName:bloc}
            ))
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    
//////////////////////////////////////////// map of designation and create input for each designation///////////////////////////////////////////////////////////////////////////////////////////
        const afficherDonner = designation?.map((ele,key)=>(
            createData(
                ele.designationName,
                <input type="number" id={ele.designationName} defaultValue={0} name='Quantity_Completed' onChange={(e)=>handlChange(e)}  className={InputStyle} style={bloc===''?{"pointerEvents":"none"}:null}/>,
                <input type="number" id={ele.designationName} defaultValue={0} name='The_remaining_quantity' onChange={(e)=>handlChange(e)} className={InputStyle} style={bloc===''?{"pointerEvents":"none"}:null}/>,
                <input type="number" id={ele.designationName} defaultValue={0} name='Number_of_Persons' onChange={(e)=>handlChange(e)} className={InputStyle} style={bloc===''?{"pointerEvents":"none"}:null}/>
            )
        ))
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////Modify button input bloc/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const ModifyBloc=()=>{
        setBloc("")
        document.getElementById("blocinput").value=""
        setItems([])
        setEachItem({idControler:id.id,dateValidation:date,designation:"",Quantity_Completed:0,The_remaining_quantity:0,Number_of_Persons:0,blocName:bloc})
        setModify(true)
        setBlocentre(false)
    }
//////////////////////////////////////////////////////////// button entre bloc////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const AddBloc=(e)=>{
        if(document.getElementById("blocinput").value === ""){
            e.preventDefault();
            document.getElementById("blocinput").focus()
        }else{
            setBlocentre(true)
        }
    }

    return (
        <>
            <Nav fullName={fullName} speciality={speciality}/>
            <div className='px-4 pb-2'>
                <div className='flex flex-col md:flex-row gap-4 md:justify-between'>
                    <div className='flex gap-2 items-center'>
                        <input
                            className="bg-[#3C3D42] pl-4 h-9 rounded-xl sm:w-64 focus:outline none  p-1 text-white text-xs"
                            type="text"
                            onChange={(e) => setBloc(e.target.value)}
                            placeholder="Enter the Bloc"
                            style={ validDone ===true ? {"pointerEvents":"none"} : null}
                            id="blocinput"
                        />
                       <button style={blocentre==false?{"pointerEvents":"none"}:null} className='absolute left-36 sm:left-60'>
                            <img src={modify} className="w-5 " alt="" onClick={ModifyBloc} />
                        </button>
                       <button onClick={(e)=>AddBloc(e)}  style={blocentre === true ||  validDone ===true?{"pointerEvents":"none"}:null} 
                        className=' text-white text-center justify-items-center flex bg-[#04AA6D] py-1 px-2 rounded-md font-medium   '>
                            <span >Add bloc</span>
                       </button>
                    </div>

                    <div className='flex gap-2 items-center'>
                        <Button id="valid"  style={blocentre===false ||  validDone ===true ?{"backgroundColor":"#55d9aa", "color":"#000" ,"textTransform":"capitalize","fontWeight":600, "pointerEvents":"none"}:{"backgroundColor":"#55d9aa", "color":"#000" ,"textTransform":"capitalize","fontWeight":600}} onClick={validation}>
                            Validation
                            <CheckCircleOutlineRoundedIcon style={{"fontSize":"30px" , "marginLeft":"5px"}}/>
                        </Button>
                        <span className='text-white'>
                           {date}
                        </span>
                    </div>
                </div>
                <div className='pt-2'>
                    {
                        validDone ===true
                        ?
                            <div className='flex items-center justify-center md:h-96 h-52 bg-[#3C3D42] rounded-md'>
                                <span className='md:text-2xl font-bold text-[#202224] text-sm'>You have validate  for today, see you tomorrow</span>
                            </div>
                        :
                            blocentre === false
                            ?
                                <div className='flex items-center justify-center md:h-96 h-52 bg-[#3C3D42] rounded-md'>
                                    <span className='md:text-2xl font-bold text-[#202224] text-sm'>Please enter bloc name first</span>
                                </div>
                            :
                                <TableContainer component={Paper} style={{"borderRadius":"10px", "backgroundColor":"#3C3D42"}}>
                                    <Table sx={{ minWidth: 650 }} aria-label="simple table">
                                        <TableHead>
                                            <TableRow>
                                            <TableCell style={{"color":"#fff" , "fontSize":"20px" , "fontWeight":600 , "paddingLeft":"30px"}}>Designation</TableCell>
                                            <TableCell align="center" style={{"color":"#fff" , "fontSize":"20px" , "fontWeight":600}}>Quantity_Completed</TableCell>
                                            <TableCell align="center" style={{"color":"#fff" , "fontSize":"20px" , "fontWeight":600}}>The_remaining_quantity</TableCell>
                                            <TableCell align="center" style={{"color":"#fff" , "fontSize":"20px" , "fontWeight":600 ,  "paddingRight":"30px"}}>Number_of_Persons</TableCell>
                                            </TableRow>
                                        </TableHead>
                                        <TableBody className="bg-[#1F2025]">
                                            {afficherDonner?.map((row , index) => (
                                            <TableRow key={index} sx={{ '&:last-child td, &:last-child th': { border: 0 } }}>
                                                <TableCell component="th" scope="row" style={{"color":"#fff","paddingLeft":"30px"}}>{row.name}</TableCell>
                                                <TableCell align="center">{row.Quantity_Completed}</TableCell>
                                                <TableCell align="center">{row.The_remaining_quantity}</TableCell>
                                                <TableCell align="center">{row.Number_of_Persons}</TableCell>
                                            </TableRow>
                                            ))}
                                        </TableBody>
                                    </Table>
                                </TableContainer>
                    }
                </div>
            </div>
        </>
    )
}

export default ControllerPage