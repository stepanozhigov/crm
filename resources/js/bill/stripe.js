const stripe = Stripe(process.env.MIX_STRIPE_PUBLIC_KEY, {
  locale: 'en'
});

//set language of success page
const successLocale = document.getElementsByTagName('html')[0].getAttribute('lang');

const button = document.getElementById("stripe-pay-button");
const loading = document.getElementById('stripe-loading');

button.addEventListener("click", function() {
    button.disabled = true;
    button.classList.add('text-hidden');
    loading.classList.remove('d-none');

    let numberValue = document.getElementById('cardNumber').value;
    const number = numberValue.replace(/\s/g, '');
    const expMonth = document.getElementById('expDateMonth').value;
    const expYear = document.getElementById('expDateYear').value;
    const cvc = document.getElementById('cvc').value;
    payWithCard(number, expMonth, expYear, cvc);
});

const payWithCard = function(number, expMonth, expYear, cvc) {
    const url = '/payment/get-stripe-data/';
    const formData = new FormData;
    formData.append('number', number);
    formData.append('expMonth', expMonth);
    formData.append('expYear', expYear);
    formData.append('cvc', cvc);

    fetch(url + document.getElementById('billHash').value, {
        method: "POST",
        headers: {
          'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData,
    }).then(function(result) {
        return result.json();
    }).then(function(response) {
        if (false === response.success) {
            button.disabled = false;
            button.classList.remove('text-hidden');
            loading.classList.add('d-none');
            error(response.message);
        }
        else stripe.confirmCardPayment(response.data.clientSecret, {
            payment_method: response.data.paymentId
        }).then(function(result) {
            if (result.error) {
                button.disabled = false;
                button.classList.remove('text-hidden');
                loading.classList.add('d-none');
                error(result.error.message);
            } else {
                success();
            }
        });
    });
};

const success = function() {
    window.location = '/payment/success?locale='+successLocale;
};

const error = function error(errorMsgText) {
    const errorMsg = document.getElementById("stripe-card-error");
    errorMsg.textContent = errorMsgText;
    setTimeout(function() {
      errorMsg.textContent = "";
    }, 4000);
};