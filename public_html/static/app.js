$(function () {
  $(document).on('click', '[data-paginate-link]', function (e) {
    const url = $(this).attr('href');

    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'html',
      success: function (data) {
        if (data) {
          const $newPage = $(data);

          $newPage.find('[data-update]').each(function () {
            const $newBlock = $(this);
            const name = $newBlock.data('update');
            const $block = $('[data-update="' + name + '"]');

            $block.html($newBlock.html());
          });
        }
      }
    });
    return false;
  })
});