import axios from 'axios'

document.addEventListener('DOMContentLoaded', function() {
    const $payButton = document.getElementById('rbk-pay-button');
    const $loading = document.getElementById('rbk-loading');
    if ($payButton) {
        $payButton.addEventListener('click', function () {
            $payButton.disabled = true;
            $payButton.classList.add('text-hidden');
            $loading.classList.remove('d-none');
            let cardNumber = document.getElementById('card-number').value;
            let expDate = document.getElementById('exp-date-month').value + '/' + document.getElementById('exp-date-year').value;
            let cvv = document.getElementById('cvv').value;
            let billId = document.getElementById('billId').value;

            axios.post('/payment/get-invoice-rbk', {
                billId: billId
            }).then(function (response) {
                let accessToken = response.data;
                Tokenizer.setAccessToken(accessToken);
                Tokenizer.card.createToken({
                    paymentToolType: 'CardData',
                    cardNumber: cardNumber,
                    expDate: expDate,
                    cvv: cvv
                }, (data) => {
                    document.getElementById('token').value = data.paymentToolToken;
                    document.getElementById('session').value = data.paymentSession;
                    document.getElementById('rbkPayForm').submit();
                }, (e) => {
                    $payButton.disabled = false;
                    $payButton.classList.remove('text-hidden');
                    $loading.classList.add('d-none');
                    error('Неправильные данные карты');
                    console.error(e); // { code: 'string', message: 'string' }
                });
            }).catch(function (e) {
                console.log(e);
            });
        });
    }
});

const error = function(errorMsgText) {
    const errorMsg = document.getElementById("rbk-card-error");
    errorMsg.textContent = errorMsgText;
    setTimeout(function() {
      errorMsg.textContent = "";
    }, 4000);
};
