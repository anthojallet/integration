IdRefresh=0; 
IdCount=0;
IdCountNbCase=0;
IdCountCase=0;
html_DivMQServer2='';
html_DivLocalqueue='';
html_DivDLT='';
html_DivChannel2='';
html_DivMQServer='';
html_DivRemotequeue='';
html_DivTransmissionQueue='';
html_DivChannel1='';
html_DivChannelConnect='';

function setCookie(cname, cvalue, exdays) {
       localStorage.setItem(cname,cvalue);

}

function getCookie(cname) {
      return localStorage.getItem(cname);
}



function launchUseCase(NumCase)
{


   Sortable.create('ListSol');

   initCountCase();
   clearInterval(IdCountNbCase);
   IdCountNbCase=setInterval(function() {Count_Case(NumCase)}, 1000);
   jQuery('#DivLaunch').hide();
   jQuery('#DivSave').show();    
   jQuery('#ListSol').show();  
   
     jQuery.ajax( {
            type: "POST",
            url: "./WebServices/GetUseCase.php",
            data: {IdUseCase:NumCase},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                                
                            jQuery(xml).find('UseCase').each(   
                            function()
                            { 

								  var UseCaseQuestion=jQuery(this).find('UseCaseQuestion').text();
								  jQuery('#DivQuestion').html(UseCaseQuestion);
								  
								  var Result=jQuery(this).find('Result').text();
								  if (Result!='')
								  {
								    loadResultUseCase(NumCase);
								  }
								  
							})
					}
				});
                       			
}


function loadResultUseCase(NumCase)
{

    Sortable.destroy('ListSol');
	initCountCase();
    clearInterval(IdCountNbCase);

    
    jQuery.ajax( {
            type: "POST",
            url: "./WebServices/LoadUseCase.php",
            data: {NumCase:NumCase},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                         
                            jQuery(xml).find('Score').each(   
                            function()
                            { 

								  var Result=jQuery(this).find('Result').text();
								  var Answer1=jQuery(this).find('Answer1').text();
								  var Answer2=jQuery(this).find('Answer2').text();								  
								  var Answer3=jQuery(this).find('Answer3').text();
								  var Answer4=jQuery(this).find('Answer4').text();	
								  
								  var Result2='Sol. '+Answer1+'<BR>Sol. '+Answer2+'<BR>Sol. '+Answer3+'<BR>Sol. '+Answer4;
								  Result='<B>'+Result+'/20</B><BR><BR>'+Result2;						  								  
								  
								  jQuery('#DivSave').css( "font-size", "30px" );


								  jQuery('#DivSave').html(Result);

								  
							})
					}
				});



}


function saveUseCase(NumCase)
{

	initCountCase();
    clearInterval(IdCountNbCase);
    var Result=Sortable.sequence('ListSol').join('');

     jQuery.ajax( {
            type: "POST",
            url: "./WebServices/CheckUseCase.php",
            data: {NumCase:NumCase, Result:Result},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                         
                            jQuery(xml).find('Score').each(   
                            function()
                            { 

								  var Result=jQuery(this).find('Result').text();
								  var Answer1=jQuery(this).find('Answer1').text();
								  var Answer2=jQuery(this).find('Answer2').text();								  
								  var Answer3=jQuery(this).find('Answer3').text();
								  var Answer4=jQuery(this).find('Answer4').text();	
								  
								  var Result2='Sol. '+Answer1+'<BR>Sol. '+Answer2+'<BR>Sol. '+Answer3+'<BR>Sol. '+Answer4;
								  Result='<B>'+Result+'/20</B><BR><BR>'+Result2;						  								  
								  
								  jQuery('#DivSave').css( "font-size", "30px" );


								  jQuery('#DivSave').html(Result);

								  
							})
					}
				});
 
    Sortable.destroy('ListSol');
                               			
}


function InfoMessage(Message, Type)
{



	     if (Type==1)
	     {
	       alertify.log(Message);  
	     }
	     else if (Type==2)  
	     {
	     	 alertify.success(Message);
	     }
	     else if (Type==3)  	     
	     {
	     	 alertify.error(Message);
	     }   

}


function initCount()
{
  $("#SubmitButtonQuizz").html("<img width=30px src='./res/Loading_icon.gif'>");
  setCookie("IdCountNb",30,-1);
}


function selectSol(NumCase,NumSol)
{





	jQuery('#sol_1x').css( "border-style", "outset" );
	jQuery('#sol_1x').css( "color", "gray" );
	
	jQuery('#sol_2x').css( "border-style", "outset" );
	jQuery('#sol_2x').css( "color", "gray" );

	jQuery('#sol_3x').css( "border-style", "outset" );
	jQuery('#sol_3x').css( "color", "gray" );
	
	jQuery('#sol_4x').css( "border-style", "outset" );
	jQuery('#sol_4x').css( "color", "gray" );	

	jQuery('#sol_'+NumSol+'x').css( "border-style", "inset" );
	jQuery('#sol_'+NumSol+'x').css( "color", "white" );
	

     jQuery.ajax( {
            type: "POST",
            url: "./WebServices/GetUseCase.php",
            data: {IdUseCase:NumCase},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                                
                            jQuery(xml).find('UseCase').each(   
                            function()
                            { 

								  var UseCaseAnswer=jQuery(this).find('UseCaseAnswer'+NumSol).text();
								  jQuery('#DivAnswer').html(UseCaseAnswer);
								  
							})
					}
				});
				

}

function switchWS(Action)
{

	if (Action=='SOAP')
	{

		var DivSwitchWSSOAP = document.getElementById("DivSwitchWSSOAP"); 
		DivSwitchWSSOAP.setAttribute("style", "font-weight:bold; color:white; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:red; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:inset; display:inline-block; width:200px;");

		var DivSwitchWSREST = document.getElementById("DivSwitchWSREST"); 
		DivSwitchWSREST.setAttribute("style", "font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; display:inline-block; width:200px;");

		$("#DivSOAP").show(); 
		$("#DivREST").hide(); 		
	}

	else
	{


		var DivSwitchWSSOAP = document.getElementById("DivSwitchWSSOAP"); 
		DivSwitchWSSOAP.setAttribute("style", "font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:red; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; display:inline-block; width:200px;");

		var DivSwitchWSREST = document.getElementById("DivSwitchWSREST"); 
		DivSwitchWSREST.setAttribute("style", "font-weight:bold; color:white; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:inset; display:inline-block; width:200px;");

		$("#DivinputRest").hide();
		$("#DivSOAP").hide(); 
		$("#DivREST").show();	

	}


}


function changeVerb(Action)
{

	if (document.getElementById('verb').value=='PUT')
	{
	        $("#ReplyRESTname").html(''); 
			$("#DivinputRest").show();	
	}
	else
	{
	        $("#ReplyRESTname").html(''); 
			document.getElementById('valueRest').value='';
			$("#DivinputRest").hide();
	}
}

function requestREST()
{



    var verb=document.getElementById('verb').value;
    var valueRest=document.getElementById('valueRest').value;    

    var nameRest=document.getElementById('nameRest').value;

    
	$("#ReplyREST").hide(); 
    $("#ReplyRESTname").html('');

     $.ajax( {
            type: verb,
            url: "./WebServices/message.php/"+nameRest+"/"+valueRest,
            data: {},
            async:false,
            success: function(data) 
                     {    
                     
       
                     
 											$("#ReplyRESTname").html(data);  
											$("#ReplyREST").show();                     
                     
                     }
                     
                     
            });
  
            
}
    



function requestSOAP()
{



    var name=document.getElementById('name').value;
	$("#ReplySOAP").hide(); 
    $("#ReplySOAPname").html('');

    
        $.post("./WebServices/GetMessageSOAP.php", {name: name}
                                                    ,function(data,status)
                                                    {


											$("#ReplySOAPname").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;return xsi:type="xsd:string"&gt;'+data+'&lt;/return&gt;');  
											$("#ReplySOAP").show(); 

	


                                                    }
                                                  ); 
}


function Count_Quiz()
{

  IdCountNb=getCookie("IdCountNb")-1;
  setCookie("IdCountNb",IdCountNb,-1);
  
  $("#DivSubmitCount").html(getCookie("IdCountNb")+' secondes');
  
  if (getCookie("IdCountNb")==0)
  {
    initCount();
    document.getElementById("DivAnswer").submit(); 
  }
  
}



function initCountCase()
{


  setCookie("IdCountCase",600,-1);
  
}


function Count_Case(NumCase)
{

  IdCountCase=getCookie("IdCountCase")-1;
  setCookie("IdCountCase",IdCountCase,-1);
  
  jQuery("#DivSubmitCountCase").html('<B>ETUDE DE CAS N°'+NumCase+' : '+IdCountCase+' secondes restantes</B>');

  if (getCookie("IdCountCase")==0)
  {
    saveUseCase(NumCase);
  }
  
}


function GetQuizz(IdUser,QuestionCateg, Reload, Active)
{


      
     if (Reload==1)
     {
       initCount();
     }
     
     
     if (Active==0)
     {
     	$('#DivReload').hide();
     }
     else
     {
     	$('#DivReload').show();     
     }
     
     $.ajax( {
            type: "POST",
            url: "./WebServices/GetQuizz.php",
            data: {IdUser:IdUser, Reload:Reload, QuestionCateg:QuestionCateg},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                     
          
                                
                            $(xml).find('Question').each(   
                            function()
                            { 

                                var NbTotalQuestion=$(this).find('NbTotalQuestion').text();
                                var NbQuestionAvailable=$(this).find('NbQuestionAvailable').text();

                               
                                if (parseInt(NbQuestionAvailable)<=parseInt(NbTotalQuestion))
                                {     
                                
                              


                               		var QuestionLib=$(this).find('QuestionLib').text();
                              		var IdQuestion=$(this).find('IdQuestion').text();
                               		$("#DivQuestion").html(NbQuestionAvailable+'/'+NbTotalQuestion+' : '+QuestionLib+' ?');
                               		$("#DivAnswer").show();
                               	 	html='';
                                                          
                                    $(xml).find('Answer').each(   
                            		function()
                            		{ 
                                	   var IdAnswer=$(this).find('IdAnswer').text();
                               		   var AnswerLib=$(this).find('AnswerLib').text();
                                   	   html=html+'<p><input type="checkbox" name="'+IdAnswer+'" id="'+IdAnswer+'" /><label for="'+IdAnswer+'"><span class="ui"></span><span style="display: inline-block; vertical-align: middle;">'+AnswerLib+'</span></label></p>';

                           			});
                           		
                           			html=html+'<div id="SubmitButtonQuizz" style="width:100%; text-align:center"><input type="image" width=50 src="./res/ok.png" alt="Submit" /><div id="DivSubmitCount">'+getCookie("IdCountNb")+' secondes</div></div>';
                           			html=html+'<input type="hidden" Name="IdQuestion" Value="'+IdQuestion+'">';
                           			html=html+'<input type="hidden" Name="IdUser" Value="'+IdUser+'">';
                           			$("#DivAnswer").html(html);

                           			clearInterval(IdCount);
                           			IdCount=setInterval(function() {Count_Quiz()}, 1000);
                            
                           		 }
                           		 else
                           		 {
 

        								                          		 
                               	 	  html='';
    								  $.ajax( {
    								            type: "POST",
    								            url: "./WebServices/GetUser.php",
    								            data: {IdUser:IdUser},
    								            async:false,
    								            dataType: "xml",
    								            success: function(xml) 
    								                     {   
    								                        $(xml).find('User').each(   
                            								function()
                            								{ 
    								                     	  var Belt=$(this).find('Belt'+QuestionCateg).text();
    								                      	      								                     	  
    								                     	  if (Belt=='0')
    								                     	  {
    								                     	    html='Vous êtes ceinture blanche dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/WhiteBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='1')
    								                     	  {
    								                     	    html='Vous êtes ceinture jaune dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/YellowBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='2')
    								                     	  {
    								                     	    html='Vous êtes ceinture orange dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/OrangeBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='3')
    								                     	  {
    								                     	    html='Vous êtes ceinture verte dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/GreenBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='4')
    								                     	  {
    								                     	    html='Vous êtes ceinture bleue dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/BlueBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='5')
    								                     	  {
    								                     	    html='Vous êtes ceinture marron dans cette catégorie, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/BrownBelt.png'>";
    								                     	  }    								                     	      								                     	      								                     	      								                     	  
    								                     	  else if (Belt=='6')
    								                     	  {
    								                     	    html='Félicitations, vous êtes ceinture noire dans cette catégorie, vous êtes un expert !<BR>';
    								                     	    html=html+"<img width=150px src='./res/BlackBelt.png'>";
    								                     	  }
    								                     	  
    								                          html="<img width=50px src='./res/WhiteBelt.png'><img width=50px src='./res/YellowBelt.png'><img width=50px src='./res/OrangeBelt.png'><img width=50px src='./res/GreenBelt.png'><img width=50px src='./res/BlueBelt.png'><img width=50px src='./res/BrownBelt.png'><img width=50px src='./res/BlackBelt.png'><BR><BR>"+html;
    								                     	  
    								                      	  $("#DivQuestion").html(html);
    								                      	  $("#DivAnswer").hide();
    								                      	});
    								                                              		 
    								                      }
    								        });
    							  
    							  }
                            
                            
                            });

                    }
                });
}





function Classement(IdUser,Belt)
{

                               	 	  html='';
    								  $.ajax( {
    								            type: "POST",
    								            url: "./WebServices/GetClassement.php",
    								            data: {IdUser:IdUser},
    								            async:false,
    								            dataType: "xml",
    								            success: function(xml) 
    								                     {   
    								                        $(xml).find('User').each(   
                            								function()
                            								{ 
    								                     	  var Belt0=$(this).find('Belt0').text();
    								                     	  var Belt1=$(this).find('Belt1').text();
    								                     	  var Belt2=$(this).find('Belt2').text();
    								                     	  var Belt3=$(this).find('Belt3').text();    								                     	  
    								                     	  var Belt4=$(this).find('Belt4').text();    								                     	  
    								                     	  var Belt5=$(this).find('Belt5').text();
    								                     	  var Belt6=$(this).find('Belt6').text();    								                     	      								                     	  
    								                     	      								                      	      								                     	  
    								                     	  if (Belt=='0')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures blanches en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/WhiteBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='1')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures jaunes en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/YellowBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='2')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures oranges en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/OrangeBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='3')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures vertes en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/GreenBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='4')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures bleues en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/BlueBelt.png'>";
    								                     	  }
    								                     	  else if (Belt=='5')
    								                     	  {
    								                     	    html='Vous êtes une des ceintures marrons en Integration Architecture, vous pouvez encore progresser.<BR>';
    								                     	    html=html+"<img width=150px src='./res/BrownBelt.png'>";
    								                     	  }    								                     	      								                     	      								                     	      								                     	  
    								                     	  else if (Belt=='6')
    								                     	  {
    								                     	    html='Félicitations, vous êtes une des ceintures noires en Integration Architecture, vous êtes un expert !<BR>';
    								                     	    html=html+"<img width=150px src='./res/BlackBelt.png'>";
    								                     	  }
    								                     	  
    								                          html2="<img width=50px src='./res/WhiteBelt.png'><img width=50px src='./res/YellowBelt.png'><img width=50px src='./res/OrangeBelt.png'><img width=50px src='./res/GreenBelt.png'><img width=50px src='./res/BlueBelt.png'><img width=50px src='./res/BrownBelt.png'><img width=50px src='./res/BlackBelt.png'><BR>";
    								                     	  html=html2+"<div style='width:50px; text-align:center; display:inline-block'>"+Belt0+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt1+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt2+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt3+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt4+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt5+"</div><div style='width:50px; text-align:center; display:inline-block'>"+Belt6+"</div><BR><BR>"+html;
    								                      	  $("#DivClassement").html(html);

    								                      	});
    								                                              		 
    								                      }
    								        });
    							  

}


function ShowMQParam()
{
  $('#DivMQServer').hide();
  $('#DivChannel1').hide();
  $('#DivChannelConnect').hide();
  $('#DivChannel2').hide();
  $('#DivMQServer2').hide();
  $('#DivMQServerParams').show();
}

function HideMQParam()
{
  $('#DivMQServer').show();
   $('#DivChannel1').show();
  $('#DivChannelConnect').show();
  $('#DivChannel2').show()
  $('#DivMQServer2').show();
  $('#DivMQServerParams').hide();
}


function InitMQ(IdUser)
{
 
  	$.post("./WebServices/InitMQ.php", {IdUser:IdUser}
                                                    ,function(data,status)
                                                    {


                                                       if (data==1)
                                                       {                                  
	setCookie('QMName','',-1);
	setCookie('Port','',-1);
	setCookie('DLQName','',-1);

	setCookie('QueueName','',-1);
	setCookie('RemoteQueueName','',-1);
	setCookie('RemoteQueueManager','',-1);
	setCookie('TransmissionQueueName','',-1);

	setCookie('TQueueName','',-1);
	setCookie('Usage','',-1);

	setCookie('ChannelName','',-1);
	setCookie('Connexion','',-1);
	setCookie('RemotePort','',-1);
	setCookie('ChannelTransmissionQueue','',-1);

	setCookie('DLTQueueName','',-1);
	
	setCookie('StartChannel',StartChannel,0); 


	HideMQParam();                                                                 
                                                        
                                                       } 


                                                    }
                                                  ); 
                                                  
}

 


function ReloadMQ(IdUser, Type)
{

  setCookie('IdUser',IdUser,-1);
  setCookie('Role',Type,-1);


  if ((getCookie('QMName')!='')&&(Type=='Sender'))
  {
	$("#DivSenderImgQM").hide();
	$("#DivSenderImgRemoteQueue").show();
	$("#DivSenderImgLocalQueue").show();
	$("#DivSenderImgSenderChannel").show();
	
	AddSenderQueueManager_Display(IdUser); 
	

  	if (getCookie('QueueName')!='')
  	{
  	  $("#DivSenderImgRemoteQueue").hide(); 
  	  AddSenderRemoteQueue_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivSenderImgRemoteQueue").show();
  	}


  	if (getCookie('TQueueName')!='')
  	{
  	  $("#DivSenderImgLocalQueue").hide(); 
  	  AddSenderTransmissionQueue_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivSenderImgLocalQueue").show();
  	}
  	
  	if (getCookie('ChannelName')!='')
  	{
  	  $("#DivSenderImgSenderChannel").hide(); 
  	  AddSenderChannel_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivSenderImgSenderChannel").show();
  	}
  	  		  
  }
  else if ((getCookie('QMName')!='')&&(Type=='Receiver'))
  {
	$("#DivReceiverImgQM").hide();
	$("#DivReceiverImgDLTQueue").show();
	$("#DivReceiverImgLocalQueue").show();
	$("#DivReceiverImgSenderChannel").show();
	
	AddReceiverQueueManager_Display(IdUser); 

  	if (getCookie('ChannelName')!='')
  	{
  	  $("#DivReceiverImgReceiverChannel").hide(); 
  	  AddReceiverChannel_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivReceiverImgReceiverChannel").show();
  	}
  	

  	if (getCookie('QueueName')!='')
  	{
  	  $("#DivReceiverImgLocalQueue").hide(); 
  	  AddReceiverLocalQueue_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivReceiverImgLocalQueue").show();
  	}
  		

  	if (getCookie('DLTQueueName')!='')
  	{
  	  $("#DivSenderImgDLTQueue").hide(); 
  	  AddReceiverDLTQueue_Display(IdUser); 
  	}
  	else
  	{
  	  $("#DivSenderImgDLTQueue").show();
  	}
  	

  	  		  
  }
  else if (Type=='Sender')
  {
    $("#DivSenderImgQM").show();
	$("#DivSenderImgRemoteQueue").hide();
	$("#DivSenderImgLocalQueue").hide();
	$("#DivSenderImgSenderChannel").hide();   
  }
  else if (Type=='Receiver')
  {
	$("#DivReceiverImgQM").show();
	$("#DivReceiverImgDLTQueue").hide();
	$("#DivReceiverImgLocalQueue").hide();
	$("#DivReceiverImgReceiverChannel").hide();
  }
  
  HideMQParam();
  
 Other_Display();
 StartChannel(IdUser);
 clearInterval(IdRefresh);
 setInterval(function() {Other_Display(IdUser)}, 5000) // Répète la fonction toutes les 50 sec

	
}


function AddSenderQueueManager(IdUser)
{

   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QMName" placeholder="QM_Pseudonyme"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Port du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Port" placeholder="XXXX" value="1414"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Dead Letter Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLQName" placeholder="DLQ_QueueManagerName"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderQueueManager_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);

}


function UpdateSenderQueueManager(IdUser)
{

   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QMName" placeholder="QM_Pseudonyme" value="'+getCookie('QMName')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Port du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Port" placeholder="XXXX" value="'+getCookie('Port')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Dead Letter Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLQName" placeholder="DLQ_QueueManagerName" value="'+getCookie('DLQName')+'"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderQueueManager_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);

}


function AddSenderQueueManager_OK(IdUser)
{

    var QMName=document.getElementById('QMName').value;
    var Port=document.getElementById('Port').value;
    var DLQName=document.getElementById('DLQName').value;

    
        $.post("./WebServices/UpdateQM.php", {QMName: QMName, Port: Port, DLQName: DLQName, Type:"Sender", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {


                                                       if (data==1)
                                                       {                                  
setCookie('QMName',QMName,-1);
setCookie('Port',Port,-1);
setCookie('DLQName',DLQName,-1);

HideMQParam();                                                            AddSenderQueueManager_Display(IdUser);      
                                                        
                                                       } 


                                                    }
                                                  ); 


	
}


function AddSenderQueueManager_Display(IdUser)
{

	html="MQ Server (Sender)";
	html=html+"<div style='position:absolute; height:160px; margin-left:10px; padding-top:10px; text-align:center; margin-top:0px; font-size:12px; width: 380px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
	html=html+"<a href='javascript:UpdateSenderQueueManager("+IdUser+")'>Queue Manager : "+getCookie('QMName')+"</a>";
  
	html=html+"<BR><BR><div id='Divremotequeue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";

	html=html+"<div id='Divarrowqueue' style='display:inline-block; padding-top:30px; height:50px; padding-left:10px; padding-right:10px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";
		
	html=html+"<div id='Divtransmissionqueue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";	

	html=html+"</div>";
	
	$("#DivMQServer").html(html);

		
    InfoMessage('Le Queue Manager a bien été créé / mis à jour.',2)

	$("#DivSenderImgQM").hide();
	$("#DivSenderImgRemoteQueue").show();
	$("#DivSenderImgLocalQueue").show();
	$("#DivSenderImgSenderChannel").show();   	
}



function AddSenderRemoteQueue(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QueueName" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue distante : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="RemoteQueueName" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager distant : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="RemoteQueueManager" placeholder="QM_PseudoBinome"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la Transmission queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="TransmissionQueueName" placeholder="QM_PseudoBinome"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderRemoteQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateSenderRemoteQueue(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QueueName" value="'+getCookie('QueueName')+'" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue distante : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('RemoteQueueName')+'" id="RemoteQueueName" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager distant : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="RemoteQueueManager" value="'+getCookie('RemoteQueueManager')+'" placeholder="QM_PseudoBinome"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la Transmission queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="TransmissionQueueName" value="'+getCookie('TransmissionQueueName')+'" placeholder="QM_PseudoBinome"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderRemoteQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}

function AddSenderRemoteQueue_OK(IdUser)
{


    var QueueName=document.getElementById('QueueName').value;
    var RemoteQueueName=document.getElementById('RemoteQueueName').value;
    var RemoteQueueManager=document.getElementById('RemoteQueueManager').value;
    var TransmissionQueueName=document.getElementById('TransmissionQueueName').value;
    
        $.post("./WebServices/UpdateRemoteQueue.php", {QueueName: QueueName, RemoteQueueName: RemoteQueueName, RemoteQueueManager: RemoteQueueManager, TransmissionQueueName: TransmissionQueueName, Type:"Remote", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('QueueName',QueueName,-1);
setCookie('RemoteQueueName',RemoteQueueName,-1);
setCookie('RemoteQueueManager',RemoteQueueManager,-1);
setCookie('TransmissionQueueName',TransmissionQueueName,-1);

HideMQParam();   
$("#DivSenderImgRemoteQueue").hide();                                                             
AddSenderRemoteQueue_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddSenderRemoteQueue_Display(IdUser)
{

  
	html="<img id='SenderRemoteQueueImg' onclick='UpdateSenderRemoteQueue("+IdUser+")' style='z-index:2000; position:relative; height:50px;' src='./res/Queue.png'>";
	html=html+"<BR>Remote Queue : "+getCookie('QueueName');
	
	$("#Divremotequeue").html(html);

    InfoMessage('La remote queue a bien été créée / mise à jour.',2)
    

	$("#DivSenderImgRemoteQueue").hide();

    	
}



function AddSenderTransmissionQueue(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="TQueueName" placeholder="QM_PseudoBinome"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Transmission" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderTransmissionQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateSenderTransmissionQueue(IdUser)
{
   ShowMQParam();

   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="TQueueName" placeholder="QX" value="'+getCookie('TQueueName')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Transmission" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderTransmissionQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
      
   
   $('#DivMQServerParams').html(html);
}

function AddSenderTransmissionQueue_OK(IdUser)
{

    var TQueueName=document.getElementById('TQueueName').value;
    var Usage=document.getElementById('Usage').value;
   

    
        $.post("./WebServices/UpdateLocalQueue.php", {QueueName: TQueueName, Usage: Usage,  Type:"Local", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('TQueueName',TQueueName,-1);
setCookie('Usage',Usage,-1);

HideMQParam();   
$("#DivSenderImgLocalQueue").hide();                                                             
AddSenderTransmissionQueue_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddSenderTransmissionQueue_Display(IdUser)
{


	html="<img style='position:relative; width:30px; margin-top:0; ' src='./res/FlecheDroite.png'>";
	$("#Divarrowqueue").html(html);
			
	html="<img id='SenderTransmissionQueueImg' onclick='UpdateSenderTransmissionQueue("+IdUser+")' style='position:relative; height:50px;' src='./res/Queue.png'>";
	html=html+"<BR>Transmission Queue : "+getCookie('TQueueName');;

	$("#Divtransmissionqueue").html(html);

    InfoMessage('La transmission queue a bien été créée.',2)


	$("#DivSenderImgLocalQueue").hide();
	    	
}




function AddSenderChannel(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du channel : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="ChannelName" placeholder="PseudoSender_TO_PseudoReceiver"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Connexion : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Connexion" placeholder="IP of the receiver" ></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Remote Port : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="RemotePort" placeholder="Remote Queue Manager Port" ></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Transmission Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="ChannelTransmissionQueue" placeholder="Transmission Queue Name" ></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderChannel_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateSenderChannel(IdUser)
{
   ShowMQParam();

   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du channel : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('ChannelName')+'" id="ChannelName" placeholder="PseudoSender_TO_PseudoReceiver"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Connexion : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('Connexion')+'" id="Connexion" placeholder="IP of the receiver" ></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Remote Port : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('RemotePort')+'" id="RemotePort" placeholder="Remote Queue Manager Port" ></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Transmission Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('ChannelTransmissionQueue')+'" id="ChannelTransmissionQueue" placeholder="Transmission Queue Name" ></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddSenderChannel_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';

   
   $('#DivMQServerParams').html(html);
}

function AddSenderChannel_OK(IdUser)
{

    var ChannelName=document.getElementById('ChannelName').value;
    var Connexion=document.getElementById('Connexion').value;
    var RemotePort=document.getElementById('RemotePort').value;
    var ChannelTransmissionQueue=document.getElementById('ChannelTransmissionQueue').value;   

    
        $.post("./WebServices/UpdateChannel.php", {ChannelName: ChannelName, Connexion: Connexion, RemotePort: RemotePort, ChannelTransmissionQueue: ChannelTransmissionQueue,  Type:"Sender", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('ChannelName',ChannelName,-1);
setCookie('Connexion',Connexion,-1);
setCookie('RemotePort',RemotePort,-1);
setCookie('ChannelTransmissionQueue',ChannelTransmissionQueue,-1);

setCookie('StartChannel',StartChannel,0); 

									html="<img onclick='StartChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/play.png'>";
									html=html+"<BR>Start";

										$("#DivChannelConnect").html(html);

HideMQParam();   
$("#DivSenderImgSenderChannel").hide();                                                             
AddSenderChannel_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddSenderChannel_Display(IdUser)
{

			
	html="<img onclick='UpdateSenderChannel("+IdUser+")' style='padding-top:75px; position:relative;' src='./res/Channel.png'>";
	html=html+"<BR>Sender Channel:<BR>"+getCookie('ChannelName');

	$("#DivChannel1").html(html);

    InfoMessage('Le sender channel a bien été créé / mis à jour.',2)


	$("#DivSenderImgSenderChannel").hide();
	    	
}





function AddReceiverQueueManager(IdUser)
{

   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QMName" placeholder="QM_Pseudonyme"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Port du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Port" placeholder="XXXX" value="1414"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Dead Letter Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLQName" placeholder="DLQ_QueueManagerName"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverQueueManager_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);

}


function UpdateReceiverQueueManager(IdUser)
{

   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QMName" placeholder="QM_Pseudonyme" value="'+getCookie('QMName')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Port du Queue Manager : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Port" placeholder="XXXX" value="'+getCookie('Port')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Dead Letter Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLQName" placeholder="DLQ_QueueManagerName" value="'+getCookie('DLQName')+'"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverQueueManager_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);

}


function AddReceiverQueueManager_OK(IdUser)
{

    var QMName=document.getElementById('QMName').value;
    var Port=document.getElementById('Port').value;
    var DLQName=document.getElementById('DLQName').value;

    
        $.post("./WebServices/UpdateQM.php", {QMName: QMName, Port: Port, DLQName: DLQName, Type:"Receiver", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {


                                                       if (data==1)
                                                       {                                  
setCookie('QMName',QMName,-1);
setCookie('Port',Port,-1);
setCookie('DLQName',DLQName,-1);

HideMQParam();                                                            AddReceiverQueueManager_Display(IdUser);      
                                                        
                                                       } 


                                                    }
                                                  ); 


	
}


function AddReceiverQueueManager_Display(IdUser)
{

	html="MQ Server (Receiver)";
	html=html+"<div style='position:absolute; height:160px; margin-left:10px; padding-top:10px; text-align:center; margin-top:0px; font-size:12px; width: 380px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
	html=html+"<a href='javascript:UpdateReceiverQueueManager("+IdUser+")'>Queue Manager : "+getCookie('QMName')+"</a>";
  
	html=html+"<BR><BR><div id='DivLocalqueue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";

		
	html=html+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id='DivDLT' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";	

	html=html+"</div>";
	
	$("#DivMQServer2").html(html);

		
    InfoMessage('Le Queue Manager a bien été créé / mis à jour.',2)

	$("#DivReceiverImgQM").hide();
	$("#DivReceiverImgDLTQueue").show();
	$("#DivReceiverImgLocalQueue").show();
	$("#DivReceiverImgReceiverChannel").show();   	
}



function Other_Display(IdUser)
{


	Role=getCookie('Role');
	IdUser=getCookie('IdUser');	



	if (Role=='Sender')
	{

    $.ajax( {
            type: "POST",
            url: "./WebServices/Binome.php",
            data: {IdUser:IdUser,Role:"Sender"},
            async:true,
            dataType: "xml",
            success: function(xml) 
                     {     
                            $(xml).find('Binome').each(   
                            function()
                            { 

                                var IdQM=$(this).find('IdQM').text();
                                var QMName=$(this).find('QMName').text();
                                var LocalQueueName=$(this).find('LocalQueueName').text();                            
                                var DLTQueueName=$(this).find('DLTQueueName').text();
								var ChannelName=$(this).find('ChannelName').text(); 	     
                                

                                   	                             
                                if (IdQM!='0')
                                {

                                html="MQ Server (Receiver)";
								html=html+"<div style='position:absolute; height:160px; margin-left:10px; padding-top:10px; text-align:center; margin-top:0px; font-size:12px; width: 380px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
								
								html=html+"Queue Manager : "+QMName;
  
								html=html+"<BR><BR><div id='DivLocalqueue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
								html=html+"</div>";

		
												html=html+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id='DivDLT' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
								html=html+"</div>";	

								html=html+"</div>";

	
								if (html_DivMQServer2!=html)
								{
									$("#DivMQServer2").html(html); 
									html_DivMQServer2=html;
								}

								}
								else
								{
					   			    $("#DivMQServer2").html(''); 						
								}

                                if (LocalQueueName!='0')
                                {
                                
									html="<img id='ReceiverLocalQueue' style='position:relative; height:50px;' src='./res/Queue.png'>";
									html=html+"<BR>Local Queue : "+LocalQueueName;

								if (html_DivLocalqueue!=html)
								{
									$("#DivLocalqueue").html(html);
									html_DivLocalqueue=html;
								}

 

								}								                                                     
								else
								{
					   			    $("#DivLocalqueue").html(''); 						
								}
								
								 
                                 if (DLTQueueName!='0')
                                {
                                
										html="<img id='ReceiverDLTQueue' style='position:relative; height:50px;' src='./res/Queue.png'>";
										html=html+"<BR>DLT Queue : "+DLTQueueName;

								if (html_DivDLT!=html)
								{
										$("#DivDLT").html(html);
										html_DivDLT=html;
								}

				

								}
								else
								{
					   			    $("#DLTQueueName").html(''); 						
								}	

             
                                
                                 if (ChannelName!='0')
                                {
                                
									html="<img style='padding-top:75px; position:relative;' src='./res/Channel.png'>";
									html=html+"<BR>Receiver Channel:<BR>"+ChannelName;

								if (html_DivChannel2!=html)
								{
									$("#DivChannel2").html(html);
									html_DivChannel2=html;
								}
 
 

	
 								  if ((ChannelName!='0')&&(getCookie('ChannelName')!='')&&(getCookie('StartChannel')=='0'))
 								  {
 								
									html="<img onclick='StartChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/play.png'>";
									html=html+"<BR>Run";

									if (html_DivChannelConnect!=html)
									{
										$("#DivChannelConnect").html(html);
										html_DivChannelConnect=html;
									}
																	 								
 								
 								
 								  }

								}
								else
								{
					   			    $("#ChannelName").html(''); 						
								}
								
								
								
																                                         
                            });
                      }
        });
        
    }
    else
    {



    $.ajax( {
            type: "POST",
            url: "./WebServices/Binome.php",
            data: {IdUser:IdUser,Role:"Receiver"},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {     
                            $(xml).find('Binome').each(   
                            function()
                            { 



                                var IdQM=$(this).find('IdQM').text();
                                var QMName=$(this).find('QMName').text();
                                var RemoteQueueName=$(this).find('RemoteQueueName').text();                            
                                var TransmissionQueueName=$(this).find('TransmissionQueueName').text();
								var ChannelName=$(this).find('ChannelName').text(); 	     
                                

             
                                if (IdQM!='0')
                                {

                                html="MQ Server (Sender)";
								html=html+"<div style='position:absolute; height:160px; margin-left:10px; padding-top:10px; text-align:center; margin-top:0px; font-size:12px; width: 380px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
								
								html=html+"Queue Manager : "+QMName;
  
								html=html+"<BR><BR><div id='DivRemotequeue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
								html=html+"</div>";


	html=html+"<div id='Divarrowqueue' style='display:inline-block; padding-top:30px; height:50px; padding-left:10px; padding-right:10px; text-align:center; position:relative; margin-top:0px;'>";
	html=html+"</div>";
		
												html=html+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id='DivTransmissionQueue' style='display:inline-block; padding-top:30px; text-align:center; position:relative; margin-top:0px;'>";
								html=html+"</div>";	

								html=html+"</div>";


 
								if (html_DivMQServer!=html)
								{  
									$("#DivMQServer").html(html); 
									html_DivMQServer=html;
								}
								                                   	             


								}
								else
								{
					   			    $("#DivMQServer").html(''); 						
								}



                                if (RemoteQueueName!='0')
                                {

									html="<img onclick='UpdateSenderRemoteQueue("+IdUser+")' style='z-index:2000; position:relative; height:50px;' src='./res/Queue.png'>";
									html=html+"<BR>Remote Queue : "+RemoteQueueName;
	
									if (html_DivRemotequeue!=html)
									{
										$("#DivRemotequeue").html(html);
										html_DivRemotequeue=html;
									}

								}								                                                     
								else
								{
					   			    $("#DivRemotequeue").html(''); 						
								}

								 
                                 if (TransmissionQueueName!='0')
                                {

	html="<img style='position:relative; width:30px; margin-top:0; ' src='./res/FlecheDroite.png'>";
	$("#Divarrowqueue").html(html);
			
	html="<img onclick='UpdateSenderTransmissionQueue("+IdUser+")' style='position:relative; height:50px;' src='./res/Queue.png'>";
	html=html+"<BR>Transmission Queue : "+TransmissionQueueName;

									if (html_DivTransmissionQueue!=html)
									{
										$("#DivTransmissionQueue").html(html);
										html_DivTransmissionQueue=html;
									
									}
	                                
								}
								else
								{
					   			    $("#DivTransmissionQueue").html(''); 						
								}	

             
                                
                                 if (ChannelName!='0')
                                {

			
	html="<img onclick='UpdateSenderChannel("+IdUser+")' style='padding-top:75px; position:relative;' src='./res/Channel.png'>";
	html=html+"<BR>Sender Channel:<BR>"+ChannelName;

	$("#DivChannel1").html(html);
	                                
								}
								else
								{
									if (html_DivChannel1!=html)
									{
					   			    	$("#DivChannel1").html(''); 
					   			    	html_DivChannel1=html;
					   			    }						
								}
								
																                                         
                            });
                      }
        });

    
    }



		
		
		CheckMessage(IdUser);
		
}




function AddReceiverChannel(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du channel : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="ChannelName" placeholder="PseudoReceiver_TO_PseudoReceiver"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverChannel_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateReceiverChannel(IdUser)
{
   ShowMQParam();

   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom du channel : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" value="'+getCookie('ChannelName')+'" id="ChannelName" placeholder="PseudoReceiver_TO_PseudoReceiver"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverChannel_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';

   
   $('#DivMQServerParams').html(html);
}

function AddReceiverChannel_OK(IdUser)
{

    var ChannelName=document.getElementById('ChannelName').value;

    
        $.post("./WebServices/UpdateChannel.php", {ChannelName: ChannelName,  Type:"Receiver", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('ChannelName',ChannelName,-1);


HideMQParam();   
$("#DivReceiverImgReceiverChannel").hide();                                                             
AddReceiverChannel_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddReceiverChannel_Display(IdUser)
{

			
	html="<img onclick='UpdateReceiverChannel("+IdUser+")' style='padding-top:75px; position:relative;' src='./res/Channel.png'>";
	html=html+"<BR>Receiver Channel:<BR>"+getCookie('ChannelName');

	$("#DivChannel2").html(html);

    InfoMessage('Le Receiver channel a bien été créé / mis à jour.',2)


	$("#DivReceiverImgReceiverChannel").hide();
	    	
}





function AddReceiverLocalQueue(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QueueName" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Normal" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverLocalQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateReceiverLocalQueue(IdUser)
{
   ShowMQParam();

   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="QueueName" placeholder="QX" value="'+getCookie('QueueName')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Normal" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverLocalQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
      
   
   $('#DivMQServerParams').html(html);
}

function AddReceiverLocalQueue_OK(IdUser)
{

    var QueueName=document.getElementById('QueueName').value;
    var Usage=document.getElementById('Usage').value;
   

    
        $.post("./WebServices/UpdateLocalQueue.php", {QueueName: QueueName, Usage: Usage,  Type:"Local", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('QueueName',QueueName,-1);
setCookie('Usage',Usage,-1);

HideMQParam();   
$("#DivReceiverImgLocalQueue").hide();                                                             
AddReceiverLocalQueue_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddReceiverLocalQueue_Display(IdUser)
{

			
	html="<img id='ReceiverLocalQueue' onclick='UpdateReceiverLocalQueue("+IdUser+")' style='position:relative; height:50px;' src='./res/Queue.png'>";
	html=html+"<BR>Local Queue : "+getCookie('QueueName');

	$("#DivLocalqueue").html(html);

    InfoMessage('La Local queue a bien été créée / mise à jour.',2)


	$("#DivReceiverImgLocalQueue").hide();
	    	
}




function AddReceiverDLTQueue(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLTQueueName" placeholder="QX"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Normal" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverDLTQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function UpdateReceiverDLTQueue(IdUser)
{
   ShowMQParam();

   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Nom de la queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="DLTQueueName" placeholder="QX" value="'+getCookie('DLTQueueName')+'"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Usage : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="Usage" value="Normal" readonly></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="AddReceiverDLTQueue_OK('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
      
   
   $('#DivMQServerParams').html(html);
}

function AddReceiverDLTQueue_OK(IdUser)
{

    var DLTQueueName=document.getElementById('DLTQueueName').value;
    var Usage=document.getElementById('Usage').value;
   

    
        $.post("./WebServices/UpdateLocalQueue.php", {QueueName: DLTQueueName, Usage: Usage,  Type:"DLT", IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('DLTQueueName',DLTQueueName,-1);


HideMQParam();   
$("#DivReceiverImgDLTQueue").hide();                                                             
AddReceiverDLTQueue_Display(IdUser); 
                                                       } 


                                                    }
                                                  ); 


	
}


function AddReceiverDLTQueue_Display(IdUser)
{

			
	html="<img id='ReceiverDLTQueue' onclick='UpdateReceiverDLTQueue("+IdUser+")' style='position:relative; height:50px;' src='./res/Queue.png'>";
	html=html+"<BR>DLT Queue : "+getCookie('DLTQueueName');

	$("#DivDLT").html(html);

    InfoMessage('La Dead Letter Queue a bien été créée / mise à jour.',2)


	$("#DivReceiverImgDLTQueue").hide();
	    	
}


function StartChannel(IdUser)
{

    
        $.post("./WebServices/StartChannel.php", {IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('StartChannel','1',-1); 
InfoMessage('Channel démarré avec succès.', 2);  

									html="<img onclick='StopChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/stop.png'>";
									html=html+"<BR>Stop";

										$("#DivChannelConnect").html(html);
										
                                                        
                                                       } 
                                                       else
                                                       {
setCookie('StartChannel','0',-1);
InfoMessage('Channel non démarré. Impossible de se connecter au Receiver Channel.', 3);

									html="<img onclick='StartChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/play.png'>";
									html=html+"<BR>Start";

										$("#DivChannelConnect").html(html);
										
                                                       }


                                                    }
                                                  ); 


	
}



function PostMessage_Form(IdUser)
{
   ShowMQParam();
   
   var html='<div style="text-align:right; height:36px; line-height:36px; width:350;">Message : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="MessageContent" placeholder="Mon message"></div><div style="text-align:right; height:36px; line-height:36px; width:350;">Remote Queue : <input style="float:right; border-width:1px; line-height:36px; height:36px; width:150px; font-weight:lighter;" type="text" id="MessageRemoteQueue" placeholder="QX"></div><BR><BR><div style=""><img onclick="HideMQParam()" style="width:45px;" src="./res/dialog-cancel.png">&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="PostMessageStep1('+IdUser+')" style="width:45px;" src="./res/ok.png"></div>';
   
   $('#DivMQServerParams').html(html);
}


function GetMessage(IdUser)
{
	Role=getCookie('Role');

     $.ajax( {
            type: "POST",
            url: "./WebServices/GetMessage.php",
            data: {IdUser:IdUser,Role:Role},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                     
                        if (Role=='Receiver')
                        {
                            $(xml).find('Message').each(   
                            function()
                            { 

                                var MessageContent=$(this).find('MessageContent').text();
                                var Step=$(this).find('Step').text();
                                
                                if (Step==6)
                                {
                                  InfoConsole('Le message dans la dead letter queue est : '+MessageContent);
                                }
                                else if (Step==5)
                                {
                                  InfoConsole('Le message dans la local queue est : '+MessageContent);                                
                                }
                                
                                CheckMessage(IdUser);
                            });
                        }
                    }
                });
}
                    


function CheckMessage(IdUser)
{


	Role=getCookie('Role');

     $.ajax( {
            type: "POST",
            url: "./WebServices/CheckMessage.php",
            data: {IdUser:IdUser,Role:Role},
            async:false,
            dataType: "xml",
            success: function(xml) 
                     {    
                     
                        if (Role=='Sender')
                        {
                            $(xml).find('Message').each(   
                            function()
                            { 

                                var MessageContent=$(this).find('MessageContent').text();
                                var Step=$(this).find('Step').text();

								if (Step==5)
								{
							   $('#ReceiverLocalQueue').attr("src","./res/QueueMessageG.png");
								}
								else
								{
$('#ReceiverLocalQueue').attr("src","./res/Queue.png");
								}
								
			
								if (Step==6)
								{
							   $('#ReceiverDLTQueue').attr("src","./res/QueueMessageG.png");
								}
								else
								{
$('#ReceiverDLTQueue').attr("src","./res/Queue.png");
								}


								if (Step==1)
								{
							   $('#SenderRemoteQueueImg').attr("src","./res/QueueMessage.png");
								}
								else
								{
$('#SenderRemoteQueueImg').attr("src","./res/Queue.png");
								}
								
			
								if (Step==2)
								{
							   $('#SenderTransmissionQueueImg').attr("src","./res/QueueMessage.png");
								}
								else
								{
$('#SenderTransmissionQueueImg').attr("src","./res/Queue.png");
								}
								
																
								
								

                            });
                            
                            
                        }
                        else
                        {
                            $(xml).find('Message').each(   
                            function()
                            { 

                                var MessageContent=$(this).find('MessageContent').text();
                                var Step=$(this).find('Step').text();

								if (Step==5)
								{
							   $('#ReceiverLocalQueue').attr("src","./res/QueueMessageG.png");
								}
								else
								{
$('#ReceiverLocalQueue').attr("src","./res/Queue.png");
								}
								
			
								if (Step==6)
								{
							   $('#ReceiverDLTQueue').attr("src","./res/QueueMessageG.png");
								}
								else
								{
$('#ReceiverDLTQueue').attr("src","./res/Queue.png");
								}
								   
								   
							});                     
                        }
                            
                        }
                });

}  

    
function PostMessageStep1(IdUser)
{

   HideMQParam();
   
   $("#DivConsole").html(">>> Console de suivi d'envoi d'un message");

   var MessageContent=document.getElementById('MessageContent').value;
   var MessageRemoteQueue=document.getElementById('MessageRemoteQueue').value;
   

    
   $.post("./WebServices/PostMessageStep1.php", {MessageContent: MessageContent, MessageRemoteQueue: MessageRemoteQueue, IdUser:IdUser}
                                                    ,function(data,status)
                                                    {



                                                       if (data!='0')
                                                       { 
CheckMessage(IdUser);                                                                                        
InfoConsole('Remote Queue bien trouvée, recherche de la transmission queue.');
setTimeout(function(){ PostMessageStep2(IdUser,data) }, 2000);


                                                       } 
                                                       else
                                                       {
CheckMessage(IdUser);                                                       
InfoConsole('Remote Queue non trouvée.');

                                                       }


                                                    }
                                                  );                                              
}


function PostMessageStep2(IdUser, IdMessage)
{


    
   $.post("./WebServices/PostMessageStep2.php", {IdUser: IdUser, IdMessage: IdMessage}
                                                    ,function(data,status)
                                                    {

                                                       if (data!='0')
                                                       { 
CheckMessage(IdUser);                                                                                        
InfoConsole('Transmission Queue bien trouvée, vérification du channel.');
setTimeout(function(){PostMessageStep3(IdUser, IdMessage, data)}, 2000);

                                                       } 
                                                       else
                                                       {
CheckMessage(IdUser);                                                       
InfoConsole('Transmission Queue non trouvée');

                                                       }


                                                    }
                                                  );                                              
}


function PostMessageStep3(IdUser, IdMessage)
{


                                                       if (getCookie('StartChannel')=='1')
                                                       { 
CheckMessage(IdUser);                                                                                        
InfoConsole('Le Channel est OK, envoi du message au queue manager distant.');
setTimeout(function(){PostMessageStep4(IdUser, IdMessage)}, 2000);

                                                       } 
                                                       else
                                                       {
CheckMessage(IdUser);                                                       
InfoConsole('Channel KO, le message est bloqué dans la transmission queue');

                                                       }

                                   
}



function PostMessageStep4(IdUser, IdMessage)
{

   var MessageRemoteQueue=document.getElementById('MessageRemoteQueue').value;

    
   $.post("./WebServices/PostMessageStep4.php", {IdUser: IdUser, IdMessage: IdMessage, MessageRemoteQueue:MessageRemoteQueue}
                                                    ,function(data,status)
                                                    {

                                                       if (data=='1')
                                                       { 
                                                                                        
InfoConsole('Remote Queue Manager trouvé, le message est arrivé dans le queue manager distant. Recherche de la local queue pour déposer le message.');

CheckMessage(IdUser);
setTimeout(function(){PostMessageStep5(IdUser, IdMessage, data)}, 2000);

                                                       } 
                                                       else
                                                       {
CheckMessage(IdUser);                                                       
InfoConsole('Remote queue manager non trouvé. Le message reste dans la transmission queue');

                                                       }


                                                    }
                                                  );                                              
}



function PostMessageStep5(IdUser, IdMessage)
{

   var MessageRemoteQueue=document.getElementById('MessageRemoteQueue').value;

    
   $.post("./WebServices/PostMessageStep5.php", {IdUser: IdUser, IdMessage: IdMessage, MessageRemoteQueue:MessageRemoteQueue}
                                                    ,function(data,status)
                                                    {

                                                       if (data=='1')
                                                       { 
CheckMessage(IdUser);                                                                                        
InfoConsole('Local Queue trouvée, le message est arrivé à son destinataire');


                                                       } 
                                                       else
                                                       {
CheckMessage(IdUser);                                                       
InfoConsole('Local Queue distante non trouvée, le message est dans la dead letter queue du queue manager distant');

                                                       }


                                                    }
                                                  );                                              
}

function InfoConsole(Message)
{


$("#DivConsole").html($("#DivConsole").html()+'<BR>> '+Message);



}

function StopChannel(IdUser)
{

    
        $.post("./WebServices/StopChannel.php", {IdUser:IdUser}
                                                    ,function(data,status)
                                                    {

                                                       if (data==1)
                                                       {                                  
setCookie('StartChannel','0',-1); 
InfoMessage('Channel arrêté avec succès.', 2);  

									html="<img onclick='StartChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/play.png'>";
									html=html+"<BR>Start";

										$("#DivChannelConnect").html(html);
										
                                                        
                                                       } 
                                                       else
                                                       {
setCookie('StartChannel','1',-1);
InfoMessage('Impossible de stopper le Channel.', 3);

									html="<img onclick='StopChannel("+IdUser+")' style='padding-top:75px; position:relative;' width=40px; src='./res/stop.png'>";
									html=html+"<BR>Stop";

										$("#DivChannelConnect").html(html);
										
                                                       }


                                                    }
                                                  ); 


	
}

function MQActionOnMouseOver(Id)
{

   if (Id==1)
   {
      document.getElementById('SenderImgQM').style.width = 75;
      document.getElementById('SenderImgQM').style.height = 75;      
   }
   
   if (Id==2)
   {
      document.getElementById('SenderImgLocalQueue').style.width = 75;
      document.getElementById('SenderImgLocalQueue').style.height = 75;   
   }

   if (Id==3)
   {
      document.getElementById('SenderImgRemoteQueue').style.width = 75;   
      document.getElementById('SenderImgRemoteQueue').style.height = 75;
   }
   
   if (Id==4)
   {
      document.getElementById('SenderImgSenderChannel').style.width = 75;   
      document.getElementById('SenderImgSenderChannel').style.height = 75;
   }

   if (Id==9)
   {
      document.getElementById('SenderImgPostMessage').style.width = 75;   
      document.getElementById('SenderImgPostMessage').style.height = 75;
   }
      
   if (Id==5)
   {
      document.getElementById('ReceiverImgQM').style.width = 75;
      document.getElementById('ReceiverImgQM').style.height = 75;      
   }
   
   if (Id==6)
   {
      document.getElementById('ReceiverImgLocalQueue').style.width = 75;
      document.getElementById('ReceiverImgLocalQueue').style.height = 75;   
   }

   if (Id==7)
   {
      document.getElementById('ReceiverImgDLTQueue').style.width = 75;   
      document.getElementById('ReceiverImgDLTQueue').style.height = 75;
   }
   
   if (Id==8)
   {
      document.getElementById('ReceiverImgReceiverChannel').style.width = 75;   
      document.getElementById('ReceiverImgReceiverChannel').style.height = 75;
   }
   
   if (Id==10)
   {
      document.getElementById('ReceiverImgGetMessage').style.width = 75;   
      document.getElementById('ReceiverImgGetMessage').style.height = 75;
   }
   
}

function MQActionOnMouseOut(Id)
{

   if (Id==1)
   {
      document.getElementById('SenderImgQM').style.width = 50;
      document.getElementById('SenderImgQM').style.height = 50;      
   }
   
   if (Id==2)
   {
      document.getElementById('SenderImgLocalQueue').style.width = 50;
      document.getElementById('SenderImgLocalQueue').style.height = 50;   
   }

   if (Id==3)
   {
      document.getElementById('SenderImgRemoteQueue').style.width = 50;   
      document.getElementById('SenderImgRemoteQueue').style.height = 50;
   }
   
   if (Id==4)
   {
      document.getElementById('SenderImgSenderChannel').style.width = 50;   
      document.getElementById('SenderImgSenderChannel').style.height = 50;
   }
   
   if (Id==9)
   {
      document.getElementById('SenderImgPostMessage').style.width = 50;   
      document.getElementById('SenderImgPostMessage').style.height = 50;
   }
   
   if (Id==5)
   {
      document.getElementById('ReceiverImgQM').style.width = 50;
      document.getElementById('ReceiverImgQM').style.height = 50;      
   }
   
   if (Id==6)
   {
      document.getElementById('ReceiverImgLocalQueue').style.width = 50;
      document.getElementById('ReceiverImgLocalQueue').style.height = 50;   
   }

   if (Id==7)
   {
      document.getElementById('ReceiverImgDLTQueue').style.width = 50;   
      document.getElementById('ReceiverImgDLTQueue').style.height = 50;
   }
   
   if (Id==8)
   {
      document.getElementById('ReceiverImgReceiverChannel').style.width = 50;   
      document.getElementById('ReceiverImgReceiverChannel').style.height = 50;
   }
   
   if (Id==10)
   {
      document.getElementById('ReceiverImgGetMessage').style.width = 50;   
      document.getElementById('ReceiverImgGetMessage').style.height = 50;
   }
}



function MenuOnMouseOver(Id)
{

      document.getElementById('DivMenu'+Id).style.opacity = 1;    

}

function MenuOnMouseOut(Id)
{

      document.getElementById('DivMenu'+Id).style.opacity = 0.7;   

}
