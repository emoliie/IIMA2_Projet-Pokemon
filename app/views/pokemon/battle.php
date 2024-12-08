<?php

// On a reçu le formulaire, on redirige vers la bonne page pour afficher le combat.
if (isset($redirect) && $redirect && isset($_POST["id1"]) && isset($_POST["id2"])) {
    header("Location: /pokemon/battle/" . $_POST["id1"] . "/" . $_POST["id2"]);
}
?>

<div class="flex flex-col w-4/5 bg-sky-200 p-10 gap-4 rounded-lg my-20">
    <div class="flex flex-col items-center">
        <h2 class="text-xl">Début du combat entre <b> <?= $fight->getAttacker()->getName() ?> </b> et <b> <?= $fight->getDefender()->getName() ?></b></h2>
        <div class="flex">
            <img src="data:image/png;base64,<?= $fight->getAttacker()->getImage() ?>" />
            <img src="data:image/png;base64,<?= $fight->getDefender()->getImage() ?>" />
        </div>
    </div>

    <!-- Pour chaque tour du combat -->
    <div class="grid grid-cols-2 gap-3 ">
        <?php foreach ($fight->getData() as $roundNumber => $roundData) : ?>
            <div class="w-full mx-auto px-4 bg-sky-300 p-3 rounded-lg">
                <!-- Affiche le tour du combat -->
                <p class="text-xl font-medium"><b> Tour : <?= $roundNumber + 1 ?> </b></p>

                <!-- Affiche celui qui attaque, celui qui défend et le coup apporté au défendeur -->
                <p class="text-xl">
                    <span class="font-bold"><?= $roundData["attacker"]->getName() ?></span> attaque
                    <span class="font-bold"><?= $roundData["defender"]->getName() ?></span> avec un
                    <span class="font-bold">coup
                        <?= $roundData["attackType"] ?>
                        <?php if ($roundData["attackType"] == "special"): ?>
                            <?= $roundData["attacker"]->getSpecialAbilityName() ?>
                        <?php endif; ?>
                    </span> !
                </p>

                <!-- Affiche les dégats infligés sur le tour -->
                <p class="text-base"> <span class="font-bold">Dégâts infligés </span> : <?= $roundData["damage"] ?> </p>

                <!-- Inflige les points de vie restants du defendeur -->
                <p class="text-base"> <span class="font-bold">Points de vie restants</span> de <?= $roundData["defender"]->getName() ?> : <?= $roundData["hpLeft"] ?> </p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mx-auto px-4 flex flex-col items-center">
        <p class="text-xl font-bold"> Combat terminé ! </p>

        <p> <span class="text-lg text-lime-600 font-bold">Gagnant</span> : <?= $fight->getWinner()->getName() ?> </p>
        <p> <span class="text-lg text-red-600 font-bold">Perdant</span> : <?= $fight->getLoser()->getName() ?> </p>
    </div>
</div>