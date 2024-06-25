var pass = document.getElementById("InputPassword")
pass.addEventListener('keyup', function(){
	checkPassword(pass.value)
})
var all = document.getElementById('show')
all.addEventListener('click', function(){
	if(all.checked){
		pass.setAttribute('type', 'text')
	}else {
		pass.setAttribute('type', 'password')
	}	
})

function checkPassword(InputPassword){
	var strengthBar = document.getElementById("strength")
	var strength = 0;
	// Jika input karakter seperti dalam tanda bracket 1
	if (InputPassword.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
		strength += 1
	}
	// Jika input karakter seperti dalam tanda bracket 2
	if (InputPassword.match(/[~<>?]+/)){
		strength += 1
	}
	// Jika input karakter seperti dalam tanda bracket 3
	if (InputPassword.match(/[!@#$%^&*()]+/)){
		strength += 1
	}
	if (InputPassword.length >= 8) {
		strength += 1
	}
	switch(strength){
		//  akan menampilkan status progress bars sesuai Jika input sesuai karakter seperti dalam tanda bracket
		case 0:
				strengthBar.value = 10;
				$('#submit').prop('disabled', true);
				break
		case 1:
				strengthBar.value = 30;
				$('#submit').prop('disabled', true);
				break
		case 2:
				strengthBar.value = 50;
				$('#submit').prop('disabled', true);
				break
		case 3:
				strengthBar.value = 70;
				$('#submit').prop('disabled', false);
				break
		case 4:
				strengthBar.value = 100;
				$('#submit').prop('disabled', false);
				break
	}
}