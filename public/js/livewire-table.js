document.addEventListener("DOMContentLoaded", function() {
    window.livewire.on('editInputEvent', () => {
        let $input = document.getElementById('editInput');
        $input.focus();
    });
    window.livewire.on('sort', (data) => {
        const param = encodeURI(`?sort[${data['orderField']}]=${data['order']}`);
        window.history.pushState("sort", "", param);
    });

    const input = document.getElementById("editInput");
    if (input) {
        input.addEventListener("keyup", function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("updateInputButton").click();
            }
        });
    }
});

window.onload = function() {
    const updateButton = document.getElementById('updateInputButton');
    if (updateButton) {
        updateButton.addEventListener('click', function () {
            const $editInputValue = document.getElementById('editInput').value;
            window.livewire.emit('updateField', $editInputValue.trim());
        });
    }
};

