<div class="bg-light mini-spacer p-b-0">
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
                                            <a class="list-group-item list-group-item-action active" id="list-rdc-list" 
                                                data-toggle="collapse" href="#list-etage" role="tab" aria-controls="Rdc">Au Rez de chaussé</a>
                                            <a class="list-group-item list-group-item-action" id="list-premier-list" 
                                                data-toggle="collapse" href="#list-etage" role="tab" aria-controls="premiereEtage">Au 1er étage</a>
                                            <a class="list-group-item list-group-item-action" id="list-intermediaire-list" 
                                                data-toggle="collapse" href="#list-etage" role="tab" aria-controls="etageInter">En étage intermédiaire</a>
                                            <a class="list-group-item list-group-item-action" id="list-dernier-list" 
                                                data-toggle="collapse" href="#list-etage" role="tab" aria-controls="dernierEtage">Au dernier étage</a>
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
                                            <a class="list-group-item list-group-item-action active" id="list-moins50-list" 
                                                data-toggle="list" href="#list-distance" role="tab" aria-controls="moins50">Moins de 50 mètres</a>
                                            <a class="list-group-item list-group-item-action" id="list-50_100-list" 
                                                data-toggle="list" href="#list-distance" role="tab" aria-controls="50_100">Entre 50 et 100 mètres</a>
                                            <a class="list-group-item list-group-item-action" id="list-Plus100-list" 
                                                data-toggle="list" href="#list-distance" role="tab" aria-controls="Plus100">Plus de 100 mètres</a>
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
                                        <a class="list-group-item list-group-item-action active" id="list-locataire-list" 
                                            data-toggle="list" href="#list_locataire" role="tab" aria-controls="list_locataire">Locataire</a>
                                        <a class="list-group-item list-group-item-action" id="list-meuble-list" 
                                            data-toggle="list" href="#list_locataire" role="tab" aria-controls="list_locataire">Locataire meublé</a>
                                        <a class="list-group-item list-group-item-action" id="list-occupant-list" 
                                            data-toggle="list" href="#list_locataire" role="tab" aria-controls="list_locataire">Propriétaire occupant</a>
                                        <a class="list-group-item list-group-item-action" id="list-gratuit-list" 
                                            data-toggle="list" href="#list_locataire" role="tab" aria-controls="list_locataire">Occupant à titre gratuit</a>
                                        <a class="list-group-item list-group-item-action" id="list-nonoccupant-list" 
                                            data-toggle="list" href="#list_nonoccupant" role="tab" aria-controls="ProprietaireNonOccupant">Propriétaire Non occupant</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list_locataire" role="tabpanel" aria-labelledby="list-locataire-list">
                                        <div class="form-group row">
                                            <div class="col-3"> </div>
                                            <label class="col-4 col-form-label" for="HabiteDeja" >J'habite déjà ce logement ? </label>
                                            <div class="col-5 btn-group" name="test2" role="group" aria-label="habite deja" id="HabiteDeja">
                                                <button class="btn btn-sm btn-secondary" aria-expanded="true" aria-controls="collapseHabiteOui" type="button" data-target="#collapseHabiteOui" data-toggle="HabiteDeja">Oui</button>
                                                <button class="btn btn-sm btn-secondary" aria-expanded="true" aria-controls="collapseHabiteNon" type="button" data-target="#collapseHabiteNon" data-toggle="HabiteDeja">Non</button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3"> </div>
                                            <label class="col-4 col-form-label" for="logement" >J'occupe ce logement comme ? </label>
                                            <div class="col-5 btn-group" role="group" aria-label="logement" id="logement">
                                                <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                        aria-controls="collapseLogementPrincipal" type="button" 
                                                        data-target="#collapseLogementPrincipal" data-toggle="collapse">Logement principal</button>
                                                <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                        aria-controls="collapseLogementSecondaire" type="button" 
                                                        data-target="#collapseLogementSecondaire" data-toggle="collapse">Logement secondaire</button>
                                            </div>
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
                            <!-- <div class="col-md-12"> -->
                                <h3> Renseignements sur le logement </h3>
                                <!-- Information de saisie sur la nature de l'appartement -->
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="adresseLogement" >Adresse du logement </label>
                                    <input class="col-2 form-control" type="text" value="" id="DevisAdresseNum">
                                    <input class="col-7 form-control" type="text" value="" id="DevisAdresseRue">
                                </div>   
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="villeLogement" >Ville </label>
                                    <input class="col-9 form-control" type="text" value="" id="DevisAdresseVille">
                                </div>    
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="surfaceLogement" >Surface habitable (m²) </label>
                                    <input class="col-9 form-control" type="text" value="" id="surface">
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
                                    <div class="col-9 btn-group" role="group" aria-label="garage" id="garage">
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="garage" type="button" 
                                                data-target="#garageOui" data-toggle="collapse">Oui</button>
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="garage" type="button" 
                                                data-target="#garageNon" data-toggle="collapse">Non</button>
                                    </div>
                                </div>    
                                <!-- Debut question loggia -->
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="veranda" >Possedez-vous des verandas / loggia / balcon </label>
                                    <div class="col-9 btn-group" role="group" aria-label="veranda" id="veranda">
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="veranda" type="button" 
                                                data-target="#verandaOui" data-toggle="collapse">Oui</button>
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="veranda" type="button" 
                                                data-target="#verandaNon" data-toggle="collapse">Non</button>
                                    </div>
                                </div>    
                                <div class="collapse" id="verandaOui">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="surface-veranda">surface globale (m²) </label>
                                        <div class="col-6">
                                            <input type="range" class="form-control" id="surfaceVeranda" min="3" max="200" step="1" value="50">
                                        </div>
                                    </div>
                                </div>  
                                <!-- fin question loggia -->
                                
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="alarme" >Possedez-vous une alarme ? </label>
                                    <div class="col-9 btn-group" role="group" aria-label="alarme" id="alarme">
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="alarme" type="button" 
                                                data-target="#alarmeOui" data-toggle="collapse">Oui</button>
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="alarme" type="button" 
                                                data-target="#alarmeNon" data-toggle="collapse">Non</button>
                                    </div>
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
                            <!-- </div> -->
                        </div>  
                    </div>

                    <!-- DEBUT STEP 3 pour le contenu de la saisie -->
                    <div class="row setup-content" id="step-3">
                        <div class="col-6">
                            <div class="col-md-12">
                                <h3> Mes besoins </h3>
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
                                    <input class="col-4 form-control" type="text" value="" id="anneeConstruction">
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
                                    <label class="col-3 col-form-label" for="logementAssure" >Le logement est-il assuré actuelement ? </label>
                                    <div class="col-9 btn-group" role="group" aria-label="logementAssure" id="logementAssure">
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="logementAssure" type="button" 
                                                data-target="#logementAssureOui" data-toggle="collapse">Oui</button>
                                        <button class="btn btn-sm btn-secondary" aria-expanded="true" 
                                                aria-controls="logementAssure" type="button" 
                                                data-target="#logementAssureNon" data-toggle="collapse">Non</button>
                                    </div>
                                </div>    
                                <div class="collapse" id="logementAssureOui">
                                    <div class="form-group row">
                                        <div class="col-3"> </div>
                                        <label class="col-3 col-form-label" for="non-assureur">Nom de l'assureur </label>
                                        <div class="col-6">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>  
                                <!-- fin question logement Assuré  -->
                        
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>

                    <!-- DEBUT STEP 4 pour le contenu de la saisie -->
                    <div class="row setup-content" id="step-4">
                        <div class="col-6">
                            <div class="col-md-12">
                                <h3> Validation </h3>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="date-emenagement">Date d'eménagement </label>
                                    <div class="col-4">
                                        <input class="form-control" type="date" value="" name="dateAmenagementSouhaitee" id="date-emenagement-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="date-debut-contrat">Date de début de contrat souhaité </label>
                                    <div class="col-4">
                                        <input class="form-control" type="date" value="" name="dateDebutContratSouhaitee" id="date-debut-contrat-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="montant-max-cotisation">Montant de la cotisation annuelle souhaitée </label>
                                    <div class="col-4">
                                        <input class="form-control" type="number" value="" name="montantMinSouhaite" id="cotisationMin">
                                    </div>
                                    <label class="col-1 col-form-label" for="montant-max-cotisation"> à </label>
                                    <div class="col-4">
                                        <input class="form-control" type="number" value="" name="montantMaxSouhaite" id="cotisationMax">
                                    </div>
                                </div>  
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                <button class="btn btn-inverse nextBtn btn-lg pull-right" type="submit">envoyer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="mini-spacer"> </div>
    </section>

</div>

