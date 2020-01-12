let apiurl = "./api/"
function register() {
	
	$.ajax({
		type:"POST",
		url: apiurl + 'register' ,
        data: $('#userData').find('.data').serialize(),
        statusCode:{
        	200: function (res) {
        		//Cookies.set('token',res,{expires:7, path:''});
        		console.log(res)
        		alert('register successfully');
        	},
        	400: function (res) {
        		console.log(res.responseJSON[0])
        		alert(res.responseJSON[0]);
        	}
        }
	});
	
	console.log(apiurl);
}

function login() {
	$.ajax({
		type:"POST",
		url: apiurl + 'login' ,
        data: $('#userData').find('.data').serialize(),
        statusCode:{
        	200: function (res) {
        		//Cookies.set('token',res,{expires:7, path:''});
        		console.log(res)
        		alert('login successfully');
        	},
        	400: function (res) {
        		console.log(res.responseJSON[0])
        		alert(res.responseJSON[0]);
        	}
        }
	});
	console.log('login');
}