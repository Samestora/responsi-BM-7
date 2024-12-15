<section id="teamSelector">
  <div id="cCarousel">
    <div id="prev"></div>
    <div id="next"></div>

    <div id="carousel-vp">
      <div id="cCarousel-inner">
        <!-- make loop here -->
        <?php foreach ($clubLists as $club):?>
        <article class="cCarousel-item">
          <img src="Assets/images/Teams/<?= ($club->id > 0) ? htmlspecialchars($club->id) . '.svg' : htmlspecialchars($club->id) . '.png'; ?>" alt="<?= htmlspecialchars($club->name); ?>">
          <div class="infos">
            <h3><?= htmlspecialchars($club->name); ?></h3>
            <button id="<?=htmlspecialchars($club->id);?>" data-club-id="<?= htmlspecialchars($club->id); ?>" type="button">See</button>
          </div>
        </article>
        <?php endforeach;?>
        <!-- end loop here -->
      </div>
    </div>
  </div>
</section>