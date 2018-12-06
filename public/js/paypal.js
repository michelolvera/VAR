function generarPaypal() {
    $("#paypal-button").empty();
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'es_MX',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: total.toFixed(2),
                        currency: 'MXN'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                // Show a confirmation message to the buyer
                window.alert('Gracias por comprar!');
                let elem = document.getElementById("modal_shopping");
                let instance = M.Modal.getInstance(elem);
                instance.close();
                Cookies.remove('car');
            });
        }
    }, '#paypal-button');
}
