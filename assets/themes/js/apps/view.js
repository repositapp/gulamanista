var pass2 = document.getElementById("old_password")
pass2.addEventListener('keyup', function(){
	checkPassword(pass2.value)
})
var all = document.getElementById('show')
all.addEventListener('click', function(){
	if(all.checked){
		pass2.setAttribute('type', 'text')
	}else {
		pass2.setAttribute('type', 'password')
	}	
})