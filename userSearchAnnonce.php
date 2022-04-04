
<form method="post" action="">
        <div class="container">
            <div class="row">
                <div class="col-3">&nbsp;</div>

                <div class="col-7">
                    <h3 class="font_raleway_regular_25px">Rejoins la famille des Petsitter</h3>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-4">
                            <label for="pays">Pays*</label><br />
                            <input type="text" name="pays" placeholder="pays" class="champs" value="<?php if (isset($pays)) echo $pays; ?>" required>
                            <?php if (isset($err_pays)) {
                                echo $err_pays;
                            } ?>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <label for="postal">Code Postal*</label><br />
                            <input type="text" name="postal" id="postal" placeholder="postal" class="champs" value="<?php if (isset($postal)) echo $postal; ?>" required>
                            <?php if (isset($postal)) {
                                echo $postal;
                            } ?>
                        </div>
                    </div>


                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="startDate">Sur quelle période en avez-vous besoin ?</label>
                        </div>
                        <div id="range">
                            <div class="col-4">
                                <input type="text" name="startDate" id="startDate" class="champs" value="<?php if (isset($startDate)) echo $startDate; ?>">
                            </div>

                            <div class="col-1">
                                <span class="lightgrey_txt">à</span>
                            </div>

                            <div class="col-4">
                                <input type="text" name="endDate" class="champs" value="<?php if (isset($endDate)) echo $endDate; ?>">
                            </div>
                        </div>
                    </div>

                   

                    <div class="row">
                        <div class="col-12 font_raleway_regular_15px lightgrey_txt">
                            <p>Je souhaite...*</p>
                         
                        </div>
                    </div>

                    <div class="row services">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-3">
                                <input type="radio" id="nourrir" name="service" value="nourrir">
                                <label for="nourrir">Nourrir</label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="promener" name="service" value="promener">
                                <label for="promener">Promener</label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="garder" name="service" value="garder">
                                <label for="garder">Garder</label>
                            </div>
                        </div>
                    </div>
                    <div class="row services">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-12 lightgrey_txt">                            
                                <label>Choisissez les animaux que vous pouvez garder :</label>
                            </div>
                            <div class="col-6">

                                <input type="checkbox" id="chien" name="chien" placeholder="chien" value="<?php  isset($_POST['chien']) ? $chien = 1 : $chien=0?>">
                                <label for="chien">Chien</label><br>

                                <input type="checkbox" id="chat" name="chat" placeholder="chat" value="<?php  isset($_POST['chat']) ? $chat = 1: $chat=0?>">
                                <label for="chat">Chat</label><br>

                                <input type="checkbox" id="lapin" name="lapin" placeholder="lapin" value="<?php  isset($_POST['lapin']) ? $lapin = 1 : $lapin=0?>">
                                <label for="lapin">Lapin</label><br>

                                <input type="checkbox" id="rongeur" name="rongeur" placeholder="rongeur" value="<?php  isset($_POST['rongeur']) ? $rongeur = 1 : $rongeur=0?>">
                                <label for="rongeur">Rongeur</label><br>

                                <input type="checkbox" id="furet" name="furet" placeholder="furet" value="<?php  isset($_POST['furet']) ? $furet = 1 : $furet=0?>">
                                <label for="furet">Furet</label><br>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" id="herisson" name="herisson" placeholder="herisson" value="<?php  isset($_POST['herisson']) ? $herisson = 1 : $herisson=0?>">
                                <label for="herisson">Hérisson</label><br>

                                <input type="checkbox" id="aquarium" name="aquarium" placeholder="aquarium" value="<?php  isset($_POST['aquarium']) ? $aquarium = 1 : $aquarium=0?>">
                                <label for="aquarium">Aquarium</label><br>

                                <input type="checkbox" id="oiseaux" name="oiseaux" placeholder="oiseaux" value="<?php  isset($_POST['oiseaux']) ? $oiseaux = 1 : $oiseaux=0?>">
                                <label for="oiseaux">Oiseaux</label><br>

                                <input type="checkbox" id="reptiles" name="reptiles" placeholder="reptiles" value="<?php  isset($_POST['reptiles']) ? $reptiles = 1 : $reptiles=0?>">
                                <label for="reptiles">Reptiles</label><br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <button type="submit" name="submit" class="white_txt font_raleway_regular_15px">Trouver mon best petsitter</button>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </form>