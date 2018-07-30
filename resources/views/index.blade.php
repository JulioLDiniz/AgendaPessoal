<!DOCTYPE html>
< lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lembretes - Julin :)</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"/>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">



</head>
<body id="page-top">


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" data-toggle="modal" href="#new">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="bg-primary text-white" >
    <div class="container text-center">
        <h1>Bem vindo aos Lembretes do Júlio</h1>
        <p class="lead">Projeto pessoal</p>
    </div>
</header>

<section >

    <h1 class="text-center">Lembretes cadastrados</h1>
    <table id="example" class="table" >
        <thead>
        <tr>
            <th>Tarefa</th>
            <th>Data</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach($tarefas as  $tarefa)
            <tr>
                <td>{{$tarefa->tarefa}}</td>
                <td>{{$tarefa->data}}</td>
                <td>{{$tarefa->status}}</td>
                <td>
                    <button data-toggle="modal" data-id="{{$tarefa->id}}" data-tarefa="{{$tarefa->tarefa}}" data-target="#delete" style="border: none; background-color: white;"><i class="far fa-trash-alt" ></i></button>
                    <button data-toggle="modal" data-target="#update" data-tarefa="{{$tarefa->tarefa}}" data-data="{{$tarefa->data}}" data-status="{{$tarefa->status}}" data-id="{{$tarefa->id}}" style="border: none; background-color: white;">
                        <i class="far fa-edit" ></i>
                    </button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


</section>
<section>
    <form action="mail" method="post">
        email: <input type="text" name="email">
        mensagem: <input type="text" name="mensagem">
        <button type="submit">Enviar</button>
    </form>
</section>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Julin, o brother dos irmãos. 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-----------------------------MODAL CADASTRO--------------------------------------------->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo lembrete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="cadastrar-tarefa" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tarefa:</label>
                        <input type="text" class="form-control"  name="tarefa">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Data:</label>
                        <input type="date" class="form-control"  name="data">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Status:</label>
                        <select name="status" class="form-control">
                            <option value="aberta" selected>Aberta</option>
                            <option value="emandamento">Em andamento</option>
                            <option value="encerrada">Encerrada</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-----------------------------MODAL ALTERAR--------------------------------------------->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar lembrete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/alterar-tarefa" method="post" >
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tarefa:</label>
                        <input type="text" class="form-control" id="tarefa" name="tarefa">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Data:</label>
                        <input type="date" class="form-control" id="data" name="data">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="aberta" selected>Aberta</option>
                            <option value="emandamento">Em andamento</option>
                            <option value="encerrada">Encerrada</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-----------------------------FIM MODAL ALTERAR--------------------------------------------->
<!-----------------------------MODAL EXCLUIR--------------------------------------------->
<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <form action="/excluir-tarefa" method="post" style="float: left; margin-right: 19px">
                    {{csrf_field()}}
                    <input type="hidden" id="id" name="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        var table =  $('#example').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );

        $( table.table().container() ).removeClass( 'form-inline' );

    } );

    $('#update').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var tarefa = button.data('tarefa')
        var data = button.data('data')
        var status = button.data('status')
        var id = button.data('id')
        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('#tarefa').val(tarefa)
        modal.find('#data').val(data)
        modal.find('#status').val(status)
        modal.find('#id').val(id)

    })

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var tarefa = button.data('tarefa')
        var id = button.data('id')
        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('p').html('Deseja realmente excluir a tarefa: '+tarefa+' ?')
        modal.find('#id').val(id)

    })


</script>

</body>

</html>
