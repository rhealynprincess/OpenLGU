function enlarge(element){
	document.getElementById("enlarge_panel").style.display='block';
	document.getElementById("enlarge_photo").innerHTML='<img class="enlarged" src="'+element+'">';
}
	
function close_enlarge(){
	document.getElementById("enlarge_panel").style.display='none';
}
