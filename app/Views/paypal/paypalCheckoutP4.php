<script>
    paypal.Button.render({
        env: '<?php echo PayPalENV; ?>',
        style: {
            size: 'medium',
            color: 'white',
            shape: 'pill',
            label: 'paypal',
            tagline: 'false'
        },
        client: {
            <?php if (ProPayPal) { ?>
                production: '<?php echo PayPalClientId; ?>'
            <?php } else { ?>
                sandbox: '<?php echo PayPalClientId; ?>'
            <?php } ?>
        },
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '<?php echo $productPrice; ?>',
                        currency: '<?php echo $currency; ?>'
                    },
                    description: '<?php echo $description; ?>'
                }]
            });
        },
        onAuthorize: function(data, actions) {
            return actions.payment.execute()
                .then(function() {
                    window.location = "payment/orderDetails?token=" + data.paymentToken + "&paymentID=" + data.paymentID + "&key=<?php echo $primaryKey; ?>";
                });
        }
    }, '#paypal-buttonP4');
</script>