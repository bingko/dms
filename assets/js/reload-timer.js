// JavaScript Document
	var flag=0;
	setInterval(function(){
	var n = new Date().getMinutes();
	if(n==5 && flag!=1){
		window.location.reload(1);
		flag=1;
	}
	else if(n==15 && flag!=2){
		window.location.reload(1);
		flag=2;
	}
	else if(n==25 && flag!=3){
		window.location.reload(1);
		flag=3;
	}
	else if(n==35 && flag!=4){
		window.location.reload(1);
		flag=3;
	}
	else if(n==45 && flag!=5){
		window.location.reload(1);
		flag=3;
	}
	else if(n==55 && flag!=6){
		window.location.reload(1);
		flag=3;
	}
	},60000);