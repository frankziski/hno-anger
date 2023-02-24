<div class="headline-wrp align-content-center">
    <h5><?= t('cookiesettings', 'Cookie-Einstellungen') ?></h5>
</div>

<button id="edit-cookie" class="btn btn-style-primary"><?= t('edit-cookie', 'Cookie-Einstellungen') ?></button>
<script>
  document.querySelector('#edit-cookie').addEventListener('click', function() {
    const event = document.createEvent('HTMLEvents');
    event.initEvent('cookies:update', true, false);
    document.querySelector('body').dispatchEvent(event);
  });
</script>