<div class="bg-light p-t-10 p-b-10">
    <section id="ContratHabitation" class="container p-t-10 ">
        <!-- Une CARD pour l'enveloppe pour le titre -->
        <div class="card card-outline-info col-12">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Contrat d'habitation</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <!-- DEBUT STEP 1 pour le contenu de la saisie -->
                    <div class="row setup-content" id="step-1">
                        <div class="col-6 col-md-12">
                            <div class="row m-b-10">
                                <h3> Renseignements sur le logement </h3>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label" for="typeAppartement" >Vous habitez en </label>
                                <ul class=" col-9 nav nav-pills">
                                    <li class=" nav-item"> <a href="#Appartement" class="nav-link active" data-toggle="tab" aria-expanded="false">Appartement</a> </li>
                                    <li class="nav-item"> <a href="#Maison" class="nav-link" data-toggle="tab" aria-expanded="false">Maison</a> </li>
                                </ul>
                            </div>  
                            <!-- Elements rattachés à la saisie au dessus -->
                            <div class="tab-content br-n pn">
                                <div id="Appartement" class="tab-pane active">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="list-etage">Appartement situé </label>
                                        <div class="col-6">
                                            <div class="list-group" id="list-etage" role="tablist">
                                                <a class="list-group-item list-group-item-action active" role="tab" data-toggle="list" href="#list-etage" id="list-rdc-list" >Au Rez de chaussé</a>
                                                <a class="list-group-item list-group-item-action "       role="tab" data-toggle="list" href="#list-etage" id="list-premier-list" >Au 1er étage</a>
                                                <a class="list-group-item list-group-item-action "       role="tab" data-toggle="list" href="#list-etage" id="list-intermediaire-list">En étage intermédiaire</a>
                                                <a class="list-group-item list-group-item-action "       role="tab" data-toggle="list" href="#list-etage" id="list-dernier-list">Au dernier étage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Maison" class="tab-pane">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="list-distance" >Habitation la plus proche </label>
                                        <div class="col-6">
                                            <div class="list-group" id="list-distance" role="tablist">
                                            <a class="list-group-item list-group-item-action active" id="list-moins50-list" data-toggle="list" href="#list-distance" role="tab" >Moins de 50 mètres</a>
                                            <a class="list-group-item list-group-item-action" id="list-50_100-list" data-toggle="list" href="#list-distance" role="tab" >Entre 50 et 100 mètres</a>
                                            <a class="list-group-item list-group-item-action" id="list-Plus100-list" data-toggle="list" href="#list-distance" role="tab" >Plus de 100 mètres</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Information de saisie sur le type d'occupation de l'appartement -->
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="list-locataire" >Pour ce logement je suis </label>
                                <div class="col-9">
                                    <div class="list-group" id="list-locataire" role="tablist">
                                        <!-- la liaison avec le tab-content se fait sur href = id -->
                                        <a class="list-group-item list-group-item-action active" id="list-locataire-list" data-toggle="list" href="#list_locataire" role="tab" >Locataire</a>
                                        <a class="list-group-item list-group-item-action" id="list-meuble-list" data-toggle="list" href="#list_locataire" role="tab" >Locataire meublé</a>
                                        <a class="list-group-item list-group-item-action" id="list-occupant-list" data-toggle="list" href="#list_locataire" role="tab" >Propriétaire occupant</a>
                                        <a class="list-group-item list-group-item-action" id="list-gratuit-list" data-toggle="list" href="#list_locataire" role="tab" >Occupant à titre gratuit</a>
                                        <a class="list-group-item list-group-item-action" id="list-nonoccupant-list" data-toggle="list" href="#list_nonoccupant" role="tab" >Propriétaire Non occupant</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list_locataire" role="tabpanel" aria-labelledby="list-locataire-list">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-4 col-form-label" for="HabiteDeja" >J'habite déjà ce logement </label>
                                        <ul class=" col-5 nav nav-pills">
                                            <li class=" nav-item"> <a href="#oui" class="nav-link active" data-toggle="tab" aria-expanded="false">Oui</a> </li>
                                            <li class="nav-item"> <a href="#non" class="nav-link" data-toggle="tab" aria-expanded="false">Non</a> </li>
                                        </ul>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-4 col-form-label" for="logement" >J'occupe ce logement comme </label>
                                        <ul class=" col-5 nav nav-pills">
                                            <li class=" nav-item"> <a href="#logementPrincipal" class="nav-link active" data-toggle="tab" aria-expanded="false">Logement principal</a> </li>
                                            <li class="nav-item"> <a href="#logementSecondaire" class="nav-link" data-toggle="tab" aria-expanded="false">Logement secondaire</a> </li>
                                        </ul>
                                    </div>

                                    <div class="collapse" id="collapseLogementSecondaire">
                                        <div class="form-group row">
                                            <div class="col-3"> </div>
                                            <label class="col-3 col-form-label" for="list-NbJoursInhabite" >Nombre de jours où le logement est inhabité </label>
                                            <div class="col-6">
                                                <div class="list-group" id="list-distance" role="tablist">
                                                <a class="list-group-item list-group-item-action active" id="list-0_45-list" 
                                                    data-toggle="list" href="#list-distance" role="tab" aria-controls="0_45">0-45 jours</a>
                                                <a class="list-group-item list-group-item-action" id="list-45_60-list" 
                                                    data-toggle="list" href="#list-distance" role="tab" aria-controls="45_60">45-60 jours</a>
                                                <a class="list-group-item list-group-item-action" id="list-60_90-list" 
                                                    data-toggle="list" href="#list-distance" role="tab" aria-controls="60_90">60-90 jours</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list_nonoccupant" role="tabpanel" 
                                        aria-labelledby="list-nonoccupant-list">...</div>
                            </div>

                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>       

                    <!-- DEBUT STEP 2 pour les informations sur le logement -->
                    <div class="row setup-content" id="step-2">
                        <div class="col-6 col-md-12">
                            <div class="row m-b-10">
                                <h3> Renseignements sur le logement </h3>
                            </div>

                            <!-- Information de saisie sur la nature de l'appartement -->
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="DevisAdresseNum" >Adresse du logement </label>
                                <input class="col-2 form-control" type="number" value="" id="DevisAdresseNum" required>
                                <input class="col-7 form-control" type="text" value="" id="DevisAdresseRue" required>
                            </div>   
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="DevisAdresseVille" >Ville </label>
                                <input class="col-9 form-control" type="text" value="" id="DevisAdresseVille" required>
                            </div>    
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="surface" >Surface habitable (m²) </label>
                                <input class="col-9 form-control" type="number" value="" id="surface" required>
                            </div>    
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="nbpiecesLogement" >Nombre de pièces </label>
                                <div class="col-3 form-group m-t-20">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                </div>
                            </div>        
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="annexesLogement" >Surface des dépendances annexes </label>
                                <div class="col-3 form-group m-t-20">
                                    <select class="form-control">
                                        <option>sans</option>
                                        <option>moins de 40m²</option>
                                        <option>de 40 à 80 m²</option>
                                        <option>supèrieur à 80m²</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="garage" >Possedez-vous un garage </label>
                                <ul class="col-9 nav nav-pills">
                                    <li class=" nav-item"> <a href="#oui" class="nav-link active" data-toggle="tab" aria-expanded="false">Oui</a> </li>
                                    <li class="nav-item"> <a href="#non" class="nav-link" data-toggle="tab" aria-expanded="false">Non</a> </li>
                                </ul>
                            </div>    
                            <!-- Debut question loggia -->
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="veranda" >Possedez-vous des verandas / loggia / balcon </label>
                                <ul class="col-9 nav nav-pills">
                                    <li class="nav-item"> <a href="#verandaOui" class="nav-link active" data-toggle="tab" aria-expanded="false">Oui</a> </li>
                                    <li class="nav-item"> <a href="#verandaNon" class="nav-link" data-toggle="tab" aria-expanded="false">Non</a> </li>
                                </ul>
                            </div>

                            <!-- Elements rattachés à la saisie au dessus -->
                            <div class="tab-content br-n pn">
                                <div id="verandaOui" class="tab-pane active">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="surface-veranda">surface globale (m²) </label>
                                        <div class="col-6">
                                            <input type="number" class="form-control" value="0" id="surfaceVeranda">
                                            <!-- <input type="range" class="form-control" id="surfaceVeranda" min="3" max="200" step="1" value="50"> -->
                                        </div>
                                    </div>
                                </div>
                                <div id="verandaNon" class="tab-pane active">
                                </div>
                            </div>

                            <!-- fin question loggia -->
                            
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="alarme" >Possedez-vous une alarme </label>
                                <ul class="col-9 nav nav-pills">
                                    <li class=" nav-item"> <a href="#oui" class="nav-link active" data-toggle="tab" aria-expanded="false">Oui</a> </li>
                                    <li class="nav-item"> <a href="#non" class="nav-link" data-toggle="tab" aria-expanded="false">Non</a> </li>
                                </ul>
                            </div>   
                            
                            <!-- chauffage -->
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="chauffage" >Moyen de chauffage </label>
                                <div class="col-6 form-group m-t-20">
                                    <select class="form-control">
                                        <option></option>
                                        <option>Cheminée foyer ouvert</option>
                                        <option>Cheminée foyer fermé</option>
                                        <option>Poêle au bois</option>
                                        <option>Aucun de ces moyens</option>
                                    </select>
                                </div>
                            </div>  
                            <!-- fin chauffage  -->
                            <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>

                        </div>  
                    </div>

                    <!-- DEBUT STEP 3 pour le contenu de la saisie -->
                    <div class="row setup-content" id="step-3">
                        <div class="col-6 col-md-12">
                            <div class="row m-b-10">
                                <h3> Mes besoins </h3>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="valeurMobilier" >Valeur du mobilier à assurer </label>
                                <div class="col-6 form-group m-t-20">
                                    <select class="form-control">
                                        <option>- de 50 000 Nis</option>
                                        <option>50 000 - 100 000 Nis</option>
                                        <option>100 000 - 200 000 Nis</option>
                                        <option>+ de 200 000 Nis</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="anneeConstruction" >Année de construction du logement </label>
                                <input class="col-4 form-control" type="number" value="" id="anneeConstruction">
                            </div> 

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="nbSinistreDeclares" >Nombre de sinistre depuis 3 ans </label>
                                <div class="col-3 form-group m-t-20">
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="dejaResilie" >Avez-vous déjà été résilié au cours des 3 dernieres années </label>
                                <div class="col-6 form-group m-t-20">
                                    <select class="form-control">
                                        <option>Non jamais</option>
                                        <option>Oui pour sinistre</option>
                                        <option>Oui pour fausse déclaration</option>
                                        <option>Oui pour impayé</option>
                                        <option>Oui pour autre motif</option>
                                    </select>
                                </div>
                            </div> 

                            <!-- Debut question logement Assuré -->
                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="logementAssure" >Le logement est-il assuré actuelement </label>
                                <ul id="logementAssure" class="col-9 nav nav-pills">
                                    <li class=" nav-item"> <a href="#logementAssureOui" class="nav-link active" data-toggle="tab" aria-expanded="false">Oui</a> </li>
                                    <li class="nav-item"> <a href="#logementAssureNon" class="nav-link" data-toggle="tab" aria-expanded="false">Non</a> </li>
                                </ul>
                            </div>    

                            <!-- Elements rattachés à la saisie au dessus -->
                            <div class="tab-content br-n pn">
                                <div id="logementAssureOui" class="tab-pane active">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="non-assureur">Nom de l'assureur </label>
                                        <div class="col-6">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="logementAssureNon" class="tab-pane active">
                                </div>
                            </div>
                            <!-- fin question logement Assuré  -->
                            <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>
                    </div>

                    <!-- DEBUT STEP 4 pour le contenu de la saisie -->
                    <div class="row setup-content" id="step-4">
                        <div class="col-6 col-md-12">
                            <div class="row m-b-10">
                                <h3> Validation </h3>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="date-emenagement">Date d'eménagement </label>
                                <div class="col-4">
                                    <input class="form-control" type="date" value="" name="dateAmenagementSouhaitee" id="date-emenagement-input" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="date-debut-contrat">Date de début de contrat souhaité </label>
                                <div class="col-4">
                                    <input class="form-control" type="date" value="" name="dateDebutContratSouhaitee" id="date-debut-contrat-input" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="montant-max-cotisation">Montant de la cotisation annuelle souhaitée </label>
                                <div class="col-4">
                                    <input class="form-control" type="number" value="" name="montantMinSouhaite" id="cotisationMin" required>
                                </div>
                                <label class="col-1 col-form-label" for="montant-max-cotisation"> à </label>
                                <div class="col-4">
                                    <input class="form-control" type="number" value="" name="montantMaxSouhaite" id="cotisationMax" required>
                                </div>
                            </div>  
                            <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                            <button class="btn btn-inverse nextBtn btn-lg pull-right" type="submit">envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- <div class="mini-spacer"> </div> -->
    </section>

</div>

