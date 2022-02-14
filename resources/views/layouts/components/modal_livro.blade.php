 @section('css-extra')
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
 @stop
 <div class="container">
     <h2>Legendas</h2>
     <!-- Trigger the modal with a button -->
     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
         <span class="glyphicon glyphicon-th-list"></span> Legendas
     </button>

     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Legendas</h4>
                 </div>
                 <div class="modal-body">
                     <p>Clique na sigla para ver o significado.</p>

                     <!-- início do accordion -->
                     <div class="panel-group" id="accordion">
                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 <h4 class="panel-title">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">SS</a>
                                 </h4>
                             </div>
                             <div id="collapse1" class="panel-collapse collapse">
                                 <div class="panel-body">Significado de SS.</div>
                             </div>
                         </div>
                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 <h4 class="panel-title">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">ABC</a>
                                 </h4>
                             </div>
                             <div id="collapse2" class="panel-collapse collapse">
                                 <div class="panel-body">Significado de ABC.</div>
                             </div>
                         </div>
                     </div> <!-- fim do accordion -->

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
             </div>

         </div>
     </div> <!-- fim do modal -->

 </div>
 <button class="btn btn-primary" id="btn-mensagem">Exibir modal via JavaScript</button>
 @section('js-extra')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script>
         $("#btn-mensagem").click(function() {
             $("#modal-mensagem").modal();
         });
     </script>
 @stop
