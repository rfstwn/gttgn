<div class="container">
    <div class="faqs-wrapper">
        <h1 class="title main-title text-grey">
            Frequently<br />
            Asked Question
        </h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="accordion" id="faqAccordion">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $index ?>">
                                <button class="accordion-button <?= $index !== 1 ? 'collapsed' : '' ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>"
                                    aria-expanded="<?= $index === 1 ? 'true' : 'false' ?>"
                                    aria-controls="collapse<?= $index ?>">
                                    <?= $faq['question'] ?>
                                    <i class="fa fa-plus ms-auto"></i>
                                    <i class="fa fa-minus ms-auto"></i>
                                </button>
                            </h2>
                            <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>"
                                aria-labelledby="heading<?= $index ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p><?= !empty($faq['answer']) ? $faq['answer'] : '<em>Jawaban belum tersedia.</em>' ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>