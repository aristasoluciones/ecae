
const SwalModal = (icon, title, html) => {
    Swal.fire({
        icon,
        title,
        html
    })
}

const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
    Swal.fire({
        icon,
        title,
        html,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText,
        reverseButtons: true,
    }).then(result => {
        if (result.value) {
            return livewire.emit(method, params)
        }

        if (callback) {
            return livewire.emit(callback)
        }
    })
}

const SwalAlert = (icon, title, timeout = 7000) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: timeout
    })

    Toast.fire({
        icon,
        title
    })
}

document.addEventListener('DOMContentLoaded', () => {
    this.livewire.on('swal:modal', data => {
        SwalModal(data.icon, data.title, data.text)
    })

    this.livewire.on('swal:confirm', data => {
        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
    })

    this.livewire.on('swal:alert', data => {
        SwalAlert(data.icon, data.title, data.timeout)
    })
    this.livewire.on('modal:show', (data) => {

        $(data).modal('show');
    })
    this.livewire.on('modal:hide', (data) => {

        $(data).modal('hide');
    })
})
window.livewire.on('chartUpdate', (chartId, labels, datasets) => {

    let chart = Highcharts.charts.find(c => {
        return c.renderTo.id === chartId
    });

    let series = [];

    chart.series.forEach((serie, key) => {
        series.push(datasets[key]);
    });


    chart.update({
        series: series,
        xAxis: {
            categories: labels,
        }
    }, true, true);

});
