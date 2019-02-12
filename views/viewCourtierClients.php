
<section id="" class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des clients</h4>
                    <!-- <h6 class="card-subtitle">Add<code>.table-striped</code>for borders on all sides of the table and cells.</h6> -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom CLient</th>
                                    <th>Prenom</th>
                                    <th>téléphone</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $indice=1;
                                    foreach($clients as $client): 
                                ?>
                                    <tr>
                                        <td><?= $indice ?></td>
                                        <td> <?= $client->nom(); ?> </td>
                                        <td> <?= $client->prenom(); ?> </td>
                                        <td> <?= $client->telephone(); ?> </td>
                                        <td class="text-nowrap">
                                            <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                        </td>
                                    </tr>
                                <?php 
                                $indice = $indice + 1;
                                endforeach; 
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
