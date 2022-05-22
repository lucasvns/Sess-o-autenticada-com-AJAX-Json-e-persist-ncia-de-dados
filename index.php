<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessão de Usuário</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
  body {
    margin: 1px;
    background-image: linear-gradient(to right, #0F2027, #203A43, #2C5364, #2C5364, #203A43, #0F2027);
  }
</style>

<body>

<section id="loginSection">
  <div class="container">
    <div class="row" style="height: 25%;">
    </div>
    <div class="row">
    <div class="col-12">		
      <div class="card text-center">
        <div class="card-header bg-dark text-white">
        <b><div id="resultado"></div></b>
        </div>
        <div class="card-body">
        <form>
        <div class="form-group">				
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Login</span>
            </div>
            <input id="login" name="login" type="text" class="form-control" aria-label="Login" aria-describedby="inputGroup-sizing-default" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input id="password" name="password" type="password" class="form-control" aria-label="Password" aria-describedby="inputGroup-sizing-default" required>
          </div>
          <br>
          <!-- <a href="#" id="fechar_sessao" class="btn btn-dark">Logout</a> -->
          <a href="#" id="abrir_sessao" class="btn btn-dark">Login</a>
        </div>
        </form>
        </div>
        <div class="card-footer bg-dark text-white text-muted"></div>
      </div>
    </div>
    </div>
  </div>
</section>

<section id="atividadesSection">
  <div class="container">
  <div class="row" style="height: 25%;"></div>
    <div class="row" >
      <table class="table table-light table-striped">
        <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col" style="width: 60%;">Atividade</th>
          <th scope="col" style="width: 25%;">Data</th>
          <th scope="col" style="width: 15%;">Operações</th>
        </tr>
        </thead>
        <tbody id="atividades">
        
        </tbody>
        <tfoot style="border-top: 2px solid black;">
          <tr>
          <td class="text-center" scope="row" colspan="4">
            <button class="btn add" id="add"><i class="fa-solid fa-plus" style="color: green;"></i></button>
          </td>
        </tr>
          <tfoot>	
        </tfoot>
      </table>
    </div>
    <a href="#" id="fechar_sessao" class="btn btn-dark">Logout</a>
  </div>

  <div id="myModalCriar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nova Atividade</h4>
        </div>
        <div class="modal-body">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Atividade</span>
        </div>
        <input type="text" id="txtCriarAtividade" class="form-control" aria-label="Atividade" aria-describedby="inputGroup-sizing-default">
        <p id="respostaCriarAtividade"></p>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-criar" >Criar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="myModalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar Atividade</h4>
        </div>
        <div class="modal-body">
      <input type="hidden" id="rowEdit">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Atividade</span>
        </div>
        <input type="text" id="txtModificarAtividade" class="form-control" aria-label="Atividade" aria-describedby="inputGroup-sizing-default">
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success btn-editar" >Atualizar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="myModalDeletar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="deleteAtividade"></h4>
        </div>
        <div class="modal-body">
      <input type="hidden" id="rowDelete">
      <p>Confirmar exclusão?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-deletar-nao" data-dismiss="modal">Não</button>
          <button type="button" class="btn btn-danger btn-deletar-sim" data-dismiss="modal">Sim</button>
        </div>
        <p id="respostaDeletarAtividade"></p>
      </div>
    </div>
  </div>
</section>

<script>


  $('#atividadesSection').hide()


  function gerarAtividades (obj) {
    $('#atividades').empty()
    for (const [key, value] of obj.atividades.entries()) {
      var newRow = value.index
      var atividade = value.atividade
      var datestring = value.date
      
      var nova_linha = ''
      
      if (value.status.includes("open")) {
        nova_linha = 
        '<tr id="row'+ newRow +'">' + 
        '<th scope="row">'+ newRow +'</th>' +
        '<td id="content'+ newRow +'">'+ atividade +'</td>' +
        '<td>' + datestring + '</td>' +
        '<td class="text-center" >' +
        '<button class="btn edit" id="edit'+ newRow +'"><i class="fa-solid fa-file-pen" style="color: blue;"></i></button>' +
        '<button class="btn delete" id="delete'+ newRow +'"><i class="fa fa-trash" style="color: red;"></i></button>' +
        '<button class="btn done" id="done'+ newRow +'"><i class="fa-solid fa-check" style="color: green;"></i></button>' +
        '</td>' +
        '</tr>'
      } else if (value.status.includes("done")) {
        nova_linha = 
        '<tr style="background-color: #FFFF99;" id="row'+ newRow +'">' + 
        '<th scope="row">'+ newRow +'</th>' +
        '<td id="content'+ newRow +'">'+ atividade +'</td>' +
        '<td>' + datestring + '</td>' +
        '<td class="text-center" >' +
        '<button class="btn delete" id="delete'+ newRow +'"><i class="fa fa-trash" style="color: red;"></i></button>' +
        '</td>' +
        '</tr>'
      }
      
      $('#atividades').append(nova_linha)
    }
  }

	$( document ).ready(function() {
		$( "#resultado" ).html("Login")
		
		$.ajax({
		  method: "POST",
		  url: "backend/session_manager_auth.php",
		  data: { operation: "load" }
		}).done(function(resposta) {
		  let obj = JSON.parse(resposta)
		  if (obj.nome != 'undefined') {
        if (obj.atividades.length > 0) {
          gerarAtividades(obj)
        }

        $('#atividadesSection').show()
        $('#loginSection').hide()

		  } else {
			  $( "#fechar_sessao" ).toggle(false)
			  $( "#abrir_sessao" ).toggle(true)
		  }
		})
	})

	$( "#abrir_sessao" ).click(function(){
		var v2 = $( "#login" ).val()
		var v3 = $( "#password" ).val()
		
		$.ajax({
		  method: "POST",
		  url: "backend/session_manager_auth.php",
		  data: { operation: "login" },
		  beforeSend: function (xhr) {
			xhr.setRequestHeader("Authorization", "Basic " + btoa(v2 + ":" + v3))
		  },
		  error : function(xhr) {
			 $( "#resultado" ).html("Usuário e/ou senha inválidos.")
		  }
		},
		).done(function(resposta) {
		  var obj = $.parseJSON(resposta)
      if(obj.status == 400){
        $( "#resultado" ).html("Usuário e/ou senha inválidos.")
      }else{
        if (obj.nome != 'undefined') {
          $( "#fechar_sessao" ).toggle(true)
          $( "#abrir_sessao" ).toggle(false)
          $('#atividadesSection').show()
          $('#loginSection').hide()

          if (obj.atividades.length > 0) {
            gerarAtividades(obj)
          }

        }else{
          $( "#resultado" ).html("Usuário e/ou senha inválidos.")
        }
      }
		})
	})
	
	$( "#fechar_sessao" ).click(function(){
		$.ajax({
		  method: "POST",
		  url: "backend/session_manager_auth.php",
		  data: { operation: "logout" }
		}).done(function(resposta) {
		  var obj = $.parseJSON(resposta)
		  
		  if (obj.nome == 'undefined') {
			  $( "#nome" ).val("")
			  $( "#login" ).val("")
			  $( "#password" ).val("")
			  $( "#resultado" ).html("Login")
			  $( "#fechar_sessao" ).toggle(false)
			  $( "#abrir_sessao" ).toggle(true)
        
        $('#atividadesSection').hide()
        $('#loginSection').show()
		  }
		})
	})

  $('.btn-criar').click(function(){
	   let atividade = $( "#txtCriarAtividade" ).val()
     $.ajax({
      method: "POST",
		  url: "backend/session_manager_auth.php",
      data: { operation: "insert", atividade: atividade }
     }).done(function(resposta) {
      let obj = JSON.parse(resposta)
      if(obj.status == 400){
          ShowAlert(obj.mensagem, isError = true)
        $( "#txtCriarAtividade" ).val("")
      }else{
        if (obj.atividades.length > 0) {
          $('#myModalCriar').modal('hide')
          $( "#txtCriarAtividade" ).val("")
          // alert("Sucesso ao inserir atividade!")
          ShowAlert("Sucesso ao inserir atividade!", isError = false)
          gerarAtividades(obj)
        }
      }
     })
	})

	$('.btn-editar').click(function(){
      let index = $( "#rowEdit" ).val()
      let atividade = $( "#txtModificarAtividade" ).val()
      $.ajax({
        method: "POST",
        url: "backend/session_manager_auth.php",
        data: { operation: "update", atividade: atividade, index: index },
        }).done(function(resposta) {
        let obj = JSON.parse(resposta)
        if(obj.status == 400){
          // alert(obj.mensagem)
          ShowAlert(obj.mensagem, isError = true)
          $( "#txtModificarAtividade" ).val("")
        }else{
          if (obj.atividades.length > 0) {
            $('#myModalEditar').modal('hide')
            $( "#rowEdit" ).val("")
            $( "#txtModificarAtividade" ).val("")
            // alert("Sucesso ao editar atividade!")
            ShowAlert("Sucesso ao editar atividade!", isError = false)
            gerarAtividades(obj)
          }else{
            alert("Erro ao carregar atividades!")
          }
        }
      })
  })

	$('.btn-deletar-sim').click(function(){
    let index = $( "#rowDelete" ).val()
    $.ajax({
      method: "POST",
      url: "backend/session_manager_auth.php",
      data: { operation: "remove", index: index },
    }).done(function(resposta) {
      let obj = JSON.parse(resposta)
      if(obj.status == 400){
        // alert(obj.mensagem)
        ShowAlert(obj.mensagem, isError = true)
      }else{
        $("#myModalDeletar").modal('hide')
        $("#rowDelete").val("")
	      $("#deleteAtividade").text("")
        // alert("Sucesso ao remover atividade!")
        ShowAlert("Sucesso ao remover atividade!", isError = false)
        gerarAtividades(obj)
      }
    })
  })

  function markDone(row) {
    let index = row
    $.ajax({
      method: "POST",
      url: "backend/session_manager_auth.php",
      data: { operation: "markDone", index: index },
    }).done(function(resposta) {
        let obj = JSON.parse(resposta)
        if(obj.status == 400){
          // alert(obj.mensagem)
          ShowAlert(obj.mensagem, isError = true)
        }else{	
          if (obj.atividades.length > 0) {
            // alert("Sucesso ao marcar atividade como concluída!")
            ShowAlert("Sucesso ao marcar atividade como concluída!", isError = false)
            gerarAtividades(obj)
          }else{
            // alert("Erro ao carregar atividades!")
            ShowAlert("Erro ao carregar atividades!", isError = false)
          }
        }
      })
    }

  $(document).on("click", 'button', function(element){
		var id = element.currentTarget.id
		
		if (id.includes("edit")) {
			var row = id.replace("edit", "")			
			var contentId = "#content" + row	
			$( "#txtModificarAtividade" ).val($( contentId ).html())
			$( "#rowEdit" ).val(row)
			$('#myModalEditar').modal('show')
		} else if (id.includes("delete")) {			
			var row = id.replace("delete", "")
			var contentId = "#content" + row
			$( "#deleteAtividade" ).text($( contentId ).html())
			$( "#rowDelete" ).val(row)
			$('#myModalDeletar').modal('show')
		} else if (id.includes("add")) {
			$('#myModalCriar').modal('show')
		} else if (id.includes("done")) {
			var row = id.replace("done", "")
			markDone(row)
		}
	})

  function ShowAlert(message, isError){
    if(isError){
      Swal.fire({
        icon: 'error',
        title: message,
      })
    }else{
      Swal.fire({
        icon: 'success',
        title: message,
      })
    }
  }

</script>

</body>
</html>