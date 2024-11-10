/*
document.getElementById('id_admin_register').style.display = 'none';
document.getElementById('id_teacher_register').style.display='none';
document.getElementById('id_std_register').style.display = 'none';
*/
//admin registration click events

  
  function adminregcancel(){
    document.getElementById('id_admin_register').style.display = 'none';
  }
  
  
  //teacher click events
  function hideteacherreg(){
    document.getElementById('id_teacher_register').style.display='none';
  }
  function teacherregistration(){
    document.getElementById('id_teacher_register').style.display='block';
    
    
  }
  
    

    //student course type choose radio buttion
    function yearlycourse(){
      let yearly = document.getElementById("idstdyearly");
      if(yearly.checked){
         document.getElementById("idselectsem").style.display = 'none';
         document.getElementById("idstdsem").style.display = 'none';
        document.getElementById("idselectyear").style.display = 'inline';
        document.getElementById("idstdyear").style.display = 'inline';

      }
    }
    function semcourse(){
      let sem = document.getElementById("idstdsem_wise");
      if(sem.checked){
        document.getElementById("idselectsem").style.display = 'inline';
        document.getElementById("idstdsem").style.display = 'inline';
        document.getElementById("idselectyear").style.display = 'inline';
        document.getElementById("idstdyear").style.display = 'inline';
      }
    }
  