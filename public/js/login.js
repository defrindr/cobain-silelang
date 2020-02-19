let loginUsername = document.querySelector("input.form-control[name='username']");
let loginPassword = document.querySelector("input.form-control[name='password']");

document.querySelector("input.form-control[name='username']").addEventListener('keyup',function(){
	if(loginUsername.value != ""){
		document.querySelector("label[for='username").setAttribute('class','uwu')
	}else{
		document.querySelector("label[for='username").removeAttribute('class')
	}
})

document.querySelector("input.form-control[name='password']").addEventListener('keyup',function(){
	if(loginPassword.value != ""){
		document.querySelector("label[for='password']").setAttribute('class', 'uwu')
	}else {
		document.querySelector("label[for='password']").removeAttribute('class')
	}
})

if(document.querySelector('.close')){
	document.querySelector('.close').addEventListener('click',function(){
		document.querySelector('.alert').style.display = 'none';
	})
}