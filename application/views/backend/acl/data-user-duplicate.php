 <!-- Modal -->
 <div class="modal fade text-left" id="user-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel17">Basic Modal</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Username</th>
                                 <th>Nama</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($users as $key => $user) : ?>
                                 <tr>
                                     <th scope="row"><?= $key++; ?></th>
                                     <td><a onclick="user_click('<?= $user->id; ?>' , '<?= $user->nama; ?>')"><?= $user->username; ?></a></td>
                                     <td><?= $user->nama; ?></td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     $(document).ready(() => {
         $('#user-data').modal('show');
     })

     var user_click = (user_id, user_nama) => {
         document.getElementById('user_id').value = user_id;
         document.getElementById('user_nama').value = user_nama;
         $('#user-data').modal('hide');

     }
 </script>