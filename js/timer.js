    if(localStorage.getItem("counter")){
      if(localStorage.getItem("counter") >= 30){
        var value = 0;
		//window.location.replace("../index.php");
      }else{
        var value = localStorage.getItem("counter");
      }
    }else{
      var value = 0;
	  //window.location.replace("../index.php");
    }
    document.getElementById('divCounter').innerHTML = value;

    var counter = function (){
      if(value >= 30){
        localStorage.setItem("counter", 0);
		//window.location.replace("../index.php");
        value = 0;
		
      }else{
        value = parseInt(value)+1;
        localStorage.setItem("counter", value);
      }
      document.getElementById('divCounter').innerHTML = value;
    };

    var interval = setInterval(function (){counter();}, 1000);

function stop(){
    return localStorage.setItem("counter", 0);
}
