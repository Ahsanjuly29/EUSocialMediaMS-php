	function myClock(){
		var time = new Date();
		var	hours= time.getHours();
		var	mins= time.getMinutes();
		var	sec= time.getSeconds();
	/*	
	if(sec<10){
		sec="0"+sec;
	}
	if(mins<10){
		mins="0"+sec;
	}

	if(hour<10){
		hour="0"+sec;
	}	*/
	mins = checkTime(mins);
	sec = checkTime(sec);
	document.getElementById('clock').innerHTML = hours+":"+mins+":"+sec;

	var timer = setTimeout(myclock, 500);
	}
	function checkTime(i){
		if(i < 10){i = "0" + i};
		return i;
	}
