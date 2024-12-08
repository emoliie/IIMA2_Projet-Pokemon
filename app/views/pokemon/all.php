<div class="flex flex-col items-center w-4/5 bg-sky-200 justify-between p-10 gap-4 rounded-lg my-20">

  <h1 class="text-2xl">Liste des Pokémons</h1>
  <div class="grid grid-cols-3 gap-3 w-full">
    <?php foreach ($pokemons as $pokemon): ?>
      <div class="flex flex-col items-center bg-sky-300 p-3 rounded-lg">
        <h2 class="text-xl"><b><?= $pokemon->getName() ?></b> </h2> <img src="data:image/png;base64,<?= $pokemon->getImage() ?>" />
        <div class="flex flex-row items-center gap-1">
          <p><b>Type :</b> <?= $pokemon->getType() ?></p><img src="<?= $pokemon->getIcon() ?>" alt="Pokemon type" class="w-4 h-4">
        </div>
        <div class="flex flex-row items-center gap-2">
          <p><b>HP :</b> <?= $pokemon->getHp() ?> </p> <img src="/assets/heart-icon.svg" />
        </div>
        <div class="flex flex-row items-center gap-2">
          <p><b>Power :</b> <?= $pokemon->getAttackPower() ?></p> <img src="/assets/sword-icon.svg" />
        </div>
        <div class="flex flex-row items-center gap-2">
          <p><b>Defense :</b> <?= $pokemon->getDefense() ?></p> <img src=" /assets/shield-icon.svg" />
        </div>
      </div>
    <?php endforeach; ?>
  </div>


  <form action="/pokemon/battle" method="POST" id="battle-form" class="flex items-center gap-5">

    <select name="id1" id="select-pokemon1" class="p-2 rounded-lg">
      <?php
      foreach ($pokemons as $pokemon) :
      ?>
        <option value="<?php echo htmlspecialchars($pokemon->getId()); ?>">
          <?php echo htmlspecialchars($pokemon->getName()); ?>
        </option>
      <?php endforeach; ?>
    </select>

    <p>VS</p>

    <select name="id2" id="select-pokemon2" class="p-2 rounded-lg">
      <?php
      foreach ($pokemons as $pokemon) :
      ?>
        <option value="<?php echo htmlspecialchars($pokemon->getId()); ?>">
          <?php echo htmlspecialchars($pokemon->getName()); ?>
        </option>
      <?php endforeach; ?>
    </select>

    <input type="submit" class="px-2 py-1 border-solid border-2 rounded-lg border-sky-500 text-sky-500 cursor-pointer hover:bg-sky-500 hover:text-white transition ease-in-out duration-300" value="Lancer le combat" />
  </form>

</div>