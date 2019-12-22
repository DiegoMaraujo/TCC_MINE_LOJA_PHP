
<!-- Trigger/Open The Modal -->
<?php 

require_once("home/head.php") 
?>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php require_once("home/divContato.php") ?>
  </div>
</div>

<!-- The Modal -->
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>
     <?php require_once("home/divCliente.php") ?>
  </div>
</div>
</div>
<script type="text/javascript">
// Get the modal
// Pega o modal

var modal = document.getElementById("myModal");

var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
// Pega o botão que abre o modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks on the button, open the modal
// Quando o usuário clicar no botão, abra o modal
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
// Quando o usuário clicar em <span> (x), feche o modal
span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal1.style.display = "none";
}



// When the user clicks anywhere outside of the modal, close it
// Quando o usuário clicar em qualquer lugar fora do modal, feche-o
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
    if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

</script>

<style type="text/css">
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: 
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;


}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
/*botão 2 o fechamento*/
.close1 {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close1:hover,
.close1:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
  .botao{
    margin-left:1000px;
  }

</style>