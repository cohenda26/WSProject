
<section id="" class="container spacer-p-60">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des devis</h4>
                    <!-- <h6 class="card-subtitle">Add<code>.table-striped</code>for borders on all sides of the table and cells.</h6> -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>N° Devis</th>
                                    <th>Date début contrat</th>
                                    <th>Adresse Numero</th>
                                    <th>Adresse Rue</th>
                                    <th>Adresse Ville</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                                    $indice=1;
                                    foreach($devis as $devi): 
                                     //   var_dump($devi) . "<br>";
                                ?>
                                        <tr id="itemDevis<?= $devi->idDevis() ?>">
                                                <td><?= $indice ?></td>
                                                <td> <?= $devi->dateDebutContratSouhaitee(); ?> </td>
                                                <td> <?= $devi->devisAdresseNum(); ?> </td>
                                                <td> <?= $devi->devisAdresseRue(); ?> </td>
                                                <td> <?= $devi->devisAdresseVille(); ?> </td>
                                                <td class="text-nowrap">
                                                    <a href="<?=HOST?>client/getDevisHabitation/id/<?= $devi->idDevis() ?>"  data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="#"  onclick="deleteDevisHabitation(<?= $devi->idDevis() ?>)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
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
