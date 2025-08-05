
<div class="section-wrapper">
    <h2 class="title second-title text-green mb-5">Transportasi</h2>
    <?php if (!empty($transportation_list)): ?>
    <section class="d-flex flex-column flex-md-row align-items-start gap-4 transportation-section">
        <div class="transportation-tabs-menu">
            <?php foreach ($transportation_list as $index => $transport): ?>
            <div class="transport-icon-item <?= $index === 0 ? 'active' : '' ?>" data-target="transport-<?= $transport['id'] ?>" data-aos="zoom-in" data-aos-duration="1000">
                <div class="icon-container">
                    <i class="<?= htmlspecialchars($transport['icon']) ?>"></i>
                </div>
                <p><?= htmlspecialchars($transport['name']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="transportation-content">
            <?php foreach ($transportation_list as $index => $transport): ?>
            <div class="transport-content-item <?= $index === 0 ? 'active' : '' ?>" id="transport-<?= $transport['id'] ?>">
                <div class="transport-image">
                    <img src="<?= base_url('assets/image/' . $transport['image']) ?>" alt="<?= htmlspecialchars($transport['name']) ?>">
                </div>
                <div class="transport-info">
                    <h3><?= htmlspecialchars($transport['name']) ?></h3>
                    <p><?= htmlspecialchars($transport['description_1']) ?></p>
                    <?php if (!empty($transport['description_2'])): ?>
                    <p><?= htmlspecialchars($transport['description_2']) ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($transport['schedule_note'])): ?>
                    <div class="schedule-note">
                        <p><small><?= $transport['schedule_note'] ?></small></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>        
    </section>
    <?php else: ?>
    <div class="text-center py-5">
        <i class="fas fa-bus fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">Belum ada informasi transportasi</h5>
        <p class="text-muted">Informasi transportasi akan segera tersedia</p>
    </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabItems = document.querySelectorAll('.transport-icon-item');
    const contentItems = document.querySelectorAll('.transport-content-item');
    
    tabItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all tabs
            tabItems.forEach(tab => tab.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all content items
            contentItems.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding content
            const target = this.getAttribute('data-target');
            document.getElementById(target).classList.add('active');
        });
    });
});
</script>
