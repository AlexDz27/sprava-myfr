<p class="text--big p--lower-margin">Телефоны:</p>
<div class="text-with-icon">
  <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/phone--larger.svg" width="24" height="22">
  <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
    <span class="text--larger">
      <?php for ($i = 0; $i < count($phones['contacts']); $i++): $phone = $phones['contacts'][$i]; ?>
          <?php if ($i === 0): ?><a class="link--no-underline" href="tel:<?= $phones['contacts'][0][0] ?>"><?= $phones['contacts'][0][1] ?></a><?php endif ?><?php if ($i === 1): ?>,<br class="show-below-577"> <a class="link--no-underline" href="tel:<?= $phones['contacts'][1][0] ?>"><?= $phones['contacts'][1][1] ?></a><?php endif ?><?php if ($i === 2): ?>,<?php endif ?>
          <?php if ($i === 2): ?><br><a class="link--no-underline" href="tel:<?= $phones['contacts'][$i][0] ?>"><?= $phones['contacts'][$i][1] ?></a><?php endif ?><?php if ($i === 3): ?>,<br class="show-below-577"> <a class="link--no-underline" href="tel:<?= $phones['contacts'][3][0] ?>"><?= $phones['contacts'][3][1] ?></a><?php endif ?>
      <?php endfor ?>
    </span>
  </div>
</div>