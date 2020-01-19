
var graine="<img src='../../core/static/images/gui_graine.png' border='0' height='30' width='30'>";


setEvents();
var plateau = document.getElementByClassName("plateau");

function setEvents(){//ajout de graines
	var cases = document.getElementsByClassName("case");
	for (var i = 0; i < cases.length; i++) {
		
	//alert(i);
		
		//cases[i].getElementByTagName('img').style.display = "none";		
	

//noContext.addEventListener('contextmenu', e => {
//  e.preventDefault();
//});
		cases[i].addEventListener("click", function (){
			var quantite =	parseInt(this.getAttribute("quantite"))		
						
			if(quantite== 0){
					  
					this.innerHTML = graine;					
					//this.getElementByTagName('img').style.display = "inline";
					//this.innerHTML = "<img src='"+images[0].src+"' border='0'>";
					quantite++;					
					this.setAttribute("quantite", quantite.toString());
					
					

				
			}else{	
				this.innerHTML = "";
				var update=" ";
				for(var t = 0; t <= quantite; t++){
					update += graine;
					
				}
				this.innerHTML = update;	
				quantite++;					
				this.setAttribute("quantite", quantite.toString());
				
			}

		});


}
for (var i = 0; i < cases.length; i++) {//supression de graines
		

		
		//cases[i].getElementByTagName('img').style.display = "none";		
		
		cases[i].addEventListener("contextmenu", function(){

			alert(10);			
			var quantite1 =	parseInt(this.getAttribute("quantite"))		
						
			if(quantite1!= 0){
				this.innerHTML = "";
				var update1="";
				for(var t = 0; t < quantite1-1; t++){
					update1 += graine;
					
				}
				this.innerHTML = update1;	
				quantite1--;
					
				this.setAttribute("quantite", quantite1.toString());
				//alert(quantite1);		
			}

		});


}
for (var i = 0; i < cases.length; i++) {//set 4 graines pour chaque case
		

		
		//cases[i].getElementByTagName('img').style.display = "none";		
		
		cases[i].addEventListener("dblclick", function(){
	
		
				
		//	if (nomTouche === 'Control') 
				
		
				this.innerHTML = " ";
				var update1=" ";
				for(var t = 0; t < 4; t++)
					update1 += graine;
					
				
				this.innerHTML = update1;	
					
				this.setAttribute("quantite", "4");
				var quantite1 =	parseInt(this.getAttribute("quantite"))	
				//alert(quantite1);
							
			

		});


}

}

