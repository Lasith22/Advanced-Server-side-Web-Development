 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h5>How to fetch data from database</h5>
                     <a href="<?php echo base_url('employee/add') ?>" class="btn btn-primary float-right">Add Employee</a>
                 </div>
                 <div class="card-body">
                     <table class="table table-borderd">
                         <thead>
                             <tr>
                                 <th>
                                     Id
                                 </th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Phone No</th>
                                 <th>Email Id</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                foreach ($employee as $row) : ?>
                                 <tr>
                                     <td><?php echo $row->id; ?> </td>
                                     <td> <?php echo $row->first_name; ?></td>
                                     <td> <?php echo $row->last_name; ?></td>
                                     <td> <?php echo $row->phone; ?></td>
                                     <td> <?php echo $row->email; ?></td>

                                     <td>
                                         <a href="" class='btn btn-success btn-sm'>Edit</a>
                                     </td>
                                     <td>
                                         <a href="" class='btn btn-danger btn-sm'>Delete</a>
                                     </td>
                                 </tr>
                             <?php endforeach; ?>


                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>