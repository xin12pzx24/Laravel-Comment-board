let apiurl = "./api/";
let modal = document.getElementById("myModal");
let add_dialog = document.getElementById("add_dialog");
let span = document.getElementsByClassName("close")[0];


add_dialog.onclick = function() {
	modal.style.display = "block";
}

span.onclick = function() {
	modal.style.display = "none";
}

window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

function addRow(arr) {
	let table = document.getElementById("table_id");
	let tbody = document.getElementById("tbody_id");

	//let rowCount = table.rows.length;
	//let row = table.insertRow(rowCount);
	let row = tbody.insertRow(-1);// insert cell at the last position
	//row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
	row.insertCell(0).innerHTML= arr['comment_id'];
	row.insertCell(1).innerHTML= arr['account'];
	row.insertCell(2).innerHTML= arr['title'];
	row.insertCell(3).innerHTML= arr['content'];
	row.insertCell(4).innerHTML= '<input type="button" value="Edit" class="btn" onclick="editRow(this.parentNode.parentNode)" disabled>';
	row.insertCell(5).innerHTML= '<input type="button" value="Delete" class="btn" onclick="deleteRow(this.parentNode.parentNode)">';

}

function deleteRow(obj) {
	console.log($(obj).find("td:first").text());
	
	let table = document.getElementById("table_id");
	let index = obj.parentNode.parentNode.rowIndex;
	table.deleteRow(index);
	console.log(index);
	
	//let aa = JSON.parse('{comment_id:'+parseInt(id)+'}');
	

	let id =$(obj).find("td:first").text();
	let aa = JSON.parse('{ "comment_id":'+parseInt(id)+', "account":'+ document.getElementById("account").value +'}');
	$.ajax({
		type: "DELETE",
		//url: apiurl + 'login' ,
		url: apiurl + 'deleteComment',
		data: aa,
		statusCode: {
			200: function(res) {
				console.log(res);
				api_result = res;
			},
			400: function(res) {
				//console.log(res.responseJSON[0])
				alert(res.responseJSON[0]);
				//api_result = res;
			}
		}
	});
	
}

function addComment(argument) {
	$.ajax({
		type: "POST",
		//url: apiurl + 'login' ,
		url: apiurl + 'comment',
		data: $('#myModal').find('.input-field').serializeArray(),
		statusCode: {
			200: function(res) {
				console.log(res);
				// api_result = res;
				addRow(res);
			},
			400: function(res) {
				//console.log(res.responseJSON[0])
				alert(res.responseJSON[0]);
				//api_result = res;
			}
		}
	});
	$(':input','.modal-content')
	.not(':button, :submit, :reset, :hidden')
	.val('');
	modal.style.display = "none";

}

function getComments() {
	$.ajax({
		type: "GET",
		//url: apiurl + 'login' ,
		url: apiurl + 'getComments',
		// data: $('#' + form_id).serializeArray(),
		statusCode: {
			200: function(res) {
				//Cookies.set('token',res,{expires:7, path:''});
				console.log(res);
				api_result = res;
				for(var k in res) {
					console.log(k, res[k]);
					addRow(res[k]);
				}
			},
			400: function(res) {
				console.log(res.responseJSON[0])
				alert(res.responseJSON[0]);
			}
		}
	});
}

function logout() {
	deleteCookie('token');
	window.location.href = "./";
}

$(document).ready(function () {
	if (getCookie('token')=== undefined){
		alert('Login first.');
		window.location.href = "./";
	}
	//console.log(getCookie('token'));
	document.getElementById("account").value = JSON.parse(getCookie('token'))['account'];
	document.getElementById("span_name").innerText = 'Hello, ' + JSON.parse(getCookie('token'))['name'];
	getComments();
	//addRow();
	//addRow();
	//addRow();
	//addRow();
});
