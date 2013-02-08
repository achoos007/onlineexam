<div class="dashboard-box">
<div class="dashboard-title"> 
Scheduled Exam Calender
</div> 

 
 <?php 
 
 $data = array(
               3  =>site_url('general/day'), 
               9  =>site_url('general/day'), 
               11  =>site_url('general/day'), 
               18  =>site_url('general/day'), 
               22  =>site_url('general/day'), 
               14  =>site_url('general/day'), 
               21  =>site_url('general/day'), 
               5  =>site_url('general/day'),  
               26  =>site_url('general/day') 
             );

echo $this->calendar->generate(2012, 11, $data);
 
 
 
 ?>

</div> 



<div class="dashboard-box">
<div class="dashboard-title"> 
Quick Preview
</div> 

<div class='hr' ><a href="#">Exams Assigned :10</a></div>
<div class='hr' ><a href="#">Exams Attended :8</a></div>
<div class='hr' ><a href="#">Exam requests :20</a></div>
<div class='hr' ><a href="#">Answer Reviews:5 </a></div>
 



</div> 




<div class="dashboard-box">
<div class="dashboard-title"> 
Assign New Exams
</div> 

 
<div class='hr' ><a href="#">IIMTS MBA Dec 2012</a></div>
<div class='hr' ><a href="#">HR Exam Dec 2012</a></div>
<div class='hr' ><a href="#">IIMTS Exams January 2013</a></div>
<div class='hr' ><a href="#">Interview Exams January 2013</a></div>


</div> 



<div class="dashboard-box">
<div class="dashboard-title"> 
Scheduled Exams
</div> 

 
<div class='hr' ><a href="#">IIMTS MBA Dec 2012 : 12 people</a></div>
<div class='hr' ><a href="#">HR Exam Dec 2012 : 9 People</a></div>
<div class='hr' ><a href="#">IIMTS Exams January 2013 : 5 People</a></div>
<div class='hr' ><a href="#">Interview Exams : 18 People</a></div>


</div> 


<div class="dashboard-box">
<div class="dashboard-title"> 
Current Exams
</div> 

 
<div class='hr' ><a href="#">IIMTS MBA Dec 2012 : 2 People</a></div>
<div class='hr' ><a href="#">HR Exam Dec 2012 :0 People</a></div>
<div class='hr' ><a href="#">IIMTS Exams January 2013 : 3 People</a></div>
<div class='hr' ><a href="#">Appraisal : 3 People</a></div>


</div> 



<div class="dashboard-box">
<div class="dashboard-title"> 
New Registrations
</div> 

 
<div class='hr' ><a href="#">IIMTS 10 people</a></div>
<div class='hr' ><a href="#">Employees 6 people</a></div>
<div class='hr' ><a href="#">Students 35 People</a></div>


</div> 

