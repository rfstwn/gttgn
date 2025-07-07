<div class="schedule-wrapper" id="rundown">
    <div class="container">
        <h2 class="title main-title text-grey-light">Jadwal<br />Kegiatan</h2>
        <div class="row justify-content-center">
            <div class="col-10">
                <?php
                $duration = 500;
                foreach ($schedule as $event):
                ?>
                    <div class="schedule-item" data-aos="fade-right" data-aos-duration="<?= $duration ?>">
                        <div class="schedule-date">
                            <p><?= $event['date'] ?></p>
                            <div class="schedule-month">
                                <span><?= $event['month'] ?></span>
                                <span><?= $event['year'] ?></span>
                            </div>
                        </div>
                        <div class="schedule-text">
                            <p><?= $event['event'] ?></p>
                        </div>
                    </div>
                <?php
                    $duration += 500;
                endforeach;
                ?>
                <button href="#" class="button text-orange">
                    <i class="fa-solid fa-download"></i>Unduh Jadwal Kegiatan
                </button>
            </div>
        </div>
    </div>
    <img class="dots-decoration dots-top" src="<?= base_url('assets/image/multiple-dots.png') ?>" alt="dots" />
    <img class="dots-decoration dots-bottom" src="<?= base_url('assets/image/multiple-dots.png') ?>" alt="dots" />
</div>