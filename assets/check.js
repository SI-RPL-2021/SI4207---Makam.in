function check() {
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	if (email!= "" && password!= "") {
		return true;
	}else{
		alert('Email dan Password tidak boleh kosong!');
		return false;
	}
}

function find() {
	var input, filter, table, tr, td, i, txtValue;
  	input = document.getElementById("find");
  	filter = input.value.toUpperCase();
  	table = document.getElementById("tabel");
  	tr = table.getElementsByTagName("tr");
  	for (i = 0; i < tr.length; i++) {
    	td = tr[i].getElementsByTagName("td")[0];
    	if (td) {
      		txtValue = td.textContent || td.innerText;
      		if (txtValue.toUpperCase().indexOf(filter) > -1) {
        		tr[i].style.display = "";
      		} else {
        		tr[i].style.display = "none";
      		}
    	}       
  	}
}

function findnota() {
  var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("findnota");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabelnota");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
      }       
    }
}

function finduser() {
  var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("finduser");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabeluser");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
      }       
    }
}

function finds() {
  var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("find");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabel");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
      }       
    }
}

function buttonEnter() {
  document.getElementById("button").style.color = "black";
}

function buttonEnterLogout() {
  document.getElementById("buttonlogout").style.color = "black";
}

function buttonLeave() {
  document.getElementById("button").style.color = "white";
}

function buttonLeaveLogout() {
  document.getElementById("buttonlogout").style.color = "white";
}