var check = function() {
				if(document.getElementById('password').value =="" or
				document.getElementById('confirm_password').value=="")
				{
					document.getElementById('message').style.color = '#1ABB9C';
					document.getElementById('message').innerHTML = 'Please fill the Empty Feild </br>';
					
				}
				else{
					 if (document.getElementById('password').value ==
						document.getElementById('confirm_password').value)
						{
						document.getElementById('message').style.color = '#1ABB9C';
						document.getElementById('message').innerHTML = 'matching </br>';
						} 
					else {
						document.getElementById('message').style.color = 'red';
						document.getElementById('message').innerHTML = 'not matching</br>';
						}
				}

			}