Livewire.on('showModal', (id) => {
    $('#' + id).modal('show');
});

Livewire.on('hideModal', (id) => {
    $('#' + id).modal('hide');
});

let loadingMore = false;

$(window).scroll(function () {
    if (!loadingMore && $('#load-more').length && $(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        loadingMore = true;
        Livewire.emit('loadMore');
    }
});

Livewire.on('loadedMore', () => {
    loadingMore = false;
});
